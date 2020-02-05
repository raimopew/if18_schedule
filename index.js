/* jshint esversion: 6 */

var theme = {
	color: "light", 
	highlight: "yellow",
	light: "Switch to dark", 
	dark: "Switch to light"
};

var currentTab;
let params;

var day = new Date().getDay();
var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    
let jsonUrl = "data.json";

let data = $.ajax({
    url: jsonUrl,
    async: false,
    dataType: 'json'
}).responseJSON;

$(document).ready(() => {
    // peaks arvestama 'URLSearchParams' in window
    params = new URLSearchParams(window.location.search);

    if (!params.has("theme") && !params.has("group")){
        params.append("group", "1");
        params.append("theme", "light");
        params.append("showIcons", "false");
        updateSearchParams();
    }

	if (params.get("group") == 1){
        checkedTab(true, false, false);
	} else if (params.get("group") == 2){
		checkedTab(false, true, false);
	} else if (params.get("group") == 3){
		checkedTab(false, false, true);
	} 

	if (params.has("theme") && params.get("theme") === "dark") { 
        changeTheme("dark"); 
    } else {
        $('.theme').html(theme.light);
    }

	$('#tab-1').on('click', () => { updateGroup("1"); });
    $('#tab-2').on('click', () => {	updateGroup("2"); });
	$('#tab-3').on('click', () => { updateGroup("3"); });

	$('.theme').on('click', (e) => {
		theme.color === "light" ? changeTheme("dark") : changeTheme("light");
	});

    createContent(data.first, "table1");
    createContent(data.second, "table2");
    createContent(data.third, "table3");
    highlightDay();

    $('[data-toggle="popover"]').popover({
        trigger: 'click',
        container: 'body',
        placement: 'auto',
        html: true,
    });

    $('[data-toggle="popover"]').on('click', function (e) {
        $('[data-toggle="popover"]').not(this).popover('hide');
    });

    if (params.get("showIcons") === "false") {
        toggleImages("false");
    } else if (params.get("showIcons") === "true") {
        toggleImages("true");
    }

    $('.toggleImg').on('click', () => {
        params.get("showIcons") === "true" ? toggleImages("false") : toggleImages("true");
    });

});

function toggleImages(string){
    if (string === "true"){
        $('.icon').show();
        $('.toggleImg').html("Hide icons")
        $('.room').css("padding-right", "0px");
    } else if (string === "false"){
        $('.icon').hide();
        $('.toggleImg').html("Show icons");
        $('.room').css("padding-right", "5px");
    }
    params.set("showIcons", string);
    updateSearchParams();
}

function updateSearchParams(){
    window.history.replaceState({}, '', `${location.pathname}?${params}`);
}

function updateGroup(number){
    if (params.has("group")){
        params.set("group", number);
    } else {
        params.append("group", number);
    }
    updateSearchParams();
    hideAllPopovers();
}

function hideAllPopovers(){
    $('[data-toggle="popover"]').not(this).popover('hide');
}

function createContent(group, target){

    let columnStart = 1, columnEnd = 2;
    let rowStart = 1, rowEnd = 2;

    $.each(group, function(i){
        let span = createSpan(days[i+1]);

        createSubjectDiv(rowStart, rowEnd, columnStart, columnEnd, span, "tableHeader", target);

        $.each(this, function(y){
            let currentDiv = document.createElement("div");
            currentDiv.className = "inner";

            let rowStart, rowEnd, time, p;
            let subject = ""; 
            let room = "";

            if (group[i][y].id.length > 0){
                let appendOnce = true;

                $.each(group[i][y].id, (x) => {
                    time = data.subjects[this.id[x]].times[this.time];
                    if (appendOnce) {
                        appendOnce = false;
                        currentDiv.append(createSpan(time, "time"));
                    }
                    room = data.subjects[this.id[x]].rooms[this.room[x]];
                    subject = data.subjects[this.id[x]].name;
                    roomAndSubject = room + " " + subject; 
                    
                    p = createSpan(room, "room" + " " + this.id[x]);
                    currentDiv.append(p);
                    currentDiv.append(createSpan(subject, this.id[x], true));
                });

            } else {

                time = data.subjects[group[i][y].id].times[group[i][y].time];
                room = data.subjects[group[i][y].id].rooms[group[i][y].room];
                subject = data.subjects[group[i][y].id].name;

                currentDiv.append(createSpan(time, "time"));
                currentDiv.append(createSpan(room, "room" + " " + group[i][y].id));
                currentDiv.append(createSpan(subject, group[i][y].id, true));

            }

            rowStart = group[i][y].start;
            rowEnd = group[i][y].end;

            createSubjectDiv(rowStart, rowEnd, columnStart, columnEnd, currentDiv, "handdrawnbox " + days[i+1], target);

        });

        columnStart += 1;
        columnEnd += 1;

    });
}

function createSubjectDiv(rowStart, rowEnd, columnStart, columnEnd, contentCombined, divClass, target){

    let div = document.createElement("div");
    div.setAttribute("style", "grid-row: " + rowStart + " / " + rowEnd + "; grid-column: " + columnStart + " / " + columnEnd + ";");
    div.className =  divClass;
    div.appendChild(contentCombined);
    let currentDiv = document.getElementById(target);
    
    currentDiv.appendChild(div);
}

function createSpan(content, className, popover){
    let span = document.createElement("span");
    let icon;
    if (typeof className !== 'undefined') span.className = className;
    if (popover) {
        icon = document.createElement("img");
        icon.src = "icons/subjecticons/" + data.subjects[className].icon;
        icon.className = "icon";

        if (!isNaN(className)) span.classList.add("subject");

        span.setAttribute("tabindex", "0");
        span.setAttribute("role", "button");
        span.setAttribute("data-toggle", "popover");

        let link = "";
        if (data.subjects[className].links.length > 1){
            $.each(data.subjects[className].links, (index, element) => {
                link += '<a target="_blank" class="aPopover" href="' + element[0] + '">' + element[1] + '</a>';
                if (data.subjects[className].links.length-1 !== index){
                    link += "<br>";
                }
            });
        } else {
            if (data.subjects[className].links[0][1] !== "null"){
                link = '<a target="_blank" class="aPopover" href="' + data.subjects[className].links[0][0] + '">' + data.subjects[className].links[0][1] + '</a>';
            } else {
                link = '<p>' + data.subjects[className].links[0][1] + '</p>'
            }

        }
        span.setAttribute("data-content", link);
    }
    span.innerHTML = content;
    if (typeof icon !== 'undefined'){
        span.prepend(icon);
    }
    return span;
}

function changeTheme(color){
	theme.color = color;
	if (color === "dark"){
        $('.theme').html(theme.dark);
        theme.highlight = "#303030";
        params.set("theme", "dark");
        updateSearchParams();

		let defaultDark = {"background-color": "black", "color": "white"}; 
		$('body,html').css(defaultDark);
		$('.container').css(defaultDark);
		$('.table').css(defaultDark);
		$('a:link, a:visited, a.special:hover').css("color", "white");
		$('a.special').css("color", "hotpink");
		$('.more a.under:hover').css({"color": "white", "border-color": "hotpink"});
		$('.handdrawnbox').css("border", "2px solid #fff");
		$('.label').css("color", "white");
		$('.panel').css("background", "#000");
	} else if (color === "light"){
        $('.theme').html(theme.light);
        theme.highlight = "yellow";
        params.set("theme", "light");
        updateSearchParams();

		let defaultLight = {"background-color": "white", "color": "black"}; 
		$('body,html').css(defaultLight);
		$('.container').css(defaultLight);
		$('.table').css(defaultLight);
		$('a:link, a:visited, a.special:hover').css("color", "black");
		$('a.special').css("color", "hotpink");
		$('.more a.under:hover').css({"color": "black", "border-color": "hotpink"});
		$('.handdrawnbox').css("border", "2px solid #000");
		$('.label').css("color", "black");
        $('.panel').css("background", "#fff");
	}
    highlightDay();
}

function checkedTab(statement1, statement2, statement3){
	$('#tab-1').attr("checked", statement1);
	$('#tab-2').attr("checked", statement2);
    $('#tab-3').attr("checked", statement3);
}

function highlightDay(){
	if (day === 6 || day === 0){
		$('#noHighlight').html("No highlight due to it being " + days[day]);
	} else {
		$('.handdrawnbox.' + days[day]).css({"background-color": theme.highlight});
		$('#noHighlight').html(days[day] + " highlighted");
    }
}

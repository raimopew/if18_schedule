<?php

/* the day in a number */

$numberOfTheDay = date('N');

/* tab var */

$enteredTab = ($_GET['tab']);
$enteredTheme = ($_GET['theme']);

$firstChecked = '';
$secondChecked = '';
$thirdChecked = '';
$defaultChecked ='';
$checkedCode =' checked="checked" ';

if(isset($enteredTab)){
	if ($enteredTab == 1) {
		$firstChecked = $checkedCode;
	} else if ($enteredTab == 2) {
		$secondChecked = $checkedCode;
	} else if ($enteredTab == 3) {
		$thirdChecked = $checkedCode;
	} else {
		$defaultChecked = $checkedCode;
	}
}
else {
	$defaultChecked = $checkedCode;
}

/* ainenimetused */

$subject_veebiprogrammeerimine = 'Vee&#8203;bi&#8203;pro&#8203;gram&#8203;mee&#8203;ri&#8203;mi&#8203;ne';
$subject_opsys_alused_ja_haldamine = 'O&#8203;pe&#8203;ra&#8203;tsioo&#8203;ni&#8203;süs&#8203;tee&#8203;mi&#8203;de a&#8203;lu&#8203;sed ja hal&#8203;da&#8203;mi&#8203;ne';
$subject_programmeerimise_alused = 'Pro&#8203;gram&#8203;mee&#8203;ri&#8203;mi&#8203;se a&#8203;lu&#8203;sed';
$subject_digipadevuse_baaskursus = 'Di&#8203;gi&#8203;pä&#8203;de&#8203;vu&#8203;ste ba&#8203;as&#8203;kur&#8203;sus';
$subject_andmebaaside_projekteerimine = 'And&#8203;me&#8203;baa&#8203;si&#8203;de pro&#8203;jek&#8203;tee&#8203;ri&#8203;mi&#8203;ne';
$subject_oppimine_korgkoolis = 'Õp&#8203;pi&#8203;mi&#8203;ne kõrg&#8203;koo&#8203;lis';
$subject_praktiline_matemaatika = 'Pra&#8203;kti&#8203;li&#8203;ne ma&#8203;te&#8203;maa&#8203;ti&#8203;ka';

/* lingid */

$link_veebiprogrammeerimine1_ryhm1 = '<a href="https://github.com/veebiprogrammeerimine2018s/ryhm1" class="under" target="_blank">GitHub</a>';
$link_veebiprogrammeerimine1_ryhm2 = '<a href="https://github.com/veebiprogrammeerimine2018s/ryhm2" class="under" target="_blank">GitHub</a>';
$link_veebiprogrammeerimine1_ryhm3 = '<a href="https://github.com/veebiprogrammeerimine2018s/ryhm3" class="under" target="_blank">GitHub</a>';
$link_veebiprogrammeerimine2 = '<br><a href="http://greeny.cs.tlu.ee/~rinde/veebiprogrammeerimine2018s" class="under" target="_blank">failid¹²</a>';

$link_opsys_alused_ja_haldamine1 = '<a href="http://minitorn.cs.tlu.ee/IFI6209/" class="under" target="_blank">minitorn²</a>';
$link_opsys_alused_ja_haldamine2 = '<br><a href="http://www.cs.tlu.ee/IFI6209/" class="under" target="_blank">failid²</a>';

$link_programmeerimise_alused1 = '<a href="http://www.cs.tlu.ee/~inga/progbaas/" class="under" target="_blank">info²</a>';
$link_programmeerimise_alused2 = '<br><a href="http://www.cs.tlu.ee/~inga/progbaas/Prog_naited/" class="under" target="_blank">näited²</a>';
$link_programmeerimise_alused3 = '<br><a href="http://www.cs.tlu.ee/~inga/Prog_materjalid/" class="under" target="_blank">loengud</a>';

$link_digipadevuse_baaskursus1 = '<a href="https://www.tlu.ee/~kivik/Digipad/" class="under" target="_blank">failid</a>';

$link_andmebaaside_projekteerimine1 = '<a href="http://www.cs.tlu.ee/~inga/AB_proj/" class="under" target="_blank">info²</a>';

$link_oppimine_korgkoolis1 = '<a href="https://edidaktikum.ee/" class="under" target="_blank">eDidaktikum</a>';
$link_oppimine_korgkoolis2 = '<br><a href="https://dti6001.wordpress.com/" class="under" target="_blank">kirjeldus</a>';

$link_praktiline_matemaatika1 = '<a href="https://sites.google.com/site/praktilinematemaatika2019/" class="under" target="_blank">Google Sites</a>';
$link_praktiline_matemaatika2 = '';

?>
<!DOCTYPE html>
<html lang="et">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<title>IF18</title>
<?php

if ($numberOfTheDay == 1 or $numberOfTheDay == 2 or $numberOfTheDay == 3 or $numberOfTheDay == 4 or $numberOfTheDay == 5 or isset($enteredTheme)){

	echo "<style>";
	
	if ($enteredTheme == "dark"){
		
		echo "html,body { background-color: black; color: white; }\n";
		echo ".container { background-color: black; color: white; }\n";
		echo ".table { background-color: black; color: white; }\n";
		echo "a:link, a:visited { color: white; }\n";
		echo "a.special { color: hotpink; }\n";
		echo "a.special:hover { color: white; }\n";
		echo ".more a.under:hover { color: white; border-color: hotpink; }\n";
		echo ".handdrawnbox { border: 2px solid #ffffff; }\n";
		echo ".label { color: white; }\n";	
		
	} 	
	
	$darkColor = "#303030";
	$otherColor = "yellow";
	
	if ($numberOfTheDay == 1) {
		echo ".handdrawnbox.Monday { background-color: ";
		if ($enteredTheme == "dark"){
			echo $darkColor;
		} else {
			echo $otherColor;
		}
		echo "; }\n";
	} elseif ($numberOfTheDay == 2) {
		echo ".handdrawnbox.Tuesday { background-color: ";
		if ($enteredTheme == "dark"){
			echo $darkColor;
		} else {
			echo $otherColor;
		}
		echo "; }\n";
	} elseif ($numberOfTheDay == 3) {
		echo ".handdrawnbox.Wednesday { background-color: ";
		if ($enteredTheme == "dark"){
			echo $darkColor;
		} else {
			echo $otherColor;
		}
		echo "; }\n";
	} elseif ($numberOfTheDay == 4) {		
		echo ".handdrawnbox.Thursday { background-color: ";
		if ($enteredTheme == "dark"){
			echo $darkColor;
		} else {
			echo $otherColor;
		}
		echo "; }\n";
	} elseif ($numberOfTheDay == 5) {
		echo ".handdrawnbox.Friday { background-color: ";
		if ($enteredTheme == "dark"){
			echo $darkColor;
		} else {
			echo $otherColor;
		}
		echo "; }\n";
	}
	
	echo "</style>";
}

?>
</head>
<body>

<div class="container">
<div class="ribbon bottom-right posiFixed hotpink"><a href="changelog.log" class="specialTwo" target="_blank">changelog</a></div>
<h5>1.2.0</h5>
<h4>IF18</h4>
<div class="tabs">
  <input class="input" name="tabs" type="radio" id="tab-1"<?php echo $firstChecked . $defaultChecked?>/>
  <label class="label" for="tab-1">1. rühm</label>
  <div class="panel">
    <table class="table">
	<tr class="weekdays">
		<td></td>
		<td>Mon</td>
		<td>Tue</td>
		<td>Wed</td>
		<td>Thu</td>
		<td>Fri</td>
	</tr>
	<tr>
		<th>08:15 - 09:45</th>
		<td class="handdrawnbox Monday" rowspan="2"><a id="hide11" href="#hide11" class="hide"><?php echo $subject_digipadevuse_baaskursus ?></a><a id="show11" href="#show11" class="show"><?php echo $subject_digipadevuse_baaskursus ?></a><div class="more"><?php echo $link_digipadevuse_baaskursus1 ?></div></td>
		<td class="handdrawnbox Tuesday" rowspan="2"><a id="hide12" href="#hide12" class="hide"><?php echo $subject_veebiprogrammeerimine ?></a><a id="show12" href="#show12" class="show"><?php echo $subject_veebiprogrammeerimine ?></a><div class="more"><?php echo $link_veebiprogrammeerimine1_ryhm1 . $link_veebiprogrammeerimine2 ?></div></td>
		<td></td>
		<td></td>
		<td class="handdrawnbox Friday" rowspan="2"><a id="hide13" href="#hide13" class="hide"><?php echo $subject_oppimine_korgkoolis ?></a><a id="show13" href="#show13" class="show"><?php echo $subject_oppimine_korgkoolis ?></a><div class="more"><?php echo $link_oppimine_korgkoolis1 . $link_oppimine_korgkoolis2 ?></div></td>
	</tr>
	<tr>
		<th>10:15 - 11:45</th>
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
		<td></td>
		<td></td>
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
	</tr>
	<tr>
		<th>12:15 - 13:45</th>
		<td class="handdrawnbox Monday"><a id="hide14" href="#hide14" class="hide"><?php echo $subject_opsys_alused_ja_haldamine ?></a><a id="show14" href="#show14" class="show"><?php echo $subject_opsys_alused_ja_haldamine ?></a><div class="more"><?php echo $link_opsys_alused_ja_haldamine1 . $link_opsys_alused_ja_haldamine2 ?></div></td>
		<td class="handdrawnbox Tuesday" rowspan="2"><a id="hide15" href="#hide15" class="hide"><?php echo $subject_programmeerimise_alused ?></a><a id="show15" href="#show15" class="show"><?php echo $subject_programmeerimise_alused ?></a><div class="more"><?php echo $link_programmeerimise_alused1 . $link_programmeerimise_alused2 . $link_programmeerimise_alused3 ?></div></td>
		<td class="handdrawnbox Wednesday"><a id="hide16" href="#hide16" class="hide"><?php echo $subject_andmebaaside_projekteerimine ?></a><a id="show16" href="#show16" class="show"><?php echo $subject_andmebaaside_projekteerimine ?></a><div class="more"><?php echo $link_andmebaaside_projekteerimine1 ?></div></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<th>14:15 - 15:45</th>
		<td></td>
		<!-- <td>data</td> rip -->
		<td class="handdrawnbox Wednesday"><a id="hide17" href="#hide17" class="hide"><?php echo $subject_opsys_alused_ja_haldamine ?></a><a id="show17" href="#show17" class="show"><?php echo $subject_opsys_alused_ja_haldamine ?></a><div class="more"><?php echo $link_opsys_alused_ja_haldamine1 . $link_opsys_alused_ja_haldamine2 ?></div></td>
		<td class="handdrawnbox Thursday" rowspan="2"><a id="hide18" href="#hide18" class="hide"><?php echo $subject_praktiline_matemaatika ?></a><a id="show18" href="#show18" class="show"><?php echo $subject_praktiline_matemaatika ?></a><div class="more"><?php echo $link_praktiline_matemaatika1 . $link_praktiline_matemaatika2 ?></div></td>
		<td></td>
	</tr>
	<tr>
		<th>16:15 - 17:45</th>
		<td></td>
		<td></td>
		<td></td>
		<!--<td>X</td>-->
		<td></td>
	</tr>
</table>
  </div>
  <input class="input" name="tabs" type="radio" id="tab-2"<?php echo $secondChecked?>/>
  <label class="label" for="tab-2">2. rühm</label>
  <div class="panel">
    <table class="table">
	<tr class="weekdays">
		<td></td>
		<td>Mon</td>
		<td>Tue</td>
		<td>Wed</td>
		<td>Thu</td>
		<td>Fri</td>
	</tr>
	<tr>
		<th>08:15 - 09:45</th>
		<td class="handdrawnbox Monday" rowspan="2"><a id="hide21" href="#hide21" class="hide"><?php echo $subject_programmeerimise_alused ?></a><a id="show21" href="#show21" class="show"><?php echo $subject_programmeerimise_alused ?></a><div class="more"><?php echo $link_programmeerimise_alused1 . $link_programmeerimise_alused2 . $link_programmeerimise_alused3 ?></div></td>
		<td class="handdrawnbox Tuesday" rowspan="2"><a id="hide22" href="#hide22" class="hide"><?php echo $subject_digipadevuse_baaskursus ?></a><a id="show22" href="#show22" class="show"><?php echo $subject_digipadevuse_baaskursus ?></a><div class="more"><?php echo $link_digipadevuse_baaskursus1 ?></div></td>
		<td></td>
		<td></td>
		<td class="handdrawnbox Friday" rowspan="2"><a id="hide23" href="#hide23" class="hide"><?php echo $subject_oppimine_korgkoolis ?></a><a id="show23" href="#show23" class="show"><?php echo $subject_oppimine_korgkoolis ?></a><div class="more"><?php echo $link_oppimine_korgkoolis1 . $link_oppimine_korgkoolis2 ?></div></td>
	</tr>
	<tr>
		<th>10:15 - 11:45</th>
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
		<td></td>
		<td></td>
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
	</tr>
	<tr>
		<th>12:15 - 13:45</th>
		<td class="handdrawnbox Monday"><a id="hide24" href="#hide24" class="hide"><?php echo $subject_opsys_alused_ja_haldamine ?></a><a id="show24" href="#show24" class="show"><?php echo $subject_opsys_alused_ja_haldamine ?></a><div class="more"><?php echo $link_opsys_alused_ja_haldamine1 . $link_opsys_alused_ja_haldamine2 ?></div></td>
		<td class="handdrawnbox Tuesday" rowspan="2"><a id="hide25" href="#hide25" class="hide"><?php echo $subject_veebiprogrammeerimine ?></a><a id="show25" href="#show25" class="show"><?php echo $subject_veebiprogrammeerimine ?></a><div class="more"><?php echo $link_veebiprogrammeerimine1_ryhm2 . $link_veebiprogrammeerimine2 ?></div></td>
		<td class="handdrawnbox Wednesday"><a id="hide26" href="#hide26" class="hide"><?php echo $subject_opsys_alused_ja_haldamine ?></a><a id="show26" href="#show26" class="show"><?php echo $subject_opsys_alused_ja_haldamine ?></a><div class="more"><?php echo $link_opsys_alused_ja_haldamine1 . $link_opsys_alused_ja_haldamine2 ?></div></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<th>14:15 - 15:45</th>
		<td></td>
		<!-- <td>data</td> rip -->
		<td class="handdrawnbox Wednesday"><a id="hide27" href="#hide27" class="hide"><?php echo $subject_andmebaaside_projekteerimine ?></a><a id="show27" href="#show27" class="show"><?php echo $subject_andmebaaside_projekteerimine ?></a><div class="more"><?php echo $link_andmebaaside_projekteerimine1 ?></div></td>
		<td class="handdrawnbox Thursday" rowspan="2"><a id="hide28" href="#hide28" class="hide"><?php echo $subject_praktiline_matemaatika ?></a><a id="show28" href="#show28" class="show"><?php echo $subject_praktiline_matemaatika ?></a><div class="more"><?php echo $link_praktiline_matemaatika1 . $link_praktiline_matemaatika2 ?></div></td>
		<td></td>
	</tr>
	<tr>
		<th>16:15 - 17:45</th>
		<td></td>
		<td></td>
		<td></td>
		<!--<td></td>-->
		<td></td>
	</tr>
</table>
  </div>
  <input class="input" name="tabs" type="radio" id="tab-3"<?php echo $thirdChecked?>/>
  <label class="label" for="tab-3">3. rühm</label>
  <div class="panel">
    <table class="table">
	<tr class="weekdays">
		<td></td>
		<td>Mon</td>
		<td>Tue</td>
		<td>Wed</td>
		<td>Thu</td>
		<td>Fri</td>
	</tr>
	<tr>
		<th>08:15 - 09:45</th>
		<td class="handdrawnbox Monday" rowspan="2"><a id="hide31" href="#hide31" class="hide"><?php echo $subject_veebiprogrammeerimine ?></a><a id="show31" href="#show31" class="show"><?php echo $subject_veebiprogrammeerimine ?></a><div class="more"><?php echo $link_veebiprogrammeerimine1_ryhm3 . $link_veebiprogrammeerimine2 ?></div></td>
		<td class="handdrawnbox Tuesday" rowspan="2"><a id="hide32" href="#hide32" class="hide"><?php echo $subject_programmeerimise_alused ?></a><a id="show32" href="#show32" class="show"><?php echo $subject_programmeerimise_alused ?></a><div class="more"><?php echo $link_programmeerimise_alused1 . $link_programmeerimise_alused2 . $link_programmeerimise_alused3 ?></div></td>
		<td class="handdrawnbox Wednesday"><a id="hide33" href="#hide33" class="hide"><?php echo $subject_andmebaaside_projekteerimine ?></a><a id="show33" href="#show33" class="show"><?php echo $subject_andmebaaside_projekteerimine ?></a><div class="more"><?php echo $link_andmebaaside_projekteerimine1 ?></div></td>
		<td></td>
		<td class="handdrawnbox Friday" rowspan="2"><a id="hide34" href="#hide34" class="hide"><?php echo $subject_oppimine_korgkoolis ?></a><a id="show34" href="#show34" class="show"><?php echo $subject_oppimine_korgkoolis ?></a><div class="more"><?php echo $link_oppimine_korgkoolis1 . $link_oppimine_korgkoolis2 ?></div></td>
	</tr>
	<tr>
		<th>10:15 - 11:45</th>
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
		<td></td>
		<td></td>
		<!-- <td>data</td> Removed this one due to previous row including rowspan -->
	</tr>
	<tr>
		<th>12:15 - 13:45</th>
		<td class="handdrawnbox Monday"><a id="hide35" href="#hide35" class="hide"><?php echo $subject_opsys_alused_ja_haldamine ?></a><a id="show35" href="#show35" class="show"><?php echo $subject_opsys_alused_ja_haldamine ?></a><div class="more"><?php echo $link_opsys_alused_ja_haldamine1 . $link_opsys_alused_ja_haldamine2 ?></div></td>
		<td class="handdrawnbox Tuesday" rowspan="2"><a id="hide36" href="#hide36" class="hide"><?php echo $subject_digipadevuse_baaskursus ?></a><a id="show36" href="#show36" class="show"><?php echo $subject_digipadevuse_baaskursus ?></a><div class="more"><?php echo $link_digipadevuse_baaskursus1 ?></div></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<th>14:15 - 15:45</th>
		<td></td>
		<!-- <td>data</td> rip -->
		<td></td>
		<td class="handdrawnbox Thursday" rowspan="2"><a id="hide37" href="#hide37" class="hide"><?php echo $subject_praktiline_matemaatika ?></a><a id="show37" href="#show37" class="show"><?php echo $subject_praktiline_matemaatika ?></a><div class="more"><?php echo $link_praktiline_matemaatika1 . $link_praktiline_matemaatika2 ?></div></td>
		<td></td>
	</tr>
	<tr>
		<th>16:15 - 17:45</th>
		<td></td>
		<td class="handdrawnbox Tuesday"><a id="hide38" href="#hide38" class="hide"><?php echo $subject_opsys_alused_ja_haldamine ?></a><a id="show38" href="#show38" class="show"><?php echo $subject_opsys_alused_ja_haldamine ?></a><div class="more"><?php echo $link_opsys_alused_ja_haldamine1 . $link_opsys_alused_ja_haldamine2 ?></div></td>
		<td></td>
		<!--<td></td>-->
		<td></td>
	</tr>
</table>
  </div>
</div>
<h2>¹ ligipääsetav ainult läbi TLÜ lan-ist vöi tunneliga</h2>
<h2>² no https</h2>
<?php

if ($numberOfTheDay > 5) {
	echo "<h3>** No highlight due to it being ";
	
	if ($numberOfTheDay == 6 ) {
		echo "Saturday</h3>";	
	} elseif ($numberOfTheDay == 7) {
		echo "Sunday</h3>";
	} elseif ($numberOfTheDay > 7) {
		echo "Alien Day (please contact Fox Molder and Dana Scully) no, seriously, please report this bug, no such day (php date('N') > 7)</h3>";
	}
}
?>

<h4>Üldinfo</h4>
<ul>
	<li><h8><a href="https://ifikas18.slack.com" class="special" target="_blank">ifikas18.slack.com</a></h8> or <a href="https://join.slack.com/t/ifikas18/signup" class="special" target="_blank">registreeri</a></li>
	<li>student:D..</li>
	<li>\\bitt\if18 | if18:ra..</li>
	<li>greeny.cs.tlu.ee | osa_eesnimest + osa_perenimest:pw</li>
	<li>lin2.tlu.ee | ÕIS kasutaja:pw</li>
	<li><a href="https://www.tlu.ee/asio/" class="special" target="_blank">ASIO</a> (https) | <a href="https://www.tlu.ee/asio/kalenterit2/index.php?av_v=&av=180910180916180916&cluokka=&kt=lk&laji=&guest=intranet%2Ftu&lang=est&ui=&yks=&clk%5B%5D=IFIFB-1&jagu=4&b_lk=Esita+valik+kombineeritult+%3E%3E&b=1537092414&av_y=0" class="special" target="_blank">ASIO IFIF18 1.õ.-a.</a> (https)</li>
	<li><a href="https://www.tlu.ee/masio/" class="special" target="_blank">mASIO</a> (https) | <a href="https://www.tlu.ee/masio/?id=ryhm&ryhm=IFIFB-1#mASIO" class="special" target="_blank">mASIO IFIF18 1.õ.-a.</a> (https)</li>
	<li><a href="https://ois2.tlu.ee/" class="special" target="_blank">ÕIS</a> (https)</li>
	<li><a id="hide40" href="#hide40" class="hide special">+ GitHub käsud (push)</a><a id="show40" href="#show40" class="show special">- GitHub käsud (push)</a><div class="more"><p>git add .</p><p>git commit -m "kommentaar"</p><p>git push</p></div></li>
	<li><a id="hide41" href="#hide41" class="hide special">+ SQL info</a><a id="show41" href="#show41" class="show special">- SQL info</a><div class="more"><p><a href="http://greeny.cs.tlu.ee/phpMyAdmin" class="special" target="_blank">greeny.cs.tlu.ee/phpMyAdmin</a> (tunneliga ainult)</p><p>greeny (putty): mysql -uif.. -pif.. if18_nimi (spetsiaalselt ei kirjutanud välja)</p></div></li>
	<li><a id="hide42" href="#hide42" class="hide special">+ muud materjalid</a><a id="show42" href="#show42" class="show special">- muud materjalid</a><div class="more"><p><a href="http://caupo.ee/tlu/" class="special" target="_blank">http://caupo.ee/tlu/</a></p><p><a href="http://www.cs.tlu.ee/instituut/nouded/lopu_too/yliopilastoode_vormistusjuhend_2016a.pdf" class="special" target="_blank">Lõputöö vormistamise juhend</a></p><p><a href="https://madis0.gitlab.io/tlu-eap/" class="special" target="_blank">Madise EAP calc</a></p><p><a href="https://drive.google.com/drive/u/0/folders/16hDQYkxrAxfkkIYyaWXUOwvxAp4VpnH1" class="special" target="_blank">Caupo TLÜ Google Drive Shared</a></p><p><a href="https://products.office.com/en/student/office-in-education" class="special" target="_blank">Office 365 for students for free</a></p></div></li>
</ul>
<div class="by">by Raimo Pregel, 2018</div>
</div>

</body>
</html>
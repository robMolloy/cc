<?php
$gap = 20;
$mediumGap = 10;
$smallGap = 2;
$g = $gap;
$mg = $mediumGap;
$sg = $smallGap;

$brightThemeColor = '#FFFFFF';
$lightThemeColor = '#EEEEEE';
$mediumThemeColor = '#CCCCCC';
$darkThemeColor = '#222222';
$alertThemeColor = '#FF0000';
$lightAlertThemeColor = '#FFCCCC';
$highlightThemeColor = '#90EE90';

$btc = $brightThemeColor;
$ltc = $lightThemeColor;
$mtc = $mediumThemeColor;
$dtc = $darkThemeColor;
$atc = $alertThemeColor;
$latc = $lightAlertThemeColor;
$htc = $highlightThemeColor;
?>
<style type="text/css">
@font-face {font-family:'Montserrat';font-style:normal;font-weight:400;src:url('includes/css/fonts/montserrat-v14-latin-regular.eot');src:local('Montserrat Regular'),local('Montserrat-Regular'),url('includes/css/fonts/montserrat-v14-latin-regular.eot?#iefix') format('embedded-opentype'),url('includes/css/fonts/montserrat-v14-latin-regular.woff2') format('woff2'),url('includes/css/fonts/montserrat-v14-latin-regular.woff') format('woff'),url('includes/css/fonts/montserrat-v14-latin-regular.ttf') format('truetype'),url('includes/css/fonts/montserrat-v14-latin-regular.svg#Montserrat') format('svg'); }

*       {margin:0;padding:0;color:<?php echo $dtc;?>;box-sizing:border-box;}

body    {height:100vh;background-color:<?php echo $ltc;?>;display:flex;flex-flow:column;font-family:'Montserrat';}
	
header  {background-color:<?php echo $btc; ?>;border-bottom:2px solid <?php echo $mtc; ?>;overflow-x:auto;display:flex;width:100%;}
#content{flex:1;overflow-y:auto;display:flex;height:100%;}
footer {background-color:#FFFFFF;border-top:1px solid <?php echo $mtc; ?>}

/*don't show scrollbar*/
header  {-ms-overflow-style:none;scrollbar-width:none;}
header::-webkit-scrollbar {display:none;}

header > #tabs {display:flex;}
header > #tabs > * {padding:<?php echo $gap; ?>px;border-right:1px solid <?php echo $mtc; ?>;min-width:115px;text-align:center;cursor:pointer;white-space:nowrap;}
header > #tabs > *:hover {background-color:<?php echo $ltc; ?>;}
header > #tabs > *.highlight {background-color:<?php echo $htc; ?>;}

header > #settings {display:flex;flex:1;justify-content:right;}
header > #settings > * {padding:20px;min-width:115px;cursor:pointer;white-space:nowrap;align-items:center;display:flex;justify-content:center;border-right:1px solid <?php echo $mtc; ?>;}
header > #settings > *:hover {background-color:<?php echo $ltc; ?>;}


/*
header img {height:50px;border-radius:0 0 2px 2px;}
header > *:nth-child(1) > * {display:flex;align-items:center;margin-left:10px;}
header > * > *:nth-child(1) {flex:1;margin-left:0;}    
*/

main    {text-align:center;margin:0 auto;padding:<?php echo $sg; ?>px 0;flex:1;overflow-y:scroll;}
a       {text-decoration:none;}

input[type=text], input[type=password], select, textarea {
	padding:7px;background-color:<?php echo $ltc;?>;color:<?php echo $dtc;?>;
	border:1px solid <?php echo $mtc;?>;flex:1;
}
input[type=text]:focus, input[type=password]:focus, textarea:focus {background-color:<?php echo $btc;?>;}
textarea {resize:vertical;height:100px;}

button {
	background-color:<?php echo $dtc;?>;border:1px solid <?php echo $mtc;?>;border-radius:3px;
	color:<?php echo $btc;?>;padding:5px 10px;text-align:center;text-decoration:none;
	display:inline-block;text-transform:uppercase;font-size:16px;cursor:pointer;
}
button:hover {background-color:<?php echo $ltc;?>;color:<?php echo $mtc;?>;}
button.svg {padding:5px;display:flex;align-items:center;}
button.svg > * {width:20px;}


#wrapperMain {
	min-width:30%;max-width:80vw;text-align:center;overflow-wrap:break-word;
	/*.singleColumn*/
	display:inline-grid;grid-template-columns:repeat(1,auto);grid-row-gap:<?php echo $sg; ?>px;
}
#wrapperMain > *:nth-last-child(1) {margin-bottom:<?php echo $sg; ?>px;}

.hidden {display:none !important;}
.error {font-size:15px;color:<?php echo $atc;?>;}
.highlight {background-color:<?php echo $htc; ?>;}

.singleColumn {display:grid;grid-template-columns:repeat(1,auto);grid-row-gap:0px;}
.oneLineContents {display:flex;align-items:center;}
.centerContents {display:flex;justify-content:center;align-items:center;}
.centerContentsHorizontally {display:flex;justify-content:center;align-items:flex-start;}
.centerContentsVertically {display:flex;align-items:center;}

.panel {
	background-color:<?php echo $btc;?>;padding:<?php echo $gap; ?>px;
	/*.singleColumn*/
	display:grid;grid-template-columns:repeat(1,auto);grid-row-gap:<?php echo $gap; ?>px;
}
.panel > * {display:flex;align-items:center;text-align:left;}
.panel > * > div {flex:1;}
.panel > * > * {margin-left:<?php echo $g; ?>px;}
.panel > * > *:nth-child(1) {margin-left:0;}
.panel p, .panel span {justify-content:center;text-align:center;}

.panel.progressPanel {cursor:pointer;}
.panel > *.progressBar {border-radius:10px;}
.panel > *.progressBar > * {margin-left:0;min-height:1em;background-color:#DDDDDD;}
.panel > *.progressBar > *.highlight {background-color:#90EE90;}

.singlePanel {margin-top:<?php echo ($g - $sg); ?>px;}

.alignLeft {/* ** Panel Items Align Left by default ** */}
.alignRight {display:flex;justify-content:flex-end;}
.alignCenter {display:flex;justify-content:center;}

.alignItemsLeft > * {/* ** Panel Items Align Left by default ** */}
.alignItemsRight > * {display:flex;justify-content:flex-end;}
.alignItemsCenter > * {display:flex;justify-content:center;}

.h100 {height:100%;}
.borderRight {border-right:1px solid <?php echo $dtc; ?>}

.font80 {font-size:0.8em;}

.infoBar {position:fixed;min-width:100vw;top:40px;text-align:center;}
.notification > * {margin:auto;display:inline-block;background-color:<?php echo $btc; ?>;padding:20px;border:solid 5px <?php echo $latc; ?>;min-width:40vw;max-width:70vw;}

#responseLogIcon {background-image:url("img/icon.png");background-size:cover;position:fixed;bottom:0px;right:0px;min-height:50px;min-width:50px;cursor:pointer;z-index:1;}
#responseLog {background-color:<?php echo $latc; ?>;position:fixed;display:inline-block;overflow-wrap:break-word;bottom:20px;right:20px;height:40vh;width:40vw;min-width:250px;border-radius:0 0 30px 0;overflow-y:auto;}

#timerIcon {background-image:url("img/icon.png");background-size:cover;position:fixed;bottom:<?php echo $g; ?>px;left:0px;min-height:50px;min-width:50px;cursor:pointer;z-index:1;}
#timerPanel {opacity:0.75;background-color:<?php echo $latc; ?>;position:fixed;display:inline-block;overflow-wrap:break-word;bottom:20px;left:0px;height:40vh;width:40vw;min-width:250px;overflow-y:auto;}

@media(max-width:768px){
	button:hover {background-color:<?php echo $dtc;?>;color:<?php echo $btc;?>;}
	button:active {background-color:<?php echo $ltc;?>;color:<?php echo $mtc;?>;}

	#wrapperMain {min-width:100vw;max-width:100vw;border-left:<?php echo 2*$sg; ?>px solid <?php echo $ltc; ?>;border-right:<?php echo 2*$sg; ?>px solid <?php echo $ltc; ?>;}
}
</style>

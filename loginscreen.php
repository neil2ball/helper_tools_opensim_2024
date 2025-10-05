<?
include("settings/config.php");
include("settings/mysql.php");

$DbLink = new DB;

/*$DbLink->query("SELECT gridstatus,active,color,title,message  FROM ".C_INFOWINDOW_TBL." ");
list($GRIDSTATUS,$INFOBOX,$BOXCOLOR,$BOX_TITLE,$BOX_INFOTEXT) = $DbLink->next_record();*/

// Count users currently online (last 24 hours)
$DbLink->query("SELECT count(*) FROM ".C_AGENTS_TBL." WHERE Online = 'True' AND Login > UNIX_TIMESTAMP(NOW() - INTERVAL 1 DAY)");
list($NOWONLINE) = $DbLink->next_record();

// Count users active in the last month
$DbLink->query("SELECT count(*) FROM ".C_AGENTS_TBL." WHERE Login > UNIX_TIMESTAMP(NOW() - INTERVAL 28 DAY)");
list($LASTMONTHONLINE) = $DbLink->next_record();

// Count total registered users
$DbLink->query("SELECT count(*) FROM ".C_USERS_TBL);
list($USERCOUNT) = $DbLink->next_record();

// Count total regions
$DbLink->query("SELECT count(*) FROM ".C_REGIONS_TBL);
list($REGIONSCOUNT) = $DbLink->next_record();
		
?>
<!DOCTYPE html>
<TITLE><?php echo SYSNAME; ?> Login</TITLE>
<LINK href="loginscreen/style.css" type=text/css rel=stylesheet>
<SCRIPT src="loginscreen/resize.js" type=text/javascript></SCRIPT>
<SCRIPT src="loginscreen/imageswitch.js" type=text/javascript></SCRIPT>

<SCRIPT>
$(document).ready(function(){
bgImgRotate();
});
</SCRIPT>

<DIV id=top_image><IMG height=139 
src="images/login_screens/logo.png" width=307>
</DIV>
<DIV id=bottom_left>
<DIV id=regionbox>
<? 
include("loginscreen/region_box.php"); 
?>
</DIV> 
</DIV>

<IMG id=mainImage src="images/login_screens/spacer.gif"> 
<!--
<DIV id="bottom">
    <DIV id="news">
        <?php
        // include("loginscreen/news.php");
        ?>
    </DIV>
</DIV>
-->

<DIV id=topright>
<br />
<br />
<br />
<DIV id=gridstatus>
<? include("loginscreen/gridstatus.php"); ?>
</DIV>
<br />
<!--
<DIV id=Infobox>
<?php
/*
if(($INFOBOX=="1")&&($BOXCOLOR=="white")){
    include("loginscreen/box_white.php"); 
}else if(($INFOBOX=="1")&&($BOXCOLOR=="green")){
    include("loginscreen/box_green.php"); 
}else if(($INFOBOX=="1")&&($BOXCOLOR=="yellow")){
    include("loginscreen/box_yellow.php"); 
}else if(($INFOBOX=="1")&&($BOXCOLOR=="red")){
    include("loginscreen/box_red.php"); 
}
*/
?>
</DIV>
-->

</DIV>
<?php
#################################################################################
#
#  Written by: Martynas Matuliauskas
#  E-mail: martynas.m@delfi.lt; web@editor.lt; admin@gomultiplex.com
#  Phone: +370 683 21711
#  Martynas Matuliauskas 2001-2002 Copyright(C)
#
#  Created:	2002 05 31
#  Modified:	2002 06 11
#
#  MD5signature:   0Rk8PZCp2DJa6c16102mcfab8a80ddd706ad514682facdd369d5mcKHOafGqA9
#  
#  All rights reserved.
#
#################################################################################
#################################################################################

$PHP_SELF=$_SERVER["PHP_SELF"];
$y=$HTTP_GET_VARS["y"];
$sm=$HTTP_GET_VARS["sm"];
$sd=$HTTP_GET_VARS["sd"];
$action=$HTTP_GET_VARS["a"];
$timestamp=$HTTP_GET_VARS["tstamp"];

if ($timestamp) {
	$y=@date("Y", $timestamp);
	$sm=@date("m", $timestamp);
	$sd=@date("d", $timestamp);
}

function MakeCalendar($sDateArg,$iSizeArg="",$sColorArg="") {
global $bordercolor, $bordersize, $monthName, $fontface, $txtcolor, $mounthtbbgcolor, $sm, $sd, $selectday;
		$MMsm=$sm;
		$MMsd=$sd;
		$DefaultCalendarBorderColor = $bordercolor;
		$DefaultCalendarBorderSize = $bordersize; 
		$borderSize = $DefaultCalendarBorderSize;
		$borderColor = $DefaultCalendarBorderColor;
	
			list ($iThisMonth, $iThisDay, $iThisYear) = split ('[/.-]', $sDateArg);		
			$thismonthfulldate = mktime (0,0,0,$iThisMonth,$iThisDay,$iThisYear);	
			$sThisMonthName = $monthName[$iThisMonth-1];
			$iThisMonthStartsThisDay = @date ("w", mktime (0,0,0,$iThisMonth, $iThisDay, $iThisYear));
			$nextmonthfulldate = mktime (0,0,0,$iThisMonth+1,$iThisDay,$iThisYear);
			$iDateDiffInMs = $thismonthfulldate - $nextmonthfulldate; 
			$iDaysThisMonth = abs (  $iDateDiffInMs / 86400 );
			if ($iDaysThisMonth>31) {$iDaysThisMonth = 31;}
			if ($iSizeArg) {$borderSize = $iSizeArg;}
			if ($sColorArg) {$borderColor = $sColorArg;}
			if ($MMsm!=$iThisMonth) {
				unset($MMsd);
			}
		if ($iSizeArg) {
			echo "<table cellpadding=\"$borderSize\" cellspacing=\"0\" border=\"0\" 
			bgcolor=\"$borderColor\"><tr><td>";
		}
if ($iThisMonth==$MMsm) { $an="<a name=\"$iThisMonth\"></a>";	}	
echo "
<table border=0 cellpadding=0 cellspacing=0 width=150 height=15>
<tr>
<td bgcolor=#FF0000 width=150 align=center><font class=font-12>
$sThisMonthName</font>
</td>
</tr>
</table>
<table bgcolor=#A8A8A8 border=0 cellpadding=2 cellspacing=1 width=150>";
echo "
<tr> 
<td align=center bgcolor=CFCFCF>
<font class=font-10>
<span class=font-azul>
D</span>
</font>
</td>

              
<td align=center bgcolor=CFCFCF>
<font class=font-10>
<span class=font-azul>
S</span>
</font>
</td>

              
<td align=center bgcolor=CFCFCF>
<font class=font-10>
<span class=font-azul>
T</span>
</font>
</td>

              
<td align=center bgcolor=CFCFCF>
<font class=font-10>
<span class=font-azul>
Q</span>
</font>
</td>

              
<td align=center bgcolor=CFCFCF>
<font class=font-10>
<span class=font-azul>
Q</span>
</font>
</td>

              
<td align=center bgcolor=CFCFCF>
<font class=font-10>
<span class=font-azul>
S</span>
</font>
</td>

              
<td align=center bgcolor=CFCFCF>
<font class=font-10>
<span class=font-azul>
S</span>
</font>
</td>
</tr>";
		echo "\n<tr>\n";
		
		static $iDayToDisplay=1;
			
		for ($i=0; $i<7; $i++) {
			if ($i==$iThisMonthStartsThisDay) { 
				$iDayToDisplay=1;
			} else if ($i>$iThisMonthStartsThisDay) { 
				$iDayToDisplay+=1;
			} else {                 
				$iDayToDisplay="&nbsp;";				
			}
			if($MMsd==$iDayToDisplay) { $s="  bgcolor=\"$selectday\""; $cl=" class=\"border\""; } else { $s=""; $cl=""; }

$hoje = date("d");
if($iDayToDisplay == $hoje){
echo "<td align=center bgcolor=A8A8A8><font class=font-10 color=white>$iDayToDisplay</font></td>\n";
} else {
echo "<td align=center bgcolor=F0F0F0><font class=font-10 color=black>$iDayToDisplay</font></td>\n";
}
		}
		
		echo "</tr>\n";
		$weekstogo = round( ($iDaysThisMonth-$iDayToDisplay+$iThisMonthStartsThisDay) / 7 );
			if (($iDaysThisMonth==30) && ($iThisMonthStartsThisDay==0)) {$weekstogo=4;}
			if (($iDaysThisMonth==30) && ($iThisMonthStartsThisDay==5)) {$weekstogo=4;}
			if (($iDaysThisMonth==31) && ($iThisMonthStartsThisDay==0)) {$weekstogo=4;}
			if (($iDaysThisMonth==31) && ($iThisMonthStartsThisDay==6)) {$weekstogo=5;}
			if (($iDaysThisMonth==31) && ($iThisMonthStartsThisDay==4)) {$weekstogo=4;}
		
		for ($x=1; $x<=$weekstogo; $x++) {
			echo "<tr>\n";
			for ($i=0; $i<7; $i++) {
				if ( $iDayToDisplay<$iDaysThisMonth && is_int($iDayToDisplay) ) {
					$iDayToDisplay+=1;
				} else {								
					$iDayToDisplay="&nbsp;"; 
				}
				if($MMsd==$iDayToDisplay) { $s="  bgcolor=\"$selectday\"";  $cl=" class=\"border\""; } else { $s=""; $cl=""; }
				if($iDayToDisplay == $hoje){
echo "<td align=center bgcolor=A8A8A8><font class=font-10 color=white>$iDayToDisplay</font></td>\n";
} else {
echo "<td align=center bgcolor=F0F0F0><font class=font-10 color=black>$iDayToDisplay</font></td>\n";
}
			}
			echo "</tr>\n";
		}
		
		echo "<tr>
<td align=center bgcolor=F0F0F0><font class=font-10 color=black>&nbsp;</font></td>
<td align=center bgcolor=F0F0F0><font class=font-10 color=black>&nbsp;</font></td>
<td align=center bgcolor=F0F0F0><font class=font-10 color=black>&nbsp;</font></td>
<td align=center bgcolor=F0F0F0><font class=font-10 color=black>&nbsp;</font></td>
<td align=center bgcolor=F0F0F0><font class=font-10 color=black>&nbsp;</font></td>
<td align=center bgcolor=F0F0F0><font class=font-10 color=black>&nbsp;</font></td>
<td align=center bgcolor=F0F0F0><font class=font-10 color=black>&nbsp;</font></td>
</tr>
</table>";
	if ($iSizeArg) { echo "</td></tr></table>"; }	
}
 
 

?>
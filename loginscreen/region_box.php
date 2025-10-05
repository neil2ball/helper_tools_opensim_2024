<?php
$ORDERBY = " ORDER BY regionName ASC";
if (isset($_GET['regio'])) {
    if ($_GET['regio'] == "x") {
        $ORDERBY = " ORDER BY locX ASC";
    } elseif ($_GET['regio'] == "y") {
        $ORDERBY = " ORDER BY locY ASC";
    }
}

?>
<TABLE width="300" height="120" border=0 cellPadding=0 cellSpacing=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=right>
      <TABLE width=100% height="100" border=0 cellPadding=0 cellSpacing=0>
        <TBODY>
        <TR>
          <TD class=gridbox_tl><IMG height=5 
            src="images/login_screens/spacer.gif" 
            width=5></TD>
          <TD class=gridbox_t><IMG height=5 
            src="images/login_screens/spacer.gif" 
            width=5></TD>
          <TD class=gridbox_tr><IMG height=5 
            src="images/login_screens/spacer.gif" 
            width=5></TD></TR>
        <TR>
          <TD class=gridbox_l></TD>
          <TD class=black_content>
	  
            <TABLE cellSpacing=0 cellPadding=1 width="300" border=0>
              <TBODY>
            <TR>
            <TD width="55%" align=left class=regiontoptext>
			<a style="cursor:pointer" onclick="document.location.href='?regio=name'"><strong>Region:</strong></a>
			</TD>
            <TD width="20%" align=left class=regiontoptext>
			  <div align="left"><a style="cursor:pointer" onclick="document.location.href='?regio=x'"><strong>X</strong></a></div></TD>
            <TD width="20%" align=right class=regiontoptext>
			<div align="left"><a style="cursor:pointer" onclick="document.location.href='?regio=y'">
			  <strong>Y</strong></div>
			</TD>
			</TR>
		     	</TBODY>
			</TABLE>
            <DIV id=GREX style="MARGIN: 1px 0px 0px"><IMG 
            height=1 
            src="images/login_screens/spacer.gif" 
            width=1></DIV>
            
			<div style=" border:hidden; color:#ffffff; padding:0px; width:300px; height:160px; overflow:auto; ">
			<?php
			$w=0;
			$DbLink->query("SELECT regionName,locX,locY FROM ".C_REGIONS_TBL." $ORDERBY ");
			while(list($regionName,$locX,$locY) = $DbLink->next_record()){
			$w++;
			?>
			
			<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR <?php if($w==2){$w=0; echo"bgColor=#000000";}else{echo"bgColor=#151515";}?>>
                <TD width="55%" align=left vAlign=top noWrap class=regiontext>
				<a style="cursor:pointer" onclick="document.location.href='secondlife://<?php echo $regionName; ?>/128/128/50'">
				<font color="#cccccc"><u><?php echo $regionName; ?></u></font></a>
				</TD>
                <TD width="20%" align=left vAlign=top noWrap class=regiontext><div align="left"><?php echo $locX; ?></div></TD>
                <TD width="20%" align=left vAlign=top noWrap class=regiontext><div align="left"><?php echo $locY; ?></div></TD>
                </TR>
			 </TBODY></TABLE>
			 <?php
			 }
			 ?> 
			 </DIV>

			  </TD>
          <TD class=gridbox_r></TD></TR>
        <TR>
          <TD class=gridbox_bl><IMG height=5 
            src="images/login_screens/spacer.gif" 
            width=5></TD>
          <TD class=gridbox_b><span class="gridbox_br"><img height="5" src="images/login_screens/spacer.gif" 
            width="5" /></span></TD>
          <TD class=gridbox_br>
<IMG height=5 src="images/login_screens/spacer.gif" 
            width=5></TD></TR></TBODY></TABLE>
					
	  </TD></TR></TBODY></TABLE>
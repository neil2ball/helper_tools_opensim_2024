<TABLE cellSpacing=0 cellPadding=0 width=300 border=0>
  <TBODY>
  <TR>
    <TD vAlign=top align=right>
      <TABLE cellSpacing=0 cellPadding=0 width=300 border=0>
        <TBODY>
        <TR>
          <TD class=boxwhite_tl><IMG height=5 src="images/login_screens/icons/spacer.gif" width=5></TD>
          <TD class=boxwhite_t><IMG height=5 src="images/login_screens/icons/spacer.gif" width=5></TD>
          <TD class=boxwhite_tr><IMG height=5 src="images/login_screens/icons/spacer.gif" width=5></TD>
        </TR>
        <TR>
          <TD class=boxwhite_l></TD>
          <TD class=black_content>
            <IMG src="images/login_screens/icons/alert.png" align=absMiddle>&nbsp;
            <STRONG><?php echo $BOX_TITLE; ?></STRONG>
            <DIV id=GREX style="MARGIN: 1px 0px 0px">
              <IMG height=1 src="images/login_screens/icons/spacer.gif" width=1>
            </DIV>
            <DIV class=boxtext>
              <P style="FONT-SIZE: 11px"><?php echo $BOX_INFOTEXT; ?></P>
              <P style="FONT-SIZE: 11px">
                <strong>Grid Status:</strong> <?php echo ($GRIDSTATUS == 1) ? 'Online' : 'Offline'; ?><br>
                <strong>Total Users:</strong> <?php echo number_format($USERCOUNT); ?><br>
                <strong>Online Now:</strong> <?php echo number_format($NOWONLINE); ?><br>
                <strong>Active This Month:</strong> <?php echo number_format($LASTMONTHONLINE); ?><br>
                <strong>Total Regions:</strong> <?php echo number_format($REGIONSCOUNT); ?><br>
                <strong>Login URI:</strong> <?php echo defined('LOGIN_URI') ? LOGIN_URI : 'Not set'; ?>
              </P>
            </DIV>
          </TD>
          <TD class=boxwhite_r></TD>
        </TR>
        <TR>
          <TD class=boxwhite_bl></TD>
          <TD class=boxwhite_b></TD>
          <TD class=boxwhite_br></TD>
        </TR>
        </TBODY>
      </TABLE>
    </TD>
  </TR>
  </TBODY>
</TABLE>

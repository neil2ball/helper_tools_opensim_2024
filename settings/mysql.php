<?php
/*
 * Copyright (c) 2007, 2008 Contributors, http://opensimulator.org/
 * See CONTRIBUTORS for a full list of copyright holders.
 *
 * See LICENSE for the full licensing terms of this file.
 *
*/

//This looks like its lifted from http://www.weberdev.com/get_example-4372.html  I'd contact the original developer for licensing info, but his website is broken.

class DB
{
    var $Host = C_DB_HOST;		// Hostname of our MySQL server
    var $Database = C_DB_NAME;	// Logical database name on that server
    var $User = C_DB_USER;		// Database user
    var $Password = C_DB_PASS;	// Database user's password
    var $Link_ID = null;		// Result of mysqli_connect()
    var $Query_ID = null;		// Result of most recent mysqli_query()
    var $Record = array();		// Current mysqli_fetch_array()-result
    var $Row;					// Current row number
    var $Errno = 0;				// Error state of query
    var $Error = "";

    function halt($msg)
    {
        echo("<b>Database error:</b> $msg<br>\n");
        echo("<b>MySQL error:</b> $this->Errno ($this->Error)<br>\n");
        die("Session halted.");
    }

    function connect()
    {
        if ($this->Link_ID === null) {
            $this->Link_ID = mysqli_connect($this->Host, $this->User, $this->Password, $this->Database);
            if (!$this->Link_ID) {
                $this->halt("Connect failed: " . mysqli_connect_error());
            }
        }
    }

    function escape($String)
    {
        $this->connect();
        return mysqli_real_escape_string($this->Link_ID, $String);
    }

    function query($Query_String)
    {
        $this->connect();
        $this->Query_ID = mysqli_query($this->Link_ID, $Query_String);
        $this->Row = 0;
        $this->Errno = mysqli_errno($this->Link_ID);
        $this->Error = mysqli_error($this->Link_ID);
        if (!$this->Query_ID) {
            $this->halt("Invalid SQL: " . $Query_String);
        }
        return $this->Query_ID;
    }

    function next_record()
    {
        $this->Record = mysqli_fetch_array($this->Query_ID, MYSQLI_NUM);
        $this->Row += 1;
        $this->Errno = mysqli_errno($this->Link_ID);
        $this->Error = mysqli_error($this->Link_ID);
        $stat = is_array($this->Record);
        if (!$stat) {
            mysqli_free_result($this->Query_ID);
            $this->Query_ID = null;
        }
        return $this->Record;
    }

    function num_rows()
    {
        return mysqli_num_rows($this->Query_ID);
    }

    function affected_rows()
    {
        return mysqli_affected_rows($this->Link_ID);
    }

    function optimize($tbl_name)
    {
        $this->connect();
        $this->Query_ID = mysqli_query($this->Link_ID, "OPTIMIZE TABLE $tbl_name");
    }

    function clean_results()
    {
        if ($this->Query_ID !== null) {
            mysqli_free_result($this->Query_ID);
        }
    }

    function close()
    {
        if ($this->Link_ID !== null) {
            mysqli_close($this->Link_ID);
        }
    }
}
?>
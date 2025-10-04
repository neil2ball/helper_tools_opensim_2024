<?php
/*
 * Copyright (c) 2007, 2008 Contributors, http://opensimulator.org/
 * See CONTRIBUTORS for a full list of copyright holders.
 *
 * See LICENSE for the full licensing terms of this file.
 *
*/

##################### System #########################
define("SYSNAME","Grid Name");
define("SYSURL","http://website.com");
define("SYSMAIL","info@email.com");


$userInventoryURI="http://robusturl.com:8004";
$userAssetURI="http://robusturl.com:8003";

############ Delete Unconfirmed accounts ################
// e.g. 24 for 24 hours  leave empty for no timed delete
$unconfirmed_deltime="24";

###################### Money Settings ####################

// Key of the account that all fees go to:
$economy_sink_account="00a4170f-306a-475f-8d0e-b3b3057f99ff";

// Key of the account that all purchased currency is debited from:
$economy_source_account="00a4170f-306a-475f-8d0e-b3b3057f99ff";

// Minimum amount of real currency (in CENTS!) to allow purchasing:
$minimum_real=1;

// Error message if the amount is not reached:
$low_amount_error="You tried to buy less than the minimum amount of currency. You cannot buy currency for less than US$ %.2f.";


// Sets wich Pageeditor should be used:
//$editor_to_use='standard';
$editor_to_use='fckeditor';

################### GridMap Settings  #####################
//Allowing Zoom on your Map
$ALLOW_ZOOM=TRUE;

//Server Hanlder URL to get images eg.: http://127.0.0.1:9000/
$RegionImageServer="";

//Default StartPoint for Map
$mapstartX=10000;
$mapstartY=10000;

$display_marker="dr";

##################### Database ########################
define("C_DB_TYPE","mysql");
//Your Hostname here:
define("C_DB_HOST","localhost");
//Your Databasename here:
define("C_DB_NAME","user");
//Your Username from Database here:
define("C_DB_USER","database");
//Your Database Password here:
define("C_DB_PASS","password");

################ Database Tables #########################
define("C_ADMIN_TBL","wi_admin");
define("C_WIUSR_TBL","wi_users");
define("C_USRBAN_TBL","wi_banned");
define("C_CODES_TBL","wi_codetable");
define("C_ADM_TBL","wi_adminsetting");
define("C_COUNTRY_TBL","wi_country");
define("C_NAMES_TBL","wi_lastnames");
define("C_CURRENCY_TBL","wi_economy_money");
define("C_TRANSACTION_TBL","wi_economy_transactions");
define("C_INFOWINDOW_TBL","wi_startscreen_infowindow");
define("C_NEWS_TBL","wi_startscreen_news");
define("C_PAGE_TBL","wi_pagemanager");
// REGION MANAGER 
define("C_MANAGEMENT_PAGE_TBL","wi_management_pagemanager");
define("C_MAP_REGIONS_TBL", "wi_regions");
// OFFLINE IM'S
define("C_OFFLINE_IM_TBL", "wi_offline_msgs");
// STATISTICS
define("C_STATS_REGIONS_TBL", "wi_statistics");

//OPENSIM DEFAULT TABLES (NEDED FOR LOGINSCREEN & MONEY SYSTEM)
define("C_USERS_TBL","users");
define("C_AGENTS_TBL","agents");
define("C_REGIONS_TBL","regions");
define("C_APPEARANCE_TBL", "avatarappearance");
?>

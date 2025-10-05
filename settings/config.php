<?php
/*
 * Copyright (c) 2007, 2008 Contributors, http://opensimulator.org/
 * See CONTRIBUTORS for a full list of copyright holders.
 *
 * See LICENSE for the full licensing terms of this file.
*/

##################### System #########################
if (!defined("SYSNAME")) define("SYSNAME", "Grid Name");
if (!defined("SYSURL")) define("SYSURL", "http://website.com");
if (!defined("SYSMAIL")) define("SYSMAIL", "info@email.com");

if (!defined("LOGIN_URI")) define("LOGIN_URI", "http://mygrid.com:8002");

if (!isset($GRIDSTATUS)) $GRIDSTATUS = 1;
if (!isset($INFOBOX)) $INFOBOX = 1;
if (!isset($BOXCOLOR)) $BOXCOLOR = 'green';
if (!isset($BOX_TITLE)) $BOX_TITLE = 'Welcome to ' . SYSNAME . '!';
if (!isset($BOX_INFOTEXT)) $BOX_INFOTEXT = 'Enjoy your stay — the grid is stable and active.';

$userInventoryURI = "http://robusturl.com:8004";
$userAssetURI = "http://robusturl.com:8003";

############ Delete Unconfirmed accounts ################
$unconfirmed_deltime = "24";

###################### Money Settings ####################
$economy_sink_account = "00a4170f-306a-475f-8d0e-b3b3057f99ff";
$economy_source_account = "00a4170f-306a-475f-8d0e-b3b3057f99ff";
$minimum_real = 1;
$low_amount_error = "You tried to buy less than the minimum amount of currency. You cannot buy currency for less than US$ %.2f.";

$currency_alert_message = "You requested to buy ¤%d .\n\n".
						  "To purchase tokens, please visit: ".SYSURL."/tokens\n\n";
                          

################### Page Editor ##########################
$editor_to_use = 'fckeditor';

################### GridMap Settings #####################
$ALLOW_ZOOM = TRUE;
$RegionImageServer = "";
$mapstartX = 10000;
$mapstartY = 10000;
$display_marker = "dr";

##################### Database ###########################
if (!defined("C_DB_TYPE")) define("C_DB_TYPE", "mysql");
if (!defined("C_DB_HOST")) define("C_DB_HOST", "localhost");
if (!defined("C_DB_NAME")) define("C_DB_NAME", "user");
if (!defined("C_DB_USER")) define("C_DB_USER", "database");
if (!defined("C_DB_PASS")) define("C_DB_PASS", "password");

################ Database Tables #########################
if (!defined("C_USERS_TBL")) define("C_USERS_TBL", "UserAccounts");
if (!defined("C_AGENTS_TBL")) define("C_AGENTS_TBL", "GridUser");
if (!defined("C_REGIONS_TBL")) define("C_REGIONS_TBL", "regions");
if (!defined("C_APPEARANCE_TBL")) define("C_APPEARANCE_TBL", "Avatars");
if (!defined("C_PRESENCE_TBL")) define("C_PRESENCE_TBL", "Presence");

##################### REST API Settings ##################
if (!defined("REST_API_BASE_URL")) define("REST_API_BASE_URL", "http://your-wordpress-site.com/wp-json/wsfw-route/v1");
if (!defined("REST_CONSUMER_KEY")) define("REST_CONSUMER_KEY", "your_consumer_key_here");
if (!defined("REST_CONSUMER_SECRET")) define("REST_CONSUMER_SECRET", "your_consumer_secret_here");

##################### Robust Server Settings #############
if (!defined("OPENSIM_REMOTEADMIN_PASSWORD")) define("OPENSIM_REMOTEADMIN_PASSWORD", "your_admin_password_here");
?>

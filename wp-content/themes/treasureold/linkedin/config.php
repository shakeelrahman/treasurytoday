<?php
/*
 * Basic Site Settings and API Configuration
 */

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_linkidin');
define('DB_USER_TBL', 'users');

// LinkedIn API configuration
define('LIN_CLIENT_ID', '770yt15foys49f');
define('LIN_CLIENT_SECRET', 'XLp0M6DOIrh2POBx');
define('LIN_REDIRECT_URL', 'http://localhost/treasurytoday');
define('LIN_SCOPE', 'r_liteprofile r_emailaddress'); //API permissions

// Start session
if(!session_id()){
    session_start();
}

// Include the oauth client library
require_once 'linkedin-oauth-client-php/http.php';
require_once 'linkedin-oauth-client-php/oauth_client.php';
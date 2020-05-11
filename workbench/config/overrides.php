<?php
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// THIS FILE IS INTENDED FOR ADVANCED ADMINS ONLY TO OVERRIDE THE ARRAYS OR COMPONENT OF ARRAYS IN
// THE defaults.php FILE WITH CUSTOMIZATIONS TO APPLY TO ALL YOUR WORKBENCH USERS.
//
// THIS IS NOT TO BE CONFUSED WITH THE overrideable BOOLEAN FLAG WITHIN THE CONFIGURATIONS TO ALLOW
// END USERS TO CUSTOMIZE IN SETTINGS. SEE defaults.php FOR DETAILS.
//
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// EXAMPLE: $config["fuzzyServerUrlLookup"]["default"] = false;


// OAUTH 2.0 SETTINGS
// Uncomment and populate with keys and secrets to enable OAuth.
// Note, Production and Sandbox can have the same key and secret, but it is not required
// If connecting to other Salesforce environments, add a new entry to the array:

$config["oauthRequired"]["default"] = true;
$config["fuzzyServerUrlLookup"]["default"] = true;
$config["oauthAppKey"]["default"] = "3MVG9d8..z.hDcPLGQxR.BskW.oT3COrLww_ffIavG9oXmebZnozj.bYc_jt2u7OvqTWQ_yvV.w==";
$config["oauthAppSecret"]["default"] = "3163979385997040958";

$config["oauthConfigs"]["default"] = array( "nbn--caadev2.cs76.my.salesforce.com" => "NBN-CAADEV2",
                                            "nbn--caast2.cs76.my.salesforce.com" => "NBN-CAAST2",
                                            "nbn--csabau.cs57.my.salesforce.com" => "NBN-CSABAU",
                                            "nbn--csast.cs113.my.salesforce.com" => "NBN-CSAST",
                                            "nbn--bauuat.my.salesforce.com" => "NBN-BAUUAT",
                                            "nbn--mrsf2.cs6.my.salesforce.com" => "NBN-MRSF2",
                                            "nbn--caaperf.my.salesforce.com" => "NBN-CAAPERF",
                                            "ado-tso--dev.my.salesforce.com" => "ADO-DEV",
                                            "my-packages-dev-ed.my.salesforce.com" => "Packaging Org",
                                            "accenture-playground-dev-ed.my.salesforce.com" => "My Playground"
                                          );

/*"ampfs--jandev.my.salesforce.com" => "AMP-JANDEV",
"ampfs--janqa.my.salesforce.com" => "AMP-JANQA",
"ampfs--novdev2.my.salesforce.com" => "AMP-NOVDEV2",
"ampfs--novqa.my.salesforce.com" => "AMP-NOVQA",
"ampfs--sepdev1.my.salesforce.com" => "AMP-SEPDEV1",
"ampfs--uat1.my.salesforce.com" => "AMP-UAT1",
"ampfs--datauat.my.salesforce.com" => "AMP-DATAUAT",
"ampfs--s1val1.my.salesforce.com" => "AMP-CCF ORG",*/

// CSRF SECURITY SETTINGS
// Uncomment and change the value below to a random, secret value:
//
// $config["csrfSecret"]["default"] = "CHANGE_ME";


// ORG ID WHITELIST / BLACKLIST
// To only allow access to a set of orgs or block access to particular orgs,
// uncomment and add the orgs to the respective lists below as comma-separated values:
//
// $config["orgIdWhiteList"]["default"] = "00D000000000001, 00D000000000002";
// $config["orgIdBlackList"]["default"] = "00D000000000003";


?>

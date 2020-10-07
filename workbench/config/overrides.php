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
$config["oauthAppKey"]["default"] = "3MVG9n_HvETGhr3AvIZ7NpzAALFVWT5g.sGbggTW95N5E0d6WuxPYOEctzp1yoQv8a2H7LcE37aYgeMjReEQM";
$config["oauthAppSecret"]["default"] = "B3B698ACE3976567A55DED92AA217D0623BD58868E9796BC249B0E371E8B44DB";

$config["oauthConfigs"]["default"] = array( "ap16.salesforce.com" => "My Aware Playground",
                                            "" => "--- Canon ---",
                                            "cppau--dev.my.salesforce.com" => "CPP DEV",
                                            "cppau--sit.my.salesforce.com" => "CPP SIT",
                                            "cppau--uat1.my.salesforce.com" => "CPP UAT1",
                                            "cppau--fsl.my.salesforce.com" => "CPP FSL",
                                            "cppau--int.my.salesforce.com" => "CPP INT");

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

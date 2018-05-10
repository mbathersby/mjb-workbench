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
$config["fuzzyServerUrlLookup"]["default"] = false;
$config["oauthConfigs"]["default"] = array(
                                            "ampfs--dev.cs116.my.salesforce.com" => array(
                                                "label" => "AMP-DEV",
                                                "key" => "3MVG9mQWF42jKQUruaxHka2mu2aZLv.K3uwhkqVa945l2wH0ffJtMtRWq36eelXyrMn9pA7bPqJwmie3w_0CU",
                                                "secret" => "7403621950379494209"
                                            ),
                                            "ampfs--accdev25.cs116.my.salesforce.com" => array(
                                                "label" => "AMP-ACCDEV25",
                                                "key" => "3MVG9mQWF42jKQUr8aiN7eUeU5_3SRn2AVIUVP6l7cOYX9q9vuEV4oqs76pz8hWnp.kxLTuPd5QszKl0HAE1R",
                                                "secret" => "31749963175304988"
                                            )
                                        );


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

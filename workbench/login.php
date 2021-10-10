<?php
require_once "shared.php";
require_once "session.php";
require_once "controllers/LoginController.php";

$c = new LoginController();

if (isset($_POST['uiLogin'])
    || !empty($_REQUEST["pw"])
    || !empty($_REQUEST["sid"])
    || isset($_POST["oauth_Login"])
    || isset($_GET["code"])
    || isset($_POST["signed_request"])
) {
    $c->processRequest();
}

require_once "header.php";
?>

<p>
    <?php if (count($c->getErrors()) > 0) displayError($c->getErrors()) ?>
</p>

<div id="loginBlockContainer" class="slds-p-around_small">
    <form id="login_form" action="login.php" method="post">
        <?php print getCsrfFormTag(); ?>
        <input type="hidden" id="startUrl" name="startUrl" value="<?php print htmlspecialchars($c->getStartUrl(), ENT_QUOTES); ?>">

        <div class="slds-form-element__control" id="login_type_selection" class="slds-m-vertical_medium" style="text-align: right;">
            <div class="slds-radio_button-group">
                <?php if ($c->isOAuthEnabled() === true) { ?>
                    <span class="slds-button slds-radio_button">
                        <input type="radio" id="loginType_oauth" name="loginType" value="oauth" />
                        <label class="slds-radio_button__label" for="loginType_oauth">
                            <span class="slds-radio_faux">OAuth</span>
                        </label>
                    </span>
                <?php } ?>

                <?php if ($c->isOAuthRequired() !== true) { ?>
                    <span class="slds-button slds-radio_button">
                        <input type="radio" id="loginType_std" name="loginType" value="std"/>
                        <label class="slds-radio_button__label" for="loginType_std">
                        <span class="slds-radio_faux">Username & Password</span>
                        </label>
                    </span>
                    <span class="slds-button slds-radio_button">
                        <input type="radio" id="loginType_adv" name="loginType" value="adv"/>
                        <label class="slds-radio_button__label" for="loginType_adv">
                        <span class="slds-radio_faux">Session ID</span>
                        </label>
                    </span>
                <?php } ?>
            </div>
        </div>

        <div class="slds-form-element slds-form-element_compound loginType_oauth" role="list">
            <div class="slds-form-element__control">
                <div class="slds-form-element__row">
                    <div class="slds-size_2-of-6">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="oauth_host">Environment</label>
                            <div class="slds-form-element__control">
                                <div class="slds-select_container">
                                    <select class="slds-select" id="oauth_env" name="oauth_host">
                                        <?php printSelectOptions($c->getOauthHostSelectOptions()); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slds-size_1-of-6">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="oauth_apiVersion">API Version</label>
                            <div class="slds-form-element__control">
                                <div class="slds-select_container">
                                    <select class="slds-select" id="oauth_apiVersion" name="oauth_apiVersion">
                                        <?php printSelectOptions($c->getApiVersionSelectOptions(), $c->getApiVersion()); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="slds-form-element slds-form-element_compound loginType_std" role="list">
            <div class="slds-form-element__control">
                <div class="slds-form-element__row">
                    <div class="slds-size_2-of-6">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="un">Username</label>
                            <div class="slds-form-element__control">
                                <input type="text" id="un" name="un" class="slds-input" value="<?php print htmlspecialchars($c->getUsername()); ?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="slds-size_2-of-6">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="pw">Password</label>
                            <div class="slds-form-element__control">
                                <input type="password" id="pw" name="pw" class="slds-input"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slds-form-element__row">
                    <div class="slds-size_3-of-6">
                        <div class="slds-form-element">
                            <div class="slds-form-element__control">
                                <div class="slds-checkbox">
                                    <input type="checkbox" name="options" id="rememberUser" <?php if ($c->isUserRemembered()) print "checked" ?> />
                                    <label class="slds-checkbox__label" for="rememberUser">
                                        <span class="slds-checkbox_faux"></span>
                                        <span class="slds-form-element__label">Remember Username</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--div class="loginType_std loginType_adv">
            <p>
                <label for="un">Username:</label>
                <input type="text" id="un" name="un"size="55" value="<?php print htmlspecialchars($c->getUsername()); ?>"/>
            </p>

            <p>
                <label for="pw">Password:</label>
                <input type="password" id="pw" name="pw" size="55"/>
            </p>

            <div style="margin-left: 95px;">
                <input type="checkbox" id="rememberUser" name="rememberUser" <?php if ($c->isUserRemembered()) print "checked='checked'" ?> />
                <label for="rememberUser">Remember username</label>
                <span id="pwcaps" style="visibility: hidden; color: red; font-weight: bold; margin-left: 65px;">Caps lock is on!</span>
            </div>
        </div-->

        <div class="loginType_adv">

            <p>
                <label for="sid">Session ID:</label>
                <input type="text" id="sid" name="sid" size="55">
            </p>

            <p>&nbsp;</p>

            <p>
                <label for="serverUrl">Server URL:</label>
                <input type="text" name="serverUrl" id="serverUrl" size="55" />
            </p>

            <p>
                <label for="inst">QuickSelect:</label>
                <select id="inst" name="inst">
                    <?php printSelectOptions($c->getSubdomainSelectOptions(), $c->getSubdomain()); ?>
                </select>
                &nbsp;
                <select id="api" name="api">
                    <?php printSelectOptions($c->getApiVersionSelectOptions(), $c->getApiVersion()); ?>
                </select>
            </p>
        </div>

        <div class="loginType_std loginType_oauth loginType_adv">
            <?php if ($c->getTermsFile()) { ?>
            <div style="margin-left: 95px;">
                <input type="checkbox" id="termsAccepted" name="termsAccepted"/>
                <label for="termsAccepted"><a href="terms.php" target="_blank">I agree to the terms of service</a></label>
            </div>
            <?php } ?>

            <div class="slds-clearfix">
                <button class="slds-button slds-button_brand slds-float_right" id="loginBtn" name="uiLogin" value="Login">Login to Salesforce</button>
            </div>
            
            <!--p class="slds-m-top_medium">
                <strong>Workbench is free to use, but is not an official salesforce.com product.</strong> Workbench has not been officially tested or
                documented. salesforce.com support is not available for Workbench. Support requests for Workbench should be directed
                to Stackoverflow at
                <a href="https://salesforce.stackexchange.com/questions/tagged/workbench">https://salesforce.stackexchange.com/questions/tagged/workbench</a>.
                Source code for Workbench  can be found at
                <a href="https://github.com/forceworkbench/forceworkbench">https://github.com/forceworkbench/forceworkbench</a>
                under separate and different license terms.
            </p-->
        </div>
    </form>
</div>
    
<?php
    addFooterScript("<script type='text/javascript' src='" . getPathToStaticResource('/script/login.js') . "'></script>");
    addFooterScript("<script type='text/javascript'>wbLoginConfig=" . $c->getJsConfig() ."</script>");
    addFooterScript("<script type='text/javascript'>WorkbenchLogin.initializeForm(" . json_encode($c->getLoginType()) .");</script>");
require_once "footer.php";
?>
<?php
$MIGRATION_MESSAGE = "Anonymous Apex can be executed from Visual Studio Code. <a href=\"https://developer.salesforce.com/tools/vscode/en/getting-started/install\">Try it today!</a>";


require_once 'session.php';
require_once 'shared.php';
require_once 'header.php';
require_once 'soapclient/SforceApexClient.php';
require_once 'async/ApexExecuteFutureTask.php';

//correction for dynamic magic quotes
if (isset($_POST['scriptInput']) && get_magic_quotes_gpc()) {
    $_POST['scriptInput'] = stripslashes($_POST['scriptInput']);
}

if (isset($_POST['execute'])) {
    $_SESSION['scriptInput'] = $_POST['scriptInput'];
    $_SESSION['LogCategory'] = $_POST['LogCategory'];
    $_SESSION['LogCategoryLevel'] = $_POST['LogCategoryLevel'];
} else if (!isset($_SESSION['LogCategory']) && !isset($_SESSION['LogCategoryLevel'])) {
    $_SESSION['LogCategory'] = WorkbenchConfig::get()->value("defaultLogCategory");
    $_SESSION['LogCategoryLevel'] = WorkbenchConfig::get()->value("defaultLogCategoryLevel");
}


?>
<form id="executeForm" action="" method="POST">
    <?php print getCsrfFormTag(); ?>

    <div class="slds-grid slds-wrap slds-gutters">
        <div class="slds-col slds-size_1-of-1 slds-text-body_regular slds-p-bottom_small">
            Enter Apex code to be executed as an anonymous block:
        </div>

        <div class="slds-col slds-size_1-of-1 slds-text-body_regular slds-p-bottom_small">
            <div class="slds-form-element">
                <div class="slds-form-element__control">
                    <textarea id="scriptInput" name="scriptInput" class="slds-textarea"
                        style='overflow: auto; font-family: monospace, courier; width: 100%;'></textarea>
                </div>
            </div>
        </div>

        <div class="slds-col slds-no-flex slds-text-body_regular slds-p-bottom_small">
            <div class="slds-form-element">
                <label class="slds-form-element__label" for="LogCategory">Log Category</label>
                <div class="slds-form-element__control">
                    <div class="slds-select_container">
                        <select class="slds-select" id="LogCategory" name="LogCategory">
                            <?php
                                printSelectOptions(WorkbenchConfig::get()->valuesToLabels('defaultLogCategory'),$_SESSION['LogCategory']);
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="slds-col slds-no-flex slds-text-body_regular slds-p-bottom_small">
            <div class="slds-form-element">
                <label class="slds-form-element__label" for="LogCategoryLevel">Log Level</label>
                <div class="slds-form-element__control">
                    <div class="slds-select_container">
                        <select class="slds-select" id="LogCategoryLevel" name="LogCategoryLevel">
                            <?php
                                printSelectOptions(WorkbenchConfig::get()->valuesToLabels('defaultLogCategoryLevel'),$_SESSION['LogCategoryLevel']);
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="slds-col slds-col_bump-left slds-text-body_regular slds-p-bottom_small slds-text-align_right">
            <button type='submit' name="execute" value='Execute' class='disableWhileAsyncLoading slds-button' /> 
            <button type='reset' value='Reset' class='disableWhileAsyncLoading slds-button' />
        </div>
    </div>

    <!--table border="0">
        <tr>
            <td colspan="3">
                <p class='instructions slds-text-body_regular slds-p-bottom_small'>Enter Apex code to be executed as an anonymous block:</p>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <textarea id='scriptInput' name='scriptInput'
                    cols='100'
                    rows='<?php print WorkbenchConfig::get()->value("textareaRows") ?>'
                    style='overflow: auto; font-family: monospace, courier;'><?php echo htmlspecialchars(isset($_SESSION['scriptInput'])?$_SESSION['scriptInput']:null,ENT_QUOTES); ?></textarea>
        </tr>
        <tr>
            <td align="right">
                Log Category: 
                <select id="LogCategory" name="LogCategory">
                <?php
                    printSelectOptions(WorkbenchConfig::get()->valuesToLabels('defaultLogCategory'),$_SESSION['LogCategory']);
                ?>
                </select>
            </td>
            <td>
                Log Level: <select id="LogCategoryLevel"
                    name="LogCategoryLevel">
                    <?php
                    printSelectOptions(WorkbenchConfig::get()->valuesToLabels('defaultLogCategoryLevel'),$_SESSION['LogCategoryLevel']);
                    ?>
                </select>
            </td>
            <td>
                <input type='submit' name="execute" value='Execute' class='disableWhileAsyncLoading' /> 
                <input type='reset' value='Reset' class='disableWhileAsyncLoading' />
            </td>
        </tr>
    </table-->
</form>


<script type="text/javascript">
     document.getElementById('scriptInput').focus();
</script>


<?php
if (isset($_POST['execute']) && isset($_POST['scriptInput']) && $_POST['scriptInput'] != "") {
    print "<h2>Results</h2>";
    $asyncJob = new ApexExecuteFutureTask($_POST['scriptInput'], $_POST['LogCategory'], $_POST['LogCategoryLevel']);
    echo $asyncJob->enqueueOrPerform();
} else if (isset($_POST['execute']) && isset($_POST['scriptInput']) && $_POST['scriptInput'] == "") {
    displayInfo("Anonymous block must not be blank.");
}

require_once 'footer.php';
?>

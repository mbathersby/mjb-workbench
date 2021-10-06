<?php
require_once 'session.php';
require_once 'shared.php';

if (isset($_POST['actionJump']) && $_POST['actionJump'] != basename($_SERVER['PHP_SELF'])) {
    header("Location: $_POST[actionJump]");
    exit;
}

include_once 'header.php';

if (isset($_POST['select'])) {
    displayError("Choose an object and an action to which to jump.");
}
?>

<form method='POST' action=''>
    <?php print getCsrfFormTag(); ?>
    <p class='instructions slds-m-bottom_small'>Select an action to perform:</p>

    <p>
        <div class="slds-form-element slds-form-element_compound slds-size_4-of-12' role="list">
        	<label class='slds-form-element__label' for="actionJump"><strong>Jump to</strong></label>
            <div class='slds-form-element__control'>
                <div class='slds-select_container'>
                    <select class='slds-select' name='actionJump' id='actionJump' onChange='toggleObjectSelectDisabled();'>
                        <option value='select.php'></option>
            
                        <?php
                        foreach ($GLOBALS["MENUS"] as $menu => $pages) {
                            foreach ($pages as $href => $page) {
                                if ($page->onMenuSelect) print "<option value='" . $href . "'>" . $page->title . "</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </p>

    <p>
        <div class="slds-form-element slds-form-element_compound slds-size_4-of-12' role="list">
            <label class='slds-form-element__label' for="default_object"><strong>Object</strong></label>
            <div class='slds-form-element__control'>
                <div class='slds-select_container'>
                    <?php printObjectSelection(WorkbenchContext::get()->getDefaultObject(), 'default_object'); ?>
                </div>
            </div>
        </div>
    </p>
    
    <div class='slds-clearfix'>
        <input type='submit' name='select' value='Select' class='slds-button slds-button_brand slds-float_right' />
    </div>
</form>

<script type="text/javascript">
    function toggleObjectSelectDisabled() {
        var usesObject = new Array();
        <?php
        foreach ($GLOBALS["MENUS"] as $menu => $pages) {
            foreach ($pages as $href => $page) {
                if ($page->onMenuSelect === 'usesObject') {
                    print "usesObject['$href'] = '$href';\n";
                }
            }
        }
        ?>

        var actionJumpVal = document.getElementById('actionJump').value;

        if (usesObject[actionJumpVal] != undefined) {
            document.getElementById('default_object').disabled = false;
        } else {
            document.getElementById('default_object').disabled = true;
        }
    }
</script>

<?php
addFooterScript("<script type='text/javascript'>toggleObjectSelectDisabled();</script>");
include_once 'footer.php';
?>

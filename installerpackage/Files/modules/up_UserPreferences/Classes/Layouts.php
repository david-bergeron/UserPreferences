<?php

class Layouts
{
    public function __contruct() {}
    
    public static function display($focus, $name, $curValues, $view) {
        global $app_list_strings;

        // get the current values for the layout_options in the database.     
        $currentHideTabs = ($curValues != '') ? explode(',', $curValues) : null;
        
        $moduleList = '';
        $hideList   = '';
        $layoutList = array();
        
        foreach ($app_list_strings['moduleList'] as $key => $value) {
            if (!in_array($key, $currentHideTabs)) {
                $moduleList .= '<li class="ui-state-default" id='.$key.'>'.$value.'</li>';
            }
        }
        foreach ($currentHideTabs as $hideTab) {
            $hideList .= '<li class="ui-state-default" id='.$hideTab.'>'.$hideTab.'</li>';
            $layoutList[] = $hideTab;
        }
        $layoutList = implode(',', $layoutList);
        
        if ($_REQUEST['action'] == 'EditView') {
            $ddBoxes=<<<eof
<head>
    <script language="JavaScript" src="modules/up_UserPreferences/js/dragdrop.js"></script>
    <link rel="stylesheet" href="modules/up_UserPreferences/css/dragdrop.css" />
</head>
    Select Modules for Navigation Bar<br /><br />
    <fieldset class="fieldset-auto-height">
    <legend>Display Modules:</legend>

    <ul id="show_tabs" class="connectedSortable">
        $moduleList
        <li class="ui-state-disabled"></li>
    </ul>

    </fieldset>
    <fieldset class="fieldset-auto-height">
    <legend>Hide Modules:</legend>

    <ul id="hide_tabs" class="connectedSortable">
        $hideList
        <li class="ui-state-disabled"></li>
    </ul>

    </fieldset>
    <input type="hidden" id="layout_options" name="layout_options" value=$layoutList>
eof;
        } else {
            $ddBoxes=<<<eof
            <input type='hidden' class='sugar_field' id='layout_options' value=$curValues>
            $curValues
eof;
        }
        return $ddBoxes;
    }
}
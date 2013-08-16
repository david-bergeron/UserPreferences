<?php 

$admin_options_defs=array();
$admin_options_defs['Administration']['Section_Key']=array(
        'Administration',
        'User Preferences',
        'User Preferences Mass Update',
        './index.php?module=up_UserPreferences'
);
$admin_group_header[] = array('User Preferences', '', false, $admin_options_defs);
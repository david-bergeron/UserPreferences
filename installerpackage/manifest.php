<?php

   $manifest =array(
       'acceptable_sugar_flavors' => array ('PRO','CORP','ENT','ULT'),
       'acceptable_sugar_versions' => array (
         'regex_matches' => array ('6\\.5\\.(.*?)', '6\\.6\\.(.*?)', '6\\.6\\.(.*?)\\.(.*?)', '6\\.7\\.(.*?)', '6\\.7\\.(.*?)\\.(.*?)'),
       ),
       'author' => 'dbergeron',
       'description' => 'User Preferences Mass Update Module',
       'icon' => '',
       'is_uninstallable' => true,
       'name' => 'UserPreferences',
       'published_date' => '2013-08-15 14:55:49',
       'type' => 'module',
       'version' => '1.0',
   );

   $installdefs =array(
       'id' => 'package_1376578549',
       'copy' => array(
            0 => array(
                'from' => '<basepath>/Files/custom/Extension/application/Ext/Utils/userpreferences_utils.php',
	            'to' => 'custom/Extension/application/Ext/Utils/userpreferences_utils.php',
	        ),
            1 => array(
                'from' => '<basepath>/Files/custom/Extension/modules/Administration/Ext/Administration/UserPreferences.php',
	            'to' => 'custom/Extension/modules/Administration/Ext/Administration/UserPreferences.php',
	        ),
            2 => array(
                'from' => '<basepath>/Files/modules/up_UserPreferences/Classes/Layouts.php',
	            'to' => 'modules/up_UserPreferences/Classes/Layouts.php',
	        ),
            3 => array(
                'from' => '<basepath>/Files/modules/up_UserPreferences/css/dragdrop.css',
	            'to' => 'modules/up_UserPreferences/css/dragdrop.css',
	        ),
            4 => array(
                'from' => '<basepath>/Files/modules/up_UserPreferences/js/dragdrop.js',
	            'to' => 'modules/up_UserPreferences/js/dragdrop.js',
	        ),
            5 => array(
                'from' => '<basepath>/Files/modules/up_UserPreferences/up_UserPreferences.php',
	            'to' => 'modules/up_UserPreferences/up_UserPreferences.php',
	        ),
            6 => array(
                'from' => '<basepath>/Files/modules/up_UserPreferences/up_UserPreferences_sugar.php',
	            'to' => 'modules/up_UserPreferences/up_UserPreferences_sugar.php',
	        ),
            7 => array(
                'from' => '<basepath>/Files/modules/up_UserPreferences/vardefs.php',
	            'to' => 'modules/up_UserPreferences/vardefs.php',
	        ),
            8 => array(
                'from' => '<basepath>/Files/modules/up_UserPreferences/Dashlets/up_UserPreferencesDashlet/up_UserPreferencesDashlet.meta.php',
	            'to' => 'modules/up_UserPreferences/Dashlets/up_UserPreferencesDashlet/up_UserPreferencesDashlet.meta.php',
	        ),
            9 => array(
                'from' => '<basepath>/Files/modules/up_UserPreferences/Dashlets/up_UserPreferencesDashlet/up_UserPreferencesDashlet.php',
	            'to' => 'modules/up_UserPreferences/Dashlets/up_UserPreferencesDashlet/up_UserPreferencesDashlet.php',
	        ),
	    ),
       'logic_hooks' => array(
           array(
               'module' => 'Users',
               'hook' => 'after_login',
               'order' => 99,
               'description' => 'User Preferences Mass Update',
               'file' => 'modules/up_UserPreferences/up_UserPreferences.php',
               'class' => 'up_UserPreferences',
               'function' => 'applyUserPreferences',
           ),
        ),
    );

?>

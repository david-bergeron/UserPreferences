<?php
 // created: 2013-08-20 11:54:06
$layout_defs["up_UserPreferences"]["subpanel_setup"]['up_userpreferences_users'] = array (
  'order' => 100,
  'module' => 'Users',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_UP_USERPREFERENCES_USERS_FROM_USERS_TITLE',
  'get_subpanel_data' => 'up_userpreferences_users',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);

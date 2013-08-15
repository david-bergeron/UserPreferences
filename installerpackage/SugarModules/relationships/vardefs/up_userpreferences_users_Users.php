<?php
// created: 2013-08-15 08:48:59
$dictionary["User"]["fields"]["up_userpreferences_users"] = array (
  'name' => 'up_userpreferences_users',
  'type' => 'link',
  'relationship' => 'up_userpreferences_users',
  'source' => 'non-db',
  'module' => 'up_UserPreferences',
  'bean_name' => 'up_UserPreferences',
  'side' => 'right',
  'vname' => 'LBL_UP_USERPREFERENCES_USERS_FROM_USERS_TITLE',
  'id_name' => 'up_userpreferences_usersup_userpreferences_ida',
  'link-type' => 'one',
);
$dictionary["User"]["fields"]["up_userpreferences_users_name"] = array (
  'name' => 'up_userpreferences_users_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_UP_USERPREFERENCES_USERS_FROM_UP_USERPREFERENCES_TITLE',
  'save' => true,
  'id_name' => 'up_userpreferences_usersup_userpreferences_ida',
  'link' => 'up_userpreferences_users',
  'table' => 'up_userpreferences',
  'module' => 'up_UserPreferences',
  'rname' => 'name',
);
$dictionary["User"]["fields"]["up_userpreferences_usersup_userpreferences_ida"] = array (
  'name' => 'up_userpreferences_usersup_userpreferences_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_UP_USERPREFERENCES_USERS_FROM_LBL_UP_USERPREFERENCES_USERS_FROM_USERS_TITLE_TITLE',
  'id_name' => 'up_userpreferences_usersup_userpreferences_ida',
  'link' => 'up_userpreferences_users',
  'table' => 'up_userpreferences',
  'module' => 'up_UserPreferences',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);

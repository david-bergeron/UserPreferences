<?php
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

$relationships = array (
  'up_userpreferences_users' => 
  array (
    'rhs_label' => 'One Time User Preferences',
    'lhs_label' => 'User Preferences Mass Update',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'up_UserPreferences',
    'rhs_module' => 'Users',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'up_userpreferences_users',
  ),
  'up_userpreferences_users_1' => 
  array (
    'rhs_label' => 'Forced User Preferences',
    'lhs_label' => 'User Preferences Mass Update',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'up_UserPreferences',
    'rhs_module' => 'Users',
    'relationship_type' => 'one-to-many',
    'readonly' => false,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
    'relationship_name' => 'up_userpreferences_users_1',
  ),
);
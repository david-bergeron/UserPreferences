<?PHP
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

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once 'modules/up_UserPreferences/up_UserPreferences_sugar.php' ;

/**
 * User Preferences Mass Update class
 * @author dbergeron
 *
 */
class up_UserPreferences extends up_UserPreferences_sugar {

	public function __construct(){
		parent::__construct();
	}
	
	/**
	 * Applies the current user preferences template to the current user logging in.
	 * This method is called from the Users logic hook on after_login event
	 * 
	 * @param object $userObj
	 */
	public function applyUserPreferences($userObj) {
	    $GLOBALS['log']->debug("In applyUserPreferences for ".$userObj->name);
	    
	    if (empty($userObj))
	    {
	        global $current_user;
	        $userObj = $current_user;
	    }
	    
	    $userPrefs = $this->getUserPreferences($userObj);

	    $GLOBALS['log']->debug("New User Preferences");
	    // if there are user preference to 
	    if (count($userPrefs) != 0) {
	        foreach ($userPrefs as $key => $value) {
	            $GLOBALS['log']->debug("key = ".$key.", value = ".$value);
	            if ($key == 'hide_tabs') {
	                $value = explode(',', $value);
	                $GLOBALS['log']->debug($value);
	            }
	            $userObj->setPreference($key, $value);
	        }
	    }
	}
	
	/**
	 * Forces the relationship policy to the users.
	 * Only one user can have a custom user preferences template.
	 * This is called from the Users logic hook on after_relationship_add event.
	 * 
	 * @param object $userObj
	 * @param string $event
	 * @param array  $arguments
	 */
	public function forceRelationshipPolicy(&$userObj, $event, $arguments) {
	    $relationship = $arguments['relationship'];
	    $GLOBALS['log']->debug('############################');
	    $GLOBALS['log']->debug('In forceRelationshipPolicy for '.$arguments['relationship']);
	    $GLOBALS['log']->debug('one time 1 '.$userObj->up_userpreferences_usersup_userpreferences_ida);
	    $GLOBALS['log']->debug('forced 1 '.$userObj->up_userpreferences_users_1up_userpreferences_ida);

	    if (empty($userObj))
	    {
	        global $current_user;
	        $userObj = $current_user;
	    }
	     
	    //make sure user can only show under 1 subpanel under a Dashboard Template record
	    $relationships = array(
	        "up_userpreferences_users"   => "up_userpreferences_users",
	        "up_userpreferences_users_1" => "up_userpreferences_users_1",
	    );
	     
	    if (!isset($relationships[$relationship]))
	    {
	        $GLOBALS['log']->debug("relationship ".$relationship." not in array");
	        return;
	    }
	     
	    // one time user preferences
	    if ($relationship == "up_userpreferences_users")
	    {
	        $GLOBALS['log']->debug('one time user preferences '.$userObj->name);
	        $GLOBALS['log']->debug('one time 2 '.$userObj->up_userpreferences_usersup_userpreferences_ida);
	        
	        // if the user is in the one time user preferences, delete it
	        if (!empty($userObj->up_userpreferences_usersup_userpreferences_ida))
	        {
	            $oneTimeTemplate = BeanFactory::getBean("up_UserPreferences", $userObj->up_userpreferences_usersup_userpreferences_ida);
	            $oneTimeTemplate->load_relationship("up_userpreferences_users");
	            $oneTimeTemplate->up_userpreferences_users->delete($oneTimeTemplate->id, $userObj->id);
	        }
	        $GLOBALS['log']->debug('forced 2 '.$userObj->up_userpreferences_users_1up_userpreferences_ida);
	        
	        // if the user is in the forced user preferences, delete it
	        if (!empty($userObj->up_userpreferences_users_1up_userpreferences_ida))
	        {
	            $forcedTemplate = BeanFactory::getBean("up_UserPreferences", $userObj->up_userpreferences_users_1up_userpreferences_ida);
	            $forcedTemplate->load_relationship("up_userpreferences_users_1");
	            $GLOBALS['log']->debug("template id = ".$forcedTemplate->id.", user id =".$userObj->id);
	            $forcedTemplate->up_userpreferences_users_1->delete($forcedTemplate->id, $userObj->id);
	        }
	    }
	     
	    // forced user preferences
	    if ($relationship == "up_userpreferences_users_1")
	    {
	        $GLOBALS['log']->debug('forced user preferences for '.$userObj->name);
	        $GLOBALS['log']->debug('forced 3 '.$userObj->up_userpreferences_users_1up_userpreferences_ida);
	        
	        // if the user is in the forced user preferences, delete it
	        if (!empty($userObj->up_userpreferences_users_1up_userpreferences_ida))
	        {
	            $forcedTemplate = BeanFactory::getBean("up_UserPreferences", $userObj->up_userpreferences_users_1up_userpreferences_ida);
	            $forcedTemplate->load_relationship("up_userpreferences_users_1");
	            $forcedTemplate->up_userpreferences_users_1->delete($forcedTemplate->id, $userObj->id);
	        }
	        $GLOBALS['log']->debug('one time 3 '.$userObj->up_userpreferences_usersup_userpreferences_ida);
	        
	        // if the user is in the one time user preferences, delete it
	        if (!empty($userObj->up_userpreferences_usersup_userpreferences_ida))
	        {
	            
	            $oneTimeTemplate = BeanFactory::getBean("up_UserPreferences", $userObj->up_userpreferences_usersup_userpreferences_ida);
	            $oneTimeTemplate->load_relationship("up_userpreferences_users");
	            $GLOBALS['log']->debug("template id = ".$oneTimeTemplate->id.", user id = ".$userObj->id);
	            $GLOBALS['log']->debug(print_r($oneTimeTemplate->up_userpreferences_users, true));
	            $oneTimeTemplate->up_userpreferences_users->delete($oneTimeTemplate->id, $userObj->id);
	        }
	    }
	}
	
	/**
	 * Retrieves the current user preferences for the current user
	 * 
	 * @param object $userObj
	 * @return multitype:NULL
	 */
	public function getUserPreferences($userObj) {

	    // forced user preferences
	    if (!empty($userObj->up_userpreferences_users_1up_userpreferences_ida)) {
	        $template = BeanFactory::getBean("up_UserPreferences", $userObj->up_userpreferences_users_1up_userpreferences_ida);
	        $template->load_relationship("up_userpreferences_users_1");
	        
	    // one time user preferences
	    } elseif (!empty($userObj->up_userpreferences_usersup_userpreferences_ida)) {
	        $template = BeanFactory::getBean("up_UserPreferences", $userObj->up_userpreferences_usersup_userpreferences_ida);
	        $template->load_relationship("up_userpreferences_users");
	        
	        // once the user logs in once, the relationship is removed to the custom user preferences
	        $this->load_relationship('up_userpreferences_users');
	        $this->up_userpreferences_users->delete($template->id, $userObj->id);

	    } else {
	        $template = null;
	    }
	    
	    $userPrefs       = array();
	    $objectFieldList = $this->getObjectFieldList();
	    foreach ($this->getEnableFieldsList() as $enable => $value) {
	        if ($template->$enable == 1) {
    	        if (array_key_exists($value, $objectFieldList)) {
                    $newKey = $objectFieldList[$value];
                    $userPrefs[$newKey] = $template->$value;
                } else {
                    $userPrefs[$value] = $template->$value;
                }
	        }
	    }
	    
	    return $userPrefs;
	}
	
	/**
	 * Saves the current template user preferences
	 * 
	 * @param boolean $check_notify
	 * @return integer
	 */
	public function save($check_notify = false) {
	    
	    // loop through the fields white list and update the current user preferences
	    $fieldsList = $this->getFieldsList();
	    foreach ($fieldsList as $field) {
	        // if the post value is different from the object's attribute, update
	        if ($_POST[$field] != $this->$field) {
	            $this->$field = $_POST[$field];
	        }
	    }
	    
	    // loop through the enable white list and update the current user preferences
	    $enableList = $this->getEnableList();
	    foreach ($enableList as $field) {
	        // if the post value is different from the object's attribute, update
	        if ($_POST[$field] != $this->$field) {
	            $this->$field = $_POST[$field];
	        }
	    }
	    
	    $id = parent::save($check_notify);
	    
	    return $id;
	}
	
	/**
	 * List of fields in the user preferences template
	 * 
	 * @return multitype:string
	 */
	protected function getFieldsList() {
	    return array(
	            'assigned_user_name', 'assigned_user_id',
                'name', 'date_format', 'time_format',
                'timezone', 'first_day_week', 'currency',
                'currency_significant_digits',
                'decimal_symbol', 'thousands_separator',
                'email_client', 'themes', 'layout_options',
                'description'
	    );
	}
	
	/**
	 * List of enable flags field in the user preferences template
	 * 
	 * @return multitype:string
	 */
	protected function getEnableList() {
	    return array(
	        'date_format_enable', 'time_format_enable',
            'timezone_enable', 'decimal_symbol_enable',
            'currency_significant_digit_ena',
            'first_day_of_the_week_enable',
            'thousands_separator_enable',
            'currency_enable', 'email_client_enable',
            'themes_enable', 'layout_options_enable'
	    );
	}
	
	/**
	 * Returns the associative array between the enable flags and the field
	 * 
	 * @return multitype:string
	 */
	protected function getEnableFieldsList() {
	    return array(
            'date_format_enable' => 'date_format', 
            'time_format_enable' =>'time_format',
            'timezone_enable' => 'timezone',
            'first_day_of_the_week_enable' => 'first_day_week',
            'currency_enable' => 'currency',
            'currency_significant_digit_ena' => 'currency_significant_digits',
            'decimal_symbol_enable' => 'decimal_symbol', 
            'thousands_separator_enable' => 'thousands_separator',
            'email_client_enable' => 'email_client', 
            'themes_enable' => 'themes',
            'layout_options_enable' => 'layout_options'
        );
	}
	
	/**
	 * Returns the module field names and the actual user preferences array fields.
	 * 
	 * @return multitype:string
	 */
	protected function getObjectFieldList() {
	    return array(
	            'date_format' => 'datef',
	            'time_format' =>'timef',
	            'first_day_week' => 'fdow',
	            'currency_significant_digit' => 'default_currency_significant_digits',
	            'decimal_symbol' => 'dec_sep',
	            'thousands_separator' => 'num_grp_sep',
	            'email_client' => 'email_client_type',
	            'themes' => 'user_theme',
	            'layout_options' => 'hide_tabs',
	    );
	}
}
?>
<?php
$module_name = 'up_UserPreferences';
$viewdefs[$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'assigned_user_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'date_format_enable',
            'label' => 'LBL_DATE_FORMAT_ENABLE',
          ),
          1 => 
          array (
            'name' => 'date_format',
            'studio' => 'visible',
            'label' => 'LBL_DATE_FORMAT',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'time_format_enable',
            'label' => 'LBL_TIME_FORMAT_ENABLE',
          ),
          1 => 
          array (
            'name' => 'time_format',
            'studio' => 'visible',
            'label' => 'LBL_TIME_FORMAT',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'timezone_enable',
            'label' => 'LBL_TIMEZONE_ENABLE',
          ),
          1 => 
          array (
            'name' => 'timezone',
            'studio' => 'visible',
            'label' => 'LBL_TIMEZONE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'first_day_of_the_week_enable',
            'label' => 'LBL_FIRST_DAY_OF_THE_WEEK_ENABLE',
          ),
          1 => 
          array (
            'name' => 'first_day_week',
            'studio' => 'visible',
            'label' => 'LBL_FIRST_DAY_WEEK',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'currency_enable',
            'label' => 'LBL_CURRENCY_ENABLE',
          ),
          1 => 
          array (
            'name' => 'currency',
            'label' => 'LBL_CURRENCY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'currency_significant_digit_ena',
            'label' => 'LBL_CURRENCY_SIGNIFICANT_DIGIT_ENA',
          ),
          1 => 
          array (
            'name' => 'currency_significant_digits',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY_SIGNIFICANT_DIGITS',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'thousands_separator_enable',
            'label' => 'LBL_THOUSANDS_SEPARATOR_ENABLE',
          ),
          1 => 
          array (
            'name' => 'thousands_separator',
            'label' => 'LBL_THOUSANDS_SEPARATOR',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'decimal_symbol_enable',
            'label' => 'LBL_DECIMAL_SYMBOL_ENABLE',
          ),
          1 => 
          array (
            'name' => 'decimal_symbol',
            'label' => 'LBL_DECIMAL_SYMBOL',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'email_client_enable',
            'label' => 'LBL_EMAIL_CLIENT_ENABLE',
          ),
          1 => 
          array (
            'name' => 'email_client',
            'studio' => 'visible',
            'label' => 'LBL_EMAIL_CLIENT',
          ),
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'themes_enable',
            'label' => 'LBL_THEMES_ENABLE',
          ),
          1 => 
          array (
            'name' => 'themes',
            'studio' => 'visible',
            'label' => 'LBL_THEMES',
          ),
        ),
        11 => 
        array (
          0 => 
          array (
            'name' => 'layout_options_enable',
            'label' => 'LBL_LAYOUT_OPTIONS_ENABLE',
          ),
          1 => 
          array (
            'name' => 'layout_options',
            'label' => 'LBL_LAYOUT_OPTIONS',
          ),
        ),
        12 => 
        array (
          0 => 'description',
        ),
      ),
    ),
  ),
);

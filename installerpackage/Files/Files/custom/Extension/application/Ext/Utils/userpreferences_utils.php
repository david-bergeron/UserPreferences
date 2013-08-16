<?php 

function up_getDateFormats() {
    global $sugar_config;
    return $sugar_config['date_formats'];
}

function up_getTimeFormats() {
    global $sugar_config;
    return $sugar_config['time_formats'];
}

function up_getThemes() {
    return SugarThemeRegistry::availableThemes();
}

function up_getLayouts($focus, $name, $value, $view) {
    require_once 'modules/up_UserPreferences/Classes/Layouts.php';
    return Layouts::display($focus, $name, $value, $view = 'DetailView');
}

function up_getCurrencies($focus, $field, $value, $view) {
    require_once 'modules/Currencies/Currency.php';

    $currencySelect = getCurrencyDropDown($focus, $field, $value, $view);

    // change the select box id from currency_select to currency
    $currencySelect = str_replace('currency_select', 'currency', $currencySelect);
    return $currencySelect;
}
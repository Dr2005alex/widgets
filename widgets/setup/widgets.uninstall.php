<?php

defined('COT_CODE') or die('Wrong URL');

/* 
 *  Widgets
 *  Автор Dr2005alex 
 *  сайт http://mycotonti.ru
 */

require_once cot_incfile('configuration');

$wname = 'widgets';
cot_config_remove('widget_load', 'module', array( 'name' => $wname),'php');

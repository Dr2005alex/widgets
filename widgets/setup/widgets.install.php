<?php

defined('COT_CODE') or die('Wrong URL');

/* 
 *  Widgets
 *  Автор Dr2005alex 
 *  сайт http://mycotonti.ru
 */

require_once cot_incfile('configuration');

$wname = 'widgets';
$wpath_php = cot_incfile('widgets','module');

cot_config_add('widget_load', array('0'=>array( 'name' => $wname,'type' => '0','default' => $wpath_php)),'module','php');

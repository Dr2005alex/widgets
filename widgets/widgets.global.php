<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=global
[END_COT_EXT]
==================== */
/* 
 *  Widgets
 *  Автор Dr2005alex 
 *  сайт http://mycotonti.ru
 */
defined('COT_CODE') or die('Wrong URL.');

// дежурная глобальная функция для подключения файлов и вызова необходимой функции
function wg()
{
    global $cfg;

    $args = func_get_args();
    $func_name =  $args[0];

        // load php 
        if(!function_exists($func_name)){
            
            if(!empty($cfg['widget_load']['cat_php'][$func_name])){
                
                require_once $cfg['widget_load']['cat_php'][$func_name];
                
            }
            else 
            { 
                return 'Widget configuration is not correct'; 
            }
        }
 
        unset($args[0]);
        return call_user_func_array($func_name, $args);
}

// для виджета datetimepicker (создаем post данные для подмены)
$datetimepicker = cot_import('datetimepicker', 'P', 'ARR');

if(count($datetimepicker) > 0){
    
    wg('widgets','datetimepicker',0,0,0, $datetimepicker);
     
}
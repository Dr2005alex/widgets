<?php
defined('COT_CODE') or die('Wrong URL');
/* 
 *  Widgets
 *  Автор Dr2005alex 
 *  сайт http://mycotonti.ru
 */

function Widgets(){
    
    $args = func_get_args();
    $func_name =  $args[0];
    
    unset($args[0]);
    
    if(function_exists($func_name)){
        
        return call_user_func_array($func_name, $args);
        
    }else{
        global $cfg;
        require_once $cfg['modules_dir'].'/widgets/class/'.ucfirst($func_name).'.php';
        
        $classname ='widgets_class_'.ucfirst($func_name);
        $result = new $classname($args);
        
        return $result->result;
    }
    
}

// подключение языкового файла виджета
function cot_wg_langfile($name, $wgname , $default = 'ru', $lang = null){
    
    global $cfg;
	if (!is_string($lang))
	{
		global $lang;
	}
        if (@file_exists($cfg['modules_dir']."/$name/lang/$wgname/$wgname.$lang.lang.php"))
        {
                return $cfg['modules_dir']."/$name/lang/$wgname/$wgname.$lang.lang.php";
        }else{
                return $cfg['modules_dir']."/$name/lang/$wgname/$wgname.$default.lang.php";
        }
        return false;        
}

// подключение  файла ресурсо виджета
function cot_wg_resources($name, $wgname){
    
    global $cfg;
    
        if (@file_exists($cfg['modules_dir']."/$name/resources/$wgname.php"))
        {
                return $cfg['modules_dir']."/$name/resources/$wgname.php";
        }
        return false;        
}
        
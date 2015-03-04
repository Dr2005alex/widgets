<?php
defined('COT_CODE')  || die('Wrong URL.');
/* 
 *  Widgets Zodiac
 *  Автор Dr2005alex 
 *  сайт http://mycotonti.ru
 */

/*  Показ знака зодиака по дате рождения
 *  вызов в TPL 
 *
 *  {USERS_DETAILS_BIRTHDATE_STAMP|wg('widgets','zodiac',$this)} - картинка и текст
 *  {USERS_DETAILS_BIRTHDATE_STAMP|wg('widgets','zodiac',$this,'image')} - картинка
 *  {USERS_DETAILS_BIRTHDATE_STAMP|wg('widgets','zodiac',$this,'text')} - только текст
 */

class widgets_class_Zodiac{
    
    var $date;
    
    public function __construct($data){
        
        global $cfg;
        
        if(empty($data[1])) return;
        
        require_once(cot_wg_langfile('widgets','zodiac'));
        require_once(cot_wg_resources('widgets','zodiac'));
       
        $this->date = $data[1];
        $res = $this->get();
        if(!empty($data[2])){
            $af = ($data[2] == 'image') ? '_image' : '_text';
        }
        $this->result = cot_rc($R['zodiac'.$af], array( 'text' => $L['zodiac_'.$res], 'imgname' => $res ));
        
        

    }
    public  function get(){
        
        $day = (int)cot_date('j', $this->date, false);
        $month = (int)cot_date('n', $this->date, false);
        
        if(($day>=21 && $month==3) || ($day<=20 && $month==4)){$zodiac = 'oven';}
        if(($day>=21 && $month==4) || ($day<=21 && $month==5)){$zodiac = 'telec';}
        if(($day>=22 && $month==5) || ($day<=21 && $month==6)){$zodiac = 'bliznecy';}
        if(($day>=22 && $month==6) || ($day<=22 && $month==7)){$zodiac = 'rak';}
        if(($day>=23 && $month==7) || ($day<=23 && $month==8)){$zodiac = 'lev';}
        if(($day>=24 && $month==8) || ($day<=23 && $month==9)){$zodiac = 'deva';}
        if(($day>=24 && $month==9) || ($day<=23 && $month==10)){$zodiac = 'vesy';}
        if(($day>=24 && $month==10) || ($day<=22 && $month==11)){$zodiac = 'skorpion';}
        if(($day>=23 && $month==11) || ($day<=21 && $month==12)){$zodiac = 'strelec';}
        if(($day>=22 && $month==12) || ($day<=20 && $month==1)){$zodiac = 'kozerog';}
        if(($day>=21 && $month==1) || ($day<=19 && $month==2)){$zodiac = 'vodoley';}
        if(($day>=20 && $month==2) || ($day<=20 && $month==3)){$zodiac = 'ryby';}
        
        return $zodiac;

    } 
}


class_alias('widgets_class_Zodiac', 'Zodiac');
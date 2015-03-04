<?php
defined('COT_CODE')  || die('Wrong URL.');
/* 
 *  Widgets DateTimePicker
 *  Автор Dr2005alex 
 *  сайт http://mycotonti.ru
 */
/*
 *  Виджет удобного выбора дат для Cotonti
 *  вызов из tpl файлов используя
 * 
 *  jQuery DateTimePicker plugin v2.3.8
 *  @homepage http://xdsoft.net/jqplugins/datetimepicker/
 *  (c) 2014, Chupurnov Valeriy.
 * 
 *  в users.profile.tpl и user.edit.tpl 
 *  заменить {USERS_PROFILE_BIRTHDATE} и {USERS_EDIT_BIRTHDATE} на
 *  {PHP.urr.user_birthdate|wg('widgets','datetimepicker','ruserbirthdate',$this)} - дата рождения 
 * 
 *  page.add.tpl 
 *  заменить {PAGEADD_FORM_BEGIN} на
 * {PHP.rpagebegin|wg('widgets','datetimepicker','rpagebegin',$this)}
 * 
 * заменить {PAGEADD_FORM_EXPIRE} на
 * {PHP.rpageexpire|wg('widgets','datetimepicker','rpageexpire',$this)}
 * 
 * page.edit.tpl
 * заменить {PAGEEDIT_FORM_BEGIN} на
 * {PHP.pag.page_begin|wg('widgets','datetimepicker','rpagebegin',$this)}
 * 
 * заменить {PAGEEDIT_FORM_EXPIRE} на
 * {PHP.pag.page_expire|wg('widgets','datetimepicker','rpageexpire',$this)}
 * 
 * заменить {PAGEEDIT_FORM_DATE} на
 * {PHP.pag.page_date|wg('widgets','datetimepicker','rpagedate',$this)}

 */

class widgets_class_Datetimepicker{
    
    var $name; // имя переменной
    var $date; // дата + время unix
    var $import; // входные данные для подмены
    var $dateformat; // полный формат даты
    var $dateformat_short; //короткий формат даты
    var $result;
    
    public function __construct($data){
        
        global $usr,$R;
        

        $this->dateformat = 'd.m.Y H:i';
        $this->dateformat_short = 'd.m.Y';
        
        $this->name = $data[1];
        $this->import = $data[4];
        $short = $data[3];
        
        if($this->name == 'ruserbirthdate'){
            
            $this->date = cot_date2stamp($data[2]);
            $short = true;
            
        }else{
            $this->date = $data[2];
        }
        
        if($short){
            
            $this->dateformat = $this->dateformat_short;
            $adddata .= 'data-short = 1 ';
        }
        
        $adddata .= ' data-lang = '.$usr['lang'];
                
        if($this->import){
           $this->fake(); 
        }
        if(!$R['input_datetimepicker']){
            
            require_once(cot_wg_resources('widgets','datetimepicker'));
            $loader = cot_rc($R['input_datetimepicker_loader']);
        }
        
        return $this->result = cot_rc($R['input_datetimepicker'], array('data' => $adddata, 'loader' => $loader ,'name' => 'datetimepicker['.$this->name.']', 'value' => ($this->date)? cot_date($this->dateformat, $this->date, $short ? 0 : 1):'' ));
        
        

    }
    private function fake(){
        // подмена данных для cot_import_date()
        foreach ($this->import as $key => $value) {
          
            $arrdt = explode(' ', $value);
            $adt = explode('.', $arrdt[0]);
            $ati = explode(':', $arrdt[1]);
            
            $_POST[$key]['day'] = $adt[0];
            $_POST[$key]['month'] = $adt[1];
            $_POST[$key]['year'] = $adt[2];
            $_POST[$key]['hour'] = $ati[0];
            $_POST[$key]['minute'] = $ati[1];        
        }

    } 
}


class_alias('widgets_class_Datetimepicker', 'Datetimepicker');
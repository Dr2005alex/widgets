<?php

$R['input_datetimepicker_loader'] = '<span class="load_script" data-url="modules/widgets/js/jquery.datetimepicker.js" data-cache="0" data-url-css = "modules/widgets/js/jquery.datetimepicker.css" ></span>';

$R['input_datetimepicker'] .= '<input type="text" name="{$name}" value="{$value}"  class="datetimepicker form-control" {$data} />{$error}{$loader}';

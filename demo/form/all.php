<?php

use Xbcode\Builder\Renders\Form;
include '../../vendor/autoload.php';

$result = Form::make([], function(Form $form){

});

// 转JSON(必须)
$json = json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
print_r($json);
exit;
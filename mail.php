<?php

$token = "2142468796:AAGWdxlEbXP_QHG939f_qbJ75ZK4YSq6UWE";
$chat_id = "690551539";

$values = $hook->getValues();

#Получаем название формы
$formName = $modx->getOption('myForm', $formit->config, 'form-'.$modx->resource->get('id'));

#Получаем ip адрес отправителя

#Данные с формы
$name = $values['name'];
$phone = $values['phone'];

#Создаем массив
$arr = array(
"Имя" => $name,
"Телефон" => $phone
);

/*Цикл по массиву (собираем сообщение) */
foreach($arr as $key => $value) { 
     $txt .= "<b>".$key."</b>: ".$value."%0A"; 
  }

#Отправляем сообщение
$fp=fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

#Возвращаем true
return true;
?>
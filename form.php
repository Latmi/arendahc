<?php

if($_POST){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $item = $_POST['email'];
    $mess = $_POST['com'];
    $to  = 'arenda@hcdom.ru';
    $from = 'info@manaman.pro';
    $subject = "Сообщение";
    //$message = 'Имя: '.$_POST['name'].'Телефон: '.$_POST['phone'].'Товар: '.$_POST['item'].';';
    $message = '<table width="100%" border="1">
                    
                    <tr style="height: 50px">
                        <td style="padding-left: 10px" width="25%">Имя</td><td style="padding-left: 10px" width="25%">Телефон</td><td style="padding-left: 10px" width="25%">E-mail</td><td style="padding-left: 10px" width="25%">Сообщение</td>
                    </tr>
                    <tr style="height: 50px">
                        <td style="padding-left: 10px" width="25%">'.$_POST['name'].'</td><td style="padding-left: 10px" width="25%">'.$_POST['phone'].'</td><td style="padding-left: 10px" width="25%">'.$_POST['email'].'</td><td style="padding-left: 10px" width="25%">'.$_POST['com'].'</td>
                    </tr>
                    
                </table>';
    $headers = "Content-type: text/html; charset=UTF-8 \r\n";
    $headers .= "From: <info@manaman.pro>\r\n";
    $result = mail($to, $subject, $message, $headers);
    if ($result){
        echo "Спасибо, $name.<br> менеджер перезвонит вам на указанный номер:<br>$phone.<br>Оставайтесь на связи.";
    }}


?>
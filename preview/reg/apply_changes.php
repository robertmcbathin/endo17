<?php
include_once '../functions.php';
$rid         = $_POST['rid'];
$input_fio         = $_POST['fio'];
$phone       = $_POST['phone'];
$frommail    = $_POST['frommail'];
$direction   = $_POST['direction'];
$desireddate = $_POST['desireddate'];
$comment     = $_POST['comment'];

$update_query = "UPDATE `request` SET `fio`='$input_fio', `phone`='$phone', `frommail`='$frommail', `direction`='$direction', `desireddate`='$desireddate', `comment`='$comment' WHERE `rid`='$rid' ";
$result = queryMysql($update_query);     
if($result)
{
    echo "Изменения сохранены";
}
else
{
    echo "Сохранить изменения не удалось";
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


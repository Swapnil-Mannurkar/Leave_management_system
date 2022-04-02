<?php
require 'db.inc.php';

$res = mysqli_query($con, "select * from Leave_applied where LID = '".$_SESSION['LID']."'");
$row = mysqli_fetch_assoc($res);

$ffn = mysqli_query($con, "select FName, Email from faculty where FID = '".$row['FAID']."'");
$fa = mysqli_fetch_assoc($ffn);

define('RECEIVER',$fa['Email']);
define('RECEIVER_NAME',$fa['FName']);

define('SENDER',$_SESSION['EMAIL_ID']);
define('SENDER_NAME',$_SESSION['USER_NAME']);
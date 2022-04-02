<?php
require('db.inc.php');
if (!isset($_SESSION['ROLE'])) {
    header('location:login.php');
    die();
}
?>

<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body style="margin-top:45px;">
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse" style="margin-top:60px;">
                <ul class="nav navbar-nav">
                    <li class="menu-title">MENU</li>
                    <li class="menu-item-has-children dropdown">
                        <a href="add_faculty.php?id=<?php echo $_SESSION['USER_ID'] ?>">Your profile</a>
                    <li class="menu-item-has-children dropdown">
                        <a href="leave.php">Apply leave</a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="leave_request.php">Adjustment requested</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
    <div id="right-panel" class="right-panel">
        <header id="header" class="header" style="padding-bottom: 100px;">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href='add_faculty.php?id=' <?php $_SESSION['USER_ID'] ?> style="margin-left: 40px;"><img src="assets/img/logo.jpg" width="80px" height="80px"></a>
                    <a id="menuToggle" class="menutoggle" style="margin-left:-120px;"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div style="font-size: 25px; margin-top: 30px;">
               <b style="margin-left: -60px;"> KLE DR. M S Sheshgiri College of Engineering and Technology, Belagavi </b>
            </div>
            <div class="top-right">
                <div class="header-menu" style="margin-top: -40px;">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" style="font-size: 18px; color:#444444;" data-toggle="dropdown"><b> Welcome <?php echo $_SESSION['USER_NAME'] ?> </b> </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" style="font-size: 14px; margin-top :-10px;" href="http://localhost/lms/logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
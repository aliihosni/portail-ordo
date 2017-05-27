<?php

if (isset($_POST['submit'])) {

    session_start();
    ob_start();

    include "db.php";


// Define $myusername and $mypassword
    $myusername=$_POST['myusername'];
    $mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);

    $sql="SELECT * FROM members WHERE username='$myusername' and password='$mypassword'";
    $result=mysql_query($sql);
    $row = mysql_fetch_array($result);
    $role = $row['role'];


// Mysql_num_row is counting table row
    $count=mysql_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row

    if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"

        $_SESSION['myusername']=$myusername;
        $_SESSION['mypassword']=$mypassword;
        $_SESSION['myrole']=$role;


        header("location:index.php");


    }
    else {
        header("location:login.php");
    }

    ob_end_flush();
}
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Portail ORDO | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" href="favicon_0.ico" type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">


    <link rel="stylesheet" href="js/css/form-elements.css">
    <link rel="stylesheet" href="js/css/style.css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>Portail</strong> ORDO</h1>
                    <div class="description">
                        <p><small>
                            Copyright &copy; 2017.
                            <a target="_blank" href="http://www.orange.tn/">Orange <strong>TN</strong></a>, Tous droits réservés
                            </small>a</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">
                    <div class="form-top">
                        <div class="form-top-left">
                            <h3>Login</h3>
                            <p>Connecter pour commmencer votre session:</p>
                        </div>
                        <div class="form-top-right">
                            <i class="fa fa-lock"></i>
                        </div>
                    </div>
                    <div class="form-bottom">
                        <form role="form" action="" method="post" class="login-form">
                            <div class="form-group">
                                <label class="sr-only" for="form-username">Login</label>
                                <input type="text" name="myusername" placeholder="Login..." class="form-username form-control" id="form-username">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="form-password">Mot de passe</label>
                                <input type="password" name="mypassword" placeholder="Mot de passe..." class="form-password form-control" id="form-password">
                            </div>
                            <button type="submit" name="submit" class="btn">Connexion</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>


<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>


<script src="js/jquery.backstretch.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>

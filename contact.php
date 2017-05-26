<?php
include('header.php');

include('nav.php');
include('aside.php');



$res ="";
if (isset($_POST["email"])) {

    $email=$_POST["email"];

    $name=$_POST["name"];
    $surname = $_POST["surname"];
    $sujet=$_POST["subject"];

    $email_message = '<div>';

    $email_message .= '<span><h6>Prénom</h6>'.utf8_decode($_POST["name"]). '</span>';
    $email_message .= '<span><h6>Nom</h6>'.utf8_decode($_POST["surname"]). '</span>';
    $email_message .= '<span><h6>E-mail</h6>'.utf8_decode($email). '</span>';
    $email_message .= '<span><h6>Sujet</h6>'.utf8_decode($sujet). '</span>';


    $email_message .= '</div><br>';



    $text=$email_message . '<div><h3>Message</h3>'.utf8_decode($_POST["message"]). '</div>';



/// Please change that email
            $myemail = "hosni.exe@gmail.com";
            $mymane ="Contact ORDO";


    date_default_timezone_set('Etc/UTC');

    require './PHPMailer-master/PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    /*
    omarchaari00@hotmail.fr
    AKol4521.klo@i
    */

    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';

    //Set the hostname of the mail server
    $mail->Host = 'smtp.live.com';
    // use
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 587;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "amalchaariorange@hotmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "orange2017";

    //Set who the message is to be sent from
    $mail->setFrom('amalchaariorange@hotmail.com', 'First Last');

    //Set an alternative reply-to address
    $mail->addReplyTo('amalchaariorange@hotmail.com', 'First Last');

    //Set who the message is to be sent to
    $mail->addAddress($myemail, $mymane);

    //Set the subject line
    $mail->Subject = utf8_decode($sujet);

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

    $mail->msgHTML(utf8_decode($text));
    //Replace the plain text body with one created manually
    //$mail->AltBody = 'This is a plain-text message body test 1';

    //Attach an image file
    //$mail->addAttachment('images/phpmailer_mini.png');

    //send the message, check for errors


    if ($mail->send()) {
        $res = '<div class="alert alert-success" role="alert"><center >    E-mail envoyé avec succés  </center></div>';
    }else{
        $res =  '<div class="alert alert-danger" role="alert"><center>    Echec d\'envoi E-mail  </center></div>';
    }



}
?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contact
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Contact</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            <div class="">

                <div class="row">

                    <div class="col-lg-12 ">


                        <div class="box box-warning">
                            <div class="box-header with-border bg-warning">

                                <?php

                                echo $res ;

                                ?>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">


                                    <form id="contact-form" method="post" action="contact.php" role="form" >

                                        <div class="messages"></div>

                                        <div class="controls">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_name">Prénom *</label>
                                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Votre prénom *" required="required" data-error="Le prénom est requis.">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_lastname">Nom *</label>
                                                        <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Votre nom de famille*" required="required" data-error="Le nom de famille est requis.">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_email">Email *</label>
                                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Votre addresse Email *" required="required" data-error="Valider votre email.">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form_subject">Sujet *</label>
                                                        <input id="form_subject" type="text" name="subject" class="form-control" placeholder="Sujet*" required="required">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="form_message">Message *</label>
                                                        <textarea id="form_message" name="message" class="form-control" placeholder="Votre Message *" rows="4" required="required" data-error="Ecrire le contenu du message."></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <center><div class="col-md-12">
                                                    <input type="submit" class="btn btn-warning btn-send" value="Envoyer">
                                                </div></center>
                                            </div>

                                        </div>

                                    </form>


                                <!-- /.row -->
                            </div>
                            <!-- ./box-body -->

                            <!-- /.box-footer -->
                        </div>
                        <!-- /.box -->






                    </div>

                </div>

            </div>



    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include ('footer.php');
?>

<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>



<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>


<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>


<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="validator.js"></script>
</body>
</html>
<?php
include('db.php');
include('header.php');

include('nav.php');
include('aside.php');
$result = mysql_query("SELECT * FROM `swan_h+24` WHERE `Etat` Like 'plani%' and `debut` > '2016-07-29 08:00:00' ORDER BY `Etat` ASC  ") ;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TP H+24
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">TP H+24</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">





        <script type="text/javascript">

            $(document).ready(function() {
                $('#datatables').DataTable();
            } );


        </script>




        <div class="row">

            <div class="col-md-12 form-group-sm">
                <div class="box box-warning">
                    <div class="box-header with-border">

                        <div class="box-title pull-right ">
                            <button type="button" class="btn  btn-warning" data-toggle="modal" data-target="#email"><i class="fa fa-envelope"></i>
                            </button>
                        </div>
                    </div>
                <!-- /.box-header -->
                    <div class="box-body ">
                        <div class="">



                            <center>
                                <table id="datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Réf ATP</th>
                                        <th>Date Début</th>
                                        <th>Date Fin</th>
                                        <th>Durée(HH:mm)</th>
                                        <th>Noeud</th>
                                        <th>Impact</th>
                                        <th>Description</th>
                                        <th>Impact</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while ( $row = mysql_fetch_array($result))   {
                                        ?>
                                        <tr>
                                            <td> <?php echo utf8_encode($row['Identifiant'])?> </td>
                                            <td> <?php echo utf8_encode($row['debut'])?> </td>
                                            <td> <?php echo utf8_encode($row['fin'])?> </td>
                                            <td> <?php echo utf8_encode($row['Duree'])?> </td>
                                            <td> <?php echo utf8_encode($row['ID_objet'])?> </td>
                                            <td> <?php echo utf8_encode($row['Impact'])?> </td>
                                            <td> <?php echo utf8_encode($row['Description'])?> </td>
                                            <td> <?php echo utf8_encode($row['Demandeur'])?> </td>


                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </center>





                        </div>
                        <!-- /.container -->
                    </div>
                    <!-- ./box-body -->

            </div>
            <!-- ./box -->

            </div>
            <!-- /.col   -->

        </div>
        <!-- /.row -->


</div>
<!-- /.row -->

<div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="email">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alerte</h4>
            </div>

            <div class="modal-body">



                <?php


                $result = mysql_query("SELECT * FROM `swan_h+24` WHERE `Etat` Like 'plani%' and `debut` > '2016-07-29 08:00:00' ORDER BY `Etat` ASC  ") ;

                $message  = '
  
 <p class=MsoNormal><o:p>&nbsp;</o:p></p><p class=MsoNormal style=\'margin-bottom:12.0pt\'>Bonsoir, <o:p></o:p></p>
  
<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=\"100%\" style=\'width:100.0%;border-collapse:collapse\' >
          <tr style=\'height:26.25pt\'>
		     <td width=75 style=\'width:56.25pt;border:solid #FF8000 1.0pt;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>R&eacute;f ATP</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
			  <td width=78 style=\'width:58.5pt;border:solid #FF8000 1.0pt;border-left:none;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>D&eacute;but</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
			  <td width=78 style=\'width:58.5pt;border:solid #FF8000 1.0pt;border-left:none;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>Fin</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
			  <td width=78 style=\'width:58.5pt;border:solid #FF8000 1.0pt;border-left:none;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>Durée(HH:mm)</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
                                  
                                  <td width=78 style=\'width:58.5pt;border:solid #FF8000 1.0pt;border-left:none;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>Type de change</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
                                  
                                  
                                  <td width=78 style=\'width:58.5pt;border:solid #FF8000 1.0pt;border-left:none;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>Noeud</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
                           
                           
                           
                           
                           <td width=78 style=\'width:58.5pt;border:solid #FF8000 1.0pt;border-left:none;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>Impact</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
                           
                           
                           
                           
                           
                           
                           <td width=78 style=\'width:58.5pt;border:solid #FF8000 1.0pt;border-left:none;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>Description</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
                           
                           
                          
                           
                           
                         <td width=77 style=\'width:57.75pt;border:solid #FF8000 1.0pt;border-left:none;background:black;padding:0cm 0cm 0cm 0cm;height:26.25pt\'><p class=MsoNormal align=center style=\'text-align:center\'><b><span style=\'color:#FF8000\'>Demandeur</span></b><b><span style=\'font-size:12.0pt;color:#FF8000\'><o:p></o:p></span></b></p></td>
                         
                          </tr>  ';


                while ( $row = mysql_fetch_array($result))   {

                    $message .=  ' <tr>
                           
                           
                           
                           <td style=\'border:solid #FF8000 1.0pt;border-top:none;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'> '.utf8_encode($row['Identifiant']).' <span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td>
						     
							
							  <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'> '.utf8_encode($row['debut']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td>
							  
							  <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'> '.utf8_encode($row['fin']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td>
							  
							  <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'> '.utf8_encode($row['Duree']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td>
							  
							  
							  <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'> '.utf8_encode($row['tech_resp']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td>
							  
							  
							  <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'> '.utf8_encode($row['ID_objet']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td>
							  
							  ';






                    // les cloueurs vert rouge jaune

                    if (utf8_encode($row['Impact']) == 'Sans perturbation' ) {

                        $message .=				'  <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;background:#00C000;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'>'.utf8_encode($row['Impact']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td> ';   }

                    else if ( utf8_encode($row['Impact']) == 'Coupure franche' or utf8_encode($row['Impact']) == 'Perte de trafic') {

                        $message .=				'  <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;background:red;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'>'.utf8_encode($row['Impact']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td> ';

                    }

                    else if ( utf8_encode($row['Impact']) == 'Micro-coupure' or utf8_encode($row['Impact']) == 'Risque de coupure' ) {

                        $message .=				'  <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;background:orange;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'>'.utf8_encode($row['Impact']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td> ';

                    }






                    $message .=	'    <td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'> '.utf8_encode($row['Description']).'<span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td>
							
							
							
								
								<td style=\'border-top:none;border-left:none;border-bottom:solid #FF8000 1.0pt;border-right:solid #FF8000 1.0pt;padding:0cm 0cm 0cm 0cm\'><p class=MsoNormal align=center style=\'text-align:center\'><b>'.utf8_encode($row['Demandeur']).'</b><span style=\'font-size:12.0pt\'><o:p></o:p></span></p></td>
							  
							  
							
							
							
							
							
							 </tr>  ';




                }


                $message .=  ' </table>  ';




                $email="hosni.exe@gmail.com";
                $name="ORANGE TN";

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
                $mail->setFrom("amalchaariorange@hotmail.com", 'First Last');

                //Set an alternative reply-to address
                $mail->addReplyTo("amalchaariorange@hotmail.com", 'First Last');

                //Set who the message is to be sent to
                $mail->addAddress($email, $name);

                //Set the subject line
                $mail->Subject = 'TP H+24';

                //Read an HTML message body from an external file, convert referenced images to embedded,
                //convert HTML into a basic plain-text alternative body
                //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

                $mail->msgHTML(utf8_decode($message));
                //Replace the plain text body with one created manually
                //$mail->AltBody = 'This is a plain-text message body test 1';

                //Attach an image file
                //$mail->addAttachment('images/phpmailer_mini.png');

                //send the message, check for errors


                if ($mail->send()) {
                        echo '<div class="alert alert-success" role="alert"><center >    E-mail envoyé avec succés  </center></div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert"><center>    Echec d\'envoi E-mail  </center></div>';
                }




                ?>


            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>

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

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>



</body>
</html>

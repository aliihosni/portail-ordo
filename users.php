<?php

session_start();
if( $_SESSION["myrole"] != 'admin' )
{
    header('Location: index.php');
    exit();
}

include('db.php');
include('header.php');

include('nav.php');
include('aside.php');


$erreur='';
if (isset($_POST["delete"])){

    if (  (isset($_POST['login']) && !empty($_POST['login']))    )
    {

        $sql= "DELETE from members where `username`= '".$_POST['login']."' ";
        mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

        $erreur= $_POST['login'].' supprimé(e) avec succés';
        $erreur = '<div class="alert alert-success" role="alert"><center >    '.$erreur.'  </center></div>';
    }

    else {
        $erreur = 'Veuillez choisir un utilisateur à supprimer.';
        $erreur =  '<div class="alert alert-warning" role="alert"><center>    '.$erreur.'  </center></div>';
    }
}


if (isset($_POST["add"]))
{

    if (  (isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['pass']) && !empty($_POST['pass'])) && (isset($_POST['pass_confirm']) && !empty($_POST['pass_confirm'])) && (isset($_POST['e-mail']) && !empty($_POST['e-mail']))  && (isset($_POST['equipe']) && !empty($_POST['equipe'])) )
    {
        // on teste les deux mots de passe
        if ($_POST['pass'] != $_POST['pass_confirm']) {
            $erreur = 'Les deux mots de passe sont différents';
        }
        else {

            // on recherche si ce login est déjà utilisé par un autre membre
            $sql = 'SELECT count(*) FROM members WHERE username="'.mysql_escape_string($_POST['login']).'"';
            $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
            $data = mysql_fetch_array($req);

            if ($data[0] == 0) {
                $sql = 'INSERT INTO members  VALUES( NULL , "'.mysql_escape_string($_POST['login']).'", "'.$_POST['pass'].'","'.mysql_escape_string($_POST['e-mail']).'","'.mysql_escape_string($_POST['equipe']).'","'.mysql_escape_string($_POST['ty_role']).'")';
                mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

                $erreur = "Utilisateur ajouté avec succés";
            }
            else {
                $erreur = 'Un membre possède déjà ce login';
            }
        }
    }
    else {
        $erreur = 'Au moins un des champs est vide';
    }

    if ($erreur =='Utilisateur ajouté avec succés') {
        $erreur = '<div class="alert alert-success" role="alert"><center >    '.$erreur.'  </center></div>';
    }else{
        $erreur =  '<div class="alert alert-warning" role="alert"><center>    '.$erreur.'  </center></div>';
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Table
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
            <li class="active">Gestion utilisateurs</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-xs-3 pull-right">
                <button class="btn btn-danger btn-block btn-block btn-social" data-toggle="modal" data-target="#delete"><i class="fa fa-user-times"></i>    <center>Supprimer utilisateur</center></button>
            </div>
        </div>
        <br>

        <?php
        echo $erreur;
        ?>

        <div class="box box-warning">

            <div class="box-header">
                <h3 class="box-title">Inscrire nouveau membre</h3>
            </div>
            <div class="box-body">
                <div class="row">



                    <div class="col-md-12">
                        <div class="register-logo">
                            <a href="index.php"><b>Portail</b>ORDO</a>
                        </div>

                        <div class="register-box-body">

                            <form action="users.php" method="post">
                                <div class="form-group has-feedback">
                                    <input name="login" type="text" class="form-control" placeholder="Login" required="required" data-error="Login est requis.">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                </div>

                                <div class="form-group has-feedback">
                                    <input name="pass" type="password" class="form-control" placeholder="Mot de passe" required="required" data-error="Mot de passe est requis.">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input name="pass_confirm" type="password" class="form-control" placeholder="Retaper le mot de passe" required="required" data-error="Retaper le mot de passe.">
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input name="e-mail" type="email" class="form-control" placeholder="Email" required="required" data-error="Email est requis.">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input name="equipe" type="text" class="form-control" placeholder="Equipe" required="required" data-error="Equipe est requis.">
                                    <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <select name="ty_role" class="form-control select2" style="width: 100%;" id="role" required>
                                        <option selected="selected" value="admin">Administrateur</option>
                                        <option value="user">Utilisateur</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-xs-4 pull-right">
                                        <button type="submit" name="add" class="btn btn-success btn-block btn-flat">Ajouter utilisateur</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>


                        </div>
                    </div>
                    <!-- /.col -->




                </div>
                <!-- /.row -->

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->






</div>
<!-- /.row -->





<div class="modal fade bs-example-modal-sm modal-danger " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="delete">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Veuillez choisir un utilisateur à supprimer</h4>
            </div>

            <div class="modal-body">
                <?php
                $result = mysql_query("SELECT * FROM `members`  ") ;
                ?>
                <form action="users.php" method="post">

                    <div class="form-group has-feedback">
                        <select name="login" class="form-control select2" style="width: 100%;" id="role" required>
                            <?php
                                while ( $row = mysql_fetch_array($result))   {
                                    ?>
                                    <option name="login" value="<?php echo utf8_encode($row['username']); ?>"><?php echo utf8_encode($row['username']); ?> </option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>


            </div>

                    <div class="modal-footer">
                        <button type="submit" name="delete" class="btn btn-warning pull-right" >Supprimer utilisateur</button>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
                    </div>
                </form>
        </div>
    </div>
</div>







</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include ('footer.php');
?>

<script type="text/javascript">
    $(function () {
        $(".select2").select2();
        $('#date1').datepicker({
            autoclose: true
        });
    });
</script>



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



<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
</body>
</html>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Recherche...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>

            <li>
                <a href="index.php">
                    <i class="fa fa-dashboard"></i> <span>Accueil</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>ATP</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="carte.php"><i class="fa fa-circle-o"></i> MAP</a></li>
                    <li><a href="tableswan.php"><i class="fa fa-circle-o"></i> Table</a></li>
                </ul>
            </li>

            <li>
                <a href="T24_table.php">
                    <i class="fa fa-folder"></i> <span>TP H+24
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>KPI</span>
                    <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="kpi.php"><i class="fa fa-circle-o"></i> Ajouter</a></li>
                    <li><a href="TableauDelaiAtp.php"><i class="fa fa-circle-o"></i> Tableau delai ATP</a></li>

                </ul>
            </li>
            <li><a href="dashboard.php"><i class="fa fa-area-chart"></i> <span>Dashboard</span></a></li>
            <?php
            if( $_SESSION["myrole"] == 'admin' )
            {
                echo '<li>
                        <a href="users.php">
                            <i class="fa fa-users"></i> <span>Gestion utilisateurs</span>
                        </a>
                    </li>';
            }
            ?>


            <li>
                <a href="contact.php">
                    <i class="fa fa-envelope"></i> <span>Contact
                </a>
            </li>




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>


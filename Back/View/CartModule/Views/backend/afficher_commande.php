<?php 

require_once '../../Controller/commandeC.php';
require_once '../../Model/commande.php';
session_start();
  $commandeC =  new commandeC();
    $db=config::getConnexion();
    
    $result=$db->query('SELECT * FROM orders');

    if (isset($_GET['search'])&& !empty($_GET['search']))
    {
        $result=$db->query('SELECT * FROM orders WHERE name like \'%'.$_GET['search'].'%\'');
        
    }else
    {
        $result=$db->query('SELECT * FROM orders');
    }


    if (isset($_GET['delete']))
    {

        $id =$_GET['delete'];
       
        $res=$commandeC->supprimerCommande($id);
        if ($res)
        {
            header("Location: afficher_commande.php?success=Suppression executée avec succès");
        }
       else 
       {
        header("Location: afficher_commande.php?error=Echec");
       }
      
    }
    if (isset($_GET['tri'])) {
        if ($_GET['tri']=="ID") {
          $tri="id";
         
         
        }
       

       
          else
          {
              $tri="name";
             $result=$commandeC->afficherCommandetri($tri);
            
          }
        
          
    }
?>
                
                <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Commande Edueasy</title>
    <link rel="shortcut icon" href="study.jpg">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="Assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="Assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="Assets/css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="Assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="Assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/style.css">
    <!-- Favicon-->

  
</head>

<body>
<?php include_once 'include/header.php'; ?>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"> <img src="Assets/img/avatar-7.jpg" alt="..." class="img-fluid rounded-circle" ></div>
                <div class="title">
                    <h1 class="h5"> Adem </h1>
                    <p>Admin</p>
                </div>
            </div>

            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="active">
                    <a href="../../../index.php"> <i class="icon-home"></i>Accueil </a>
                </li>
                <!-- <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Graphiques </a></li> -->
                <!-- <li><a href="forms.html"> <i class="icon-padnote"></i>Formulaires </a></li> -->
                <li>
                    <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Informations </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Ajouter un cours</a></li>
                        <li><a href="#">Ajouter une carte de fidélité</a></li>
                        <li><a href="#">Ajouter promotion</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Tables</a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">Cours</a></li>
                        <li><a href="#">Cartes Fidélité</a></li>
                        <li><a href="#">Promotions</a></li>
                        <li><a href="afficher_commande.php">Commandes</a></li>

                    </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <!-- Page Header-->
            
            <div class="page-header no-margin-bottom">
                <div class="container-fluid">
                
                    <h2 class="h5 no-margin-bottom">Affichage table Commande</h2>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Acceuil</a></li>
                    <li class="breadcrumb-item active">Commande</li>
                </ul>
            </div>
            <section>
            
                <div class="container">
                <button  class="btn btn-info mr-2" onclick="window.print()" style="position: relative; left: 750px "><i class="fa fa-print" aria-hidden="true"></i></i> Imprimer</button>
                    <div class="title"><strong>Liste des commande</strong></div>

                    </br>
                    <form action="" method = 'GET'>
                    <div class="input group">
                    
                   
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <button class="btn btn-info btn-xs" value="Chercher"> <i class="fa fa-refresh" aria-hidden="true"></i> Refresh</button>
                            </div>
                             <td> <select name="tri" class="form-control" >
                             <option value="" disabled selected>Trier par</option>
                            <option >ID</option>
                            
                            <option>Nom </option>

                            
                          </select></td> 
                          
                          
                        <td>
                            
                        </div>
                        </br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <button class="btn btn-danger btn-xs" value="Chercher"><i class="fa fa-search" ></i> Chercher</button>
                            </div>
                            <input type="text" id="search" name="search" class="form-control" placeholder="Chercher une commande">
                            
                        </div>
                        
                    </form>


                    </div>
                    </br>
                    
                    <div class="table-responsive">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom </th>
                                    <th>Email</th>
                                    <th>Cours acheté</th>
                                    <th>Adresse </th>
                                    <th>Numero de téléphone</th>
                                    <th>Méthode de paiment</th>
                                </tr>
                            </thead>


                            <tbody id="tableau">
                            <?php while ($row = $result->fetch()) { 
                                    ?>
                                    <tr>

                                       
                            <td>  <?php echo $row['id']; ?></td>
                            <td> <?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['products']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['pmode']; ?></td>
                        <td>  
                        <a href="afficher_commande.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-xs"><i class ="fa fa-trash-o"> </i> Supprimer</a>
</tr>

										<?php
										}
                                               
										?>

                            </tbody>
                        </table>
                    </div>

                   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

                    <script type="text/javascript">
                        $(document).ready(function() {
                            load_data();

                            function load_data(str) {
                                $.ajax({
                                    url: "Theme.php",
                                    method: "post",
                                    data: {
                                        str: str
                                    },
                                    success: function(data) {
                                        $('#tableau').html(data);
                                    }
                                });
                            }

                            $('#search').keyup(function() {
                                var searcherche = $(this).val();
                                if (searcherche != '') {
                                    load_data(searcherche);
                                } else {
                                    load_data();
                                }
                            });
                        });
                    </script>

                </div>
            </section>
            <footer class="footer">
                <div class="footer__block block no-margin-bottom">
                    <div class="container-fluid text-center">
                        <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                        <p class="no-margin-bottom">2021 &copy; Design by <a href="index.php">Edueasy</a>.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- JavaScript files-->
    <script src="Assets/vendor/jquery/jquery.min.js"></script>
    <script src="Assets/vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="Assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="Assets/vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="Assets/vendor/chart.js/Chart.min.js"></script>
    <script src="Assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="Assets/js/front.js"></script>
</body>

</html>


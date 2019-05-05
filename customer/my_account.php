<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ECE Amazon</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top">
       
       <div class="container">
           
           <div class="col-md-6 offer">
               
               <a href="#" class="btn btn-success btn-sm">
                   
                   <?php 
                   //si pas d'identification la personne est en invité
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Bienvenue: invité";
                       
                   }else{
                       //sinon elle est connecté avec son email
                       echo "Bienvenue: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
               
               </a>
            <!-- lien vers le panier et affichage prix total-->
               <a href="../cart.php"> <?php items(); ?> Produits dans votre panier | Prix total: <?php total_price(); ?> </a>
               
           </div>
           
           <div class="col-md-6">
             <!--le menu-->  
               <ul class="menu">
                   
                   <li>
                       <a href="../admin_area/index.php">Admin</a>
                   </li>
                   <li>
                       <a href="../customer_register.php">S'inscrire</a>
                   </li>
                   <li>
                       <a href="my_account.php">Mon compte</a>
                   </li>
                   <li>
                       <a href="../cart.php">Mon panier</a>
                   </li>
                   <li>
                       <a href="../checkout.php">
                       
                        <?php 
                          //lien vers les pages se connecter et se deconnecter
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Se connecter </a>";

                               }else{

                                echo " <a href='logout.php'> Se deconnecter </a> ";

                               }
                           
                         ?>
                       
                       </a>
                   </li>
                   
               </ul>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="navbar" class="navbar navbar-default">
       
       <div class="container">
           
           <div class="navbar-header">
               
               <a href="../index.php" class="navbar-brand home">
                   
                   <br>ECE Amazon
                   
               </a>
               <!-- bar de recherche -->
               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                   
                   <span class="sr-only">Toggle Navigation</span>
                   
                   <i class="fa fa-align-justify"></i>
                   
               </button>
               
               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                   
                   <span class="sr-only">Toggle Search</span>
                   
                   <i class="fa fa-search"></i>
                   
               </button>
               
           </div>
           
           <div class="navbar-collapse collapse" id="navigation">
               
               <div class="padding-nav">
                  <!-- lien avec l'accueil la boutique les ventes flash etc.. --> 
                   <ul class="nav navbar-nav left">
                       <!-- afficher les icones du menu -->
                       <li>
                           <a href="../index.php">Accueil</a>
                       </li>
                       <li>
                           <a href="../shop.php">Boutique</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">Mon compte</a>
                       </li>
                       <li>
                           <a href="../vente_flash.php">Vente Flash</a>
                       </li>
                       <li>
                           <a href="../cart.php">Mon panier</a>
                       </li>
                       <li>
                           
                            <a href='../vendre/my_account.php?editer_account'>Vendre</a>
                          
                       </li>
                       
                   </ul>
                   
               </div>
               <!-- Produit panier -->
               <a href="../cart.php" class="btn navbar-btn btn-primary right">
                   
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> Produits dans votre panier</span>
                   
               </a>
               
               <div class="navbar-collapse collapse right">
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button>
                   
               </div>
               
               <!--bar de recherche -->
               <div class="collapse clearfix" id="search">
                   
                   <form method="get" action="results.php" class="navbar-form">
                       
                       <div class="input-group">
                           
                           <input type="text" class="form-control" placeholder="Search" name="user_query" required>
                           
                           <span class="input-group-btn">
                           
                           <button type="submit" name="search" value="Search" class="btn btn-primary">
                               
                               <i class="fa fa-search"></i>
                               
                           </button>
                           
                           </span>
                    
                       </div>
                   </form>
                   
               </div>
               
           </div>
           
       </div>
       
   </div>
   
   <div id="content">
       <div class="container">
           <div class="col-md-12">
               
               <ul class="breadcrumb">
                   <li>
                       <a href="../index.php">Accueil</a>
                   </li>
                   <li>
                       Mon compte
                   </li>
               </ul>
               
           </div>
           
           <div class="col-md-3">
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div>
           
           <div class="col-md-9">
               
               <div class="box">
                   
                   <?php
                   
                   if (isset($_GET['my_orders'])){
                       include("my_orders.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['pay_offline'])){
                       include("pay_offline.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['edit_account'])){
                       include("edit_account.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['change_pass'])){
                       include("change_pass.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['delete_account'])){
                       include("delete_account.php");
                   }
                   
                   ?>
                   
               </div>
               
           </div>
           
       </div>
   </div>
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
<?php } ?>
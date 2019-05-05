<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");
    
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store</title>
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
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
               
               </a>
               <a href="checkout.php"> <?php items(); ?> Items In Your Cart | Total Price: <?php total_price(); ?> </a>
               
           </div>
           
           <div class="col-md-6">
               
               <ul class="menu">
                   
                   <li>
                       <a href="../customer_register.php">Register</a>
                   </li>
                   <li>
                       <a href="my_account.php">My Account</a>
                   </li>
                   <li>
                       <a href="../cart.php">Go To Cart</a>
                   </li>
                   <li>
                       <a href="../checkout.php">
                       
                        <?php 
                           
                           if(!isset($_SESSION['customer_email'])){
                       
                                echo "<a href='checkout.php'> Login </a>";

                               }else{

                                echo " <a href='logout.php'> Log Out </a> ";

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
                   
                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
                   
               </a>
               
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
                   
                   <ul class="nav navbar-nav left">
                     <!-- lien entre les differentes pages accueuil boutique mon compte etc-->  
                       <li>
                           <a href="../index.php">Accueuil</a>
                       </li>
                       <li>
                           <a href="../shop.php">Boutique</a>
                       </li>
                       <li class="active">
                           <a href="my_account.php">Mon compte</a>
                       </li>
                       <li>
                           <a href="../cart.php">Mon panier</a>
                       </li>
                       <li>
                           <a href="../contact.php">Contactez nous</a>
                       </li>
                       
                   </ul>
                   
               </div>
               
               <a href="../cart.php" class="btn navbar-btn btn-primary right">
                   <i class="fa fa-shopping-cart"></i>
                   
                   <span><?php items(); ?> Items dans le panier</span>
                   
               </a>
               
               <div class="navbar-collapse collapse right">
                   
                   <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">
                       
                       <span class="sr-only">Toggle Search</span>
                       
                       <i class="fa fa-search"></i>
                       
                   </button>
                   
               </div>
               
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
                       <a href="index.php">Accueuil</a>
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
            <!-- formulaire de paiement saisi des informations -->   
           </div>
           
           <div class="col-md-9">
               
               <div class="box">
                   
                   <h1 align="center"> Veuillez confirmer le paiement</h1>
                   
                   <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                       
                       
                        <div class="form-group">
                           
                         <label>  Adresse: </label>
                          
                          <input type="text" class="form-control" name="adresse" required>
                           
                       </div>
                          
                        <div class="form-group">
                           
                         <label> Ville: </label>
                          
                          <input type="text" class="form-control" name="ville" required>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label> Code Postal: </label>
                          
                          <input type="text" class="form-control" name="code_postal" required>
                           
                       </div>
                       
                       <div class="form-group">
                         <label> Pays: </label>
                          
                          <input type="text" class="form-control" name="pays" required>
                           
                       </div>
                          
                        <div class="form-group">
                         <label> Telephone: </label>
                          
                          <input type="text" class="form-control" name="telephone" required>
                           
                       </div>
                          
                        <div class="form-group">
                           
                         <label> Type de carte de paiement: </label>
                          
                          <select name="type_paiement" class="form-control">
                              
                              <option> Selectionner type de carte de paiement </option>
                              <option> Visa </option>
                              <option> MasterCard </option>
                              <option> American Express </option>
                              <option> PayPal </option>
                              
                          </select>
                           
                       </div>
                       <!--saisi les info de paiement -->
                       <div class="form-group">
                           
                         <label> Numéro de la carte: </label>
                          
                          <input type="text" class="form-control" name="numero_carte" required>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label> Nom affiché sur la carte: </label>
                          
                          <input type="text" class="form-control" name="nom_carte" required>
                           
                       </div>
                       
                       <div class="form-group">
                         <label> Date expiration: </label>
                          
                          <input type="text" class="form-control" name="date" required>
                           
                       </div>
                       <div class="form-group">
                         <label> Code de Sécurité: </label>
                          
                          <input type="text" class="form-control" name="code_securité" required>
                           
                       </div>
                       
                       <div class="form-group">
                           
                         <label> Prix: </label>
                          
                          <input type="text" class="form-control" name="prix" required>
                           
                       </div>
                       
                       <div class="text-center">
                           <button class="btn btn-primary btn-lg" name="confirm_payment">
                               
                               <i class="fa fa-user-md"></i> Confirmer Paiement
                               
                           </button>
                           
                       </div>
                       
                   </form>
                   <?php 
                   //lien avec la base de donnée pour le paiement
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $adresse = $_POST['adresse'];
                        
                        $ville = $_POST['ville'];
                        
                        $code_postal = $_POST['code_postal'];
                        
                        $pays = $_POST['pays'];
                        
                        $telephone = $_POST['telephone'];
                        
                        $type_carte = $_POST['type_paiement'];
                        
                        $num_carte = $_POST['numero_carte'];
                        
                        $nom_carte = $_POST['nom_carte'];
                        
                        $date = $_POST['date'];
                        
                        $code_carte = $_POST['code_securité'];
                        
                        $prix = $_POST['prix'];
                        
                        $complete = "Complete";
                        
                        //inserer dans la base de données les données saisies
                        $insert_payment = "insert into payments (adresse,ville,code_postal,pays,telephone,type_paiement,numero_carte,nom_carte,date,code_securité,prix) values ('$adresse','$ville','$code_postal','$pays','$telephone','$type_carte','$num_carte','$nom_carte','$date','$code_carte','$prix')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Merci d'avoir effectué un achat')</script>";
                            
                           // echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            
                        }
                        
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
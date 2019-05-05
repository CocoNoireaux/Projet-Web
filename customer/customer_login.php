<div class="box">
    
  <div class="box-header">
      
      <center>
          
          <h1> Connexion </h1>
          
          <p class="lead"> Avez vous déjà un compte ? </p>
          
          <p class="text-muted"> Identifiez-vous </p>
          
      </center>
      
  </div>
    
   <!-- formulaire pour s'identifier en tant qu'acheteur -->
  <form method="post" action="checkout.php">
      
      <div class="form-group">
          
          <!-- saisir l'emai -->
          <label> Email </label>
          
          <input name="c_email" type="text" class="form-control" required>
          
      </div>
      
       <div class="form-group">
          <!-- saisir le mot de passe-->
          <label> Mot de Passe </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div>
      
      <div class="text-center">
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> se connecter
              
          </button>
          
      </div>    
      
  </form>
   
  <center>
      <!-- lien pour se creer un compte -->
     <a href="customer_register.php">
         
         <h3> Si vous n'avez pas déjà un compte, inscrivez vous ici !</h3>
         
     </a> 
      
  </center>
    
</div>


<?php 
//recuperer les données du formulaire
if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($con,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";//acces table panier
    
    $run_cart = mysqli_query($con,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    //afficher des alertes en fonction des données saisies
    
    if($check_customer==0){
        
        echo "<script>alert('Votre email ou mot de passe est faux')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 AND $check_cart==0){
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('Vous êtes connecté')</script>"; 
        
       echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }else{
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "<script>alert('Vous êtes connecté')</script>"; 
        
       echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    
}

?>
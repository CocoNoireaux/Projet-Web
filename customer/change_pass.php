<!-- fomulaire pour changer le mot de passe -->

<h1 align="center"> Changer mot de passe </h1>


<form action="" method="post">
    
    <div class="form-group">
        
        <label> Votre ancien mot de passe: </label>
        
        <input type="text" name="old_pass" class="form-control" required>
        
    </div>
    
    <div class="form-group">
        
        <label> Votre nouveau mot de passe: </label>
        
        <input type="text" name="new_pass" class="form-control" required>
        
    </div>
    
    <div class="form-group">
        
        <label> Confirmez Votre Nouveau Mot de Passe: </label>
        
        <input type="text" name="new_pass_again" class="form-control" required>
        
    </div>
    
    <div class="text-center">
        <!-- Soumettre le formulaire -->
        <button type="submit" name="submit" class="btn btn-primary">
            
            <i class="fa fa-user-md"></i> Valider
            
        </button>
        
    </div>
    
</form>
<!-- fin du forumlaire -->

<?php 

//recuperation des données du formulaire
if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($con,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    //compare si c'est le bon mot de passe
    if($check_c_old_pass==0){
        
        echo "<script>alert('Désolé, Votre mot de passe actuel n'est pas valide. Essayer de nouveau')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Désolé, votre nouveau mot de passe ne correspond pas')</script>";
        
        exit();
        
    }
    
    //actualisation du mot de passe
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($con,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Votre mot de passe a été mis à jour')</script>";
        
        echo "<script>window.open('my_account.php?my_orders','_self')</script>";
        
    }
    
}

?>
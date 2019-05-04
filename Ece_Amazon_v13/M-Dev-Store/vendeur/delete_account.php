<center><!-- center Begin -->
    
    <h1> Voulez-vous vraiment supprimer votre compte ? </h1>
    
    <form action="" method="post"><!-- form Begin -->
        
       <input type="submit" name="Yes" value="Oui, je veux le supprimer" class="btn btn-danger"> 
        
       <input type="submit" name="No" value="Non, je ne veux pas le supprimer" class="btn btn-primary"> 
        
    </form><!-- form Finish -->
    
</center><!-- center Finish -->


<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from customers where customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($con,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy(); //détruit toutes les données associées à la session courante
        
        echo "<script>alert('Votre compte a été supprimé avec succès. A bientôt')</script>";
        
        echo "<script>window.open('../index.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('my_account.php?my_orders','_self')</script>"; //<!-- si non réouvrir la page mon compte -->
    
}

?>
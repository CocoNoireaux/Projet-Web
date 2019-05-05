<?php 
    
    if(!isset($_SESSION['customer_email'])){
        
        echo "<script>window.open('../checkout.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_product'])){
        
        $delete_id = $_GET['delete_product'];
        
        $delete_pro = "delete from products where product_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your product has been Deleted')</script>";
            
            echo "<script>window.open('my_account.php?edit_account','_self')</script>";
            
        }
        
    }

?>

<?php } ?>
<?php 
//include config file
include ("../config/dbh.php");
if(isset($_GET['id']) && isset($_GET['image_name'])){
    //process to delete
    //get ID and Image name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];
    //Remove the image if available
    if($image_name !=""){
        //remove the physical image
        $remove_path = "../images/food/".$image_name;
        $remove = unlink($remove_path);
    
        if(!$remove){
     //display error message
     $_SESSION['remove-fail'] = "<div class='error'>Failed to remove image!</div>";
     //redirect to manage food page
     header("location:".SITEURL."admin/manage-food.php");
     //stop the process
     die();
        }
    }

    
    //Delete from the database
    //create an sql query to delete data from the database
    $sql = "DELETE  FROM  tbl_food WHERE id = $id";
    //execute the query
    $res = mysqli_query($conn,$sql);
    //check if the query has been executed or not
    if($res){
      //display the success message
      $_SESSION['delete'] = "<div class='success'>Food has been successfully deleted!</div>";
      //redirect to manage food page
      header("location:".SITEURL."admin/manage-food.php");
    } else {
         //display the error message
      $_SESSION['delete'] = "<div class='error'>Failed to delete data!</div>";
      //redirect to manage food page
      header("location:".SITEURL."admin/manage-food.php");
    }
    //redirect to manage  food page with success
} else {
    //display error message
    $_SESSION['unauthorised'] = "<div class='error'>Unauthorized access!</div>";
    //redirect to manage food page
    
     header("location:".SITEURL."admin/manage-food.php");
}

?>
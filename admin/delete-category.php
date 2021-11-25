<?php
//include config file
include ("../config/dbh.php");
//check whether the id and the image name is passed or not
if(isset($_GET['id']) && isset($_GET['image_name'])){
    //get the value and delete
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove the physical image file if available
    if($image_name !=""){
        //the image is available so remove it
        $path = '../images/category/'.trim($image_name);
        $remove = unlink($path);
        //if failed to remove the image add an error message and kill the procees
        if(!$remove){
            //display the error message
            $_SESSION['remove'] = "<div class='error'>Failed to remove the photo</div>";
            //direct to manage category page
            header("location:".SITEURL."admin/manage-category.php");
        }
      
        }
    
    //delete the file from the database
    //create an sql query to delete the data from the database
    $sql ="DELETE FROM tbl_category where id=$id";
    //execute the query
    $res = mysqli_query($conn,$sql);
    //check whether the query has been executed or not
    if($res){
        //redirect to the manage category page with message
        $_SESSION['delete'] = "<div class='success'>The photo is deleted!</div>";
        //redirect to the manage category page
        header("location:".SITEURL."admin/manage-category.php");
    } else {
      
    }
   
} else {
    //redirect to the manage category page
    header("Location:".SITEURL."admin/manage-category.php" );
}
?>


   

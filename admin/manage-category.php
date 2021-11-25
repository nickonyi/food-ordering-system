<?php
include ("partials/menu.php");
ini_set('display_errors',1);
?>

<div class="main-content">
    <div class="wrapper">
        <h1>manage category</h1>
        <br><br>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
        <br><br>
    <a href="add-category.php" class="btn-primary">Add category</a>
    <br><br><br>
   <table class="tbl-full">
       <tr>
           <th>S.No</th>
           <th>Title</th>
           <th>Image</th>
           <th>Featured</th>
           <th>Active</th>
           <th>Action</th>
       </tr>
       <?php
       //query to get all the categories from the database
       $sql = "SELECT * FROM tbl_category";
       //execute the query
       $res = mysqli_query($conn,$sql);
       //count the number of rows
       $count = mysqli_num_rows($res);
       //check whether we have data in the database or not
       if($count > 0){
           //we have data in the database
           $sno = 1;
           while($row = mysqli_fetch_assoc($res)){
               //get the data from the database
               $id = $row["id"];
               $title = $row["title"];
               $image_name = $row['image_name'];
               $featured = $row['featured'];
               $active = $row['active'];
               ?>
               <tr>
                   <td><?php echo $sno++;?></td>
                   <td><?php echo $title;?></td>

                   <td>
                       <?php
                       if($image_name !=""){
                           //display the image
                           ?>
                           <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px" >
                           <?php

                       } else {
                           echo "<div class='error'>Image not uploaded</div>";
                       }
                       ?>
                      
                    </td>

                   <td><?php echo $featured;?></td>
                   <td><?php echo $active;?></td>
                   <td>
                       <a href="<?php echo SITEURL;?>admin/update-admin.php?id= <?php echo $id;?>&image_name= <?php echo $image_name;?>"  class="btn-secondary">Update admin</a>
                       <a href="<?php echo SITEURL;?>admin/delete-category.php?id= <?php echo $id;?>&image_name= <?php echo $image_name;?>" class="btn-danger">Delete admin</a>
                   </td>
               </tr>
               <?php
           }
       } else {
           //we do not have data in the  database
           //we will display the message inside the table
           ?>
            <tr>
                <td colspan="2"><div class='error'>No category added</div></td>
            </tr>
           <?php
       }
       ?>
     
      
   </table>
    </div>
</div>
<?php
include ("partials/footer.php");
?>
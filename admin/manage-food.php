<?php
include ("partials/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <?php 
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['remove-fail'])){
            echo $_SESSION['remove-fail'];
            unset($_SESSION['remove-fail']);
        }
        if(isset($_SESSION['unauthorised'])){
            echo $_SESSION['unauthorised'];
            unset($_SESSION['unauthorised']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['food-not-found'])){
            echo $_SESSION['food-not-found'];
            unset($_SESSION['food-not-found']);
        }
        ?>
        <br  />  <br  />
    <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add food</a>
    <br><br><br>
   <table class="tbl-full">
       <tr>
           <th>S.No</th>
           <th>Title</th>
           <th>Price</th>
           <th>Image</th>
           <th>Featured</th>
           <th>Active</th>
           <th>Actions</th>
       </tr>
       <?php
       //create an sql query to acess all the data from the database
       $sql = "SELECT *FROM tbl_food";
       //execute the query
       $res = mysqli_query($conn,$sql);
       //count the number of rows to see if the data is available
       $count = mysqli_num_rows($res);
       //if the count is greater than 0 we have data in the database
       if($count > 0){
         //we have  data in the database
         $sn = 1;
         while($row = mysqli_fetch_assoc($res)){
            $id = $row['id'];
            $title = $row['title'];
             $price = $row['price'];
             $image_name = $row['image_name'];
             $featured = $row['featured'];
             $active =  $row['active'];
             ?>
              <tr>
           <td><?php echo $sn++;?></td>
           <td><?php echo $title;?></td>
           <td>$<?php echo $price;?></td>
           <td>
               <?php
               if($image_name !=""){
                   ?>
                   <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="" width="100px">
                   <?php
               } else {
                   echo "<div class='error'>Image is not uploaded!</div>";
               }
               ?>
        
           </td>
           <td><?php echo $featured;?></td>
           <td><?php echo $active;?></td>
           <td>
                <a href="<?php echo SITEURL?>admin/update-food.php?id=<?php echo $id;?>" class="btn-secondary">Update Food</a>
                <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Food</a>
           </td>
       </tr>
             <?php
         }
       }else {
           //we do no have data in the database
           echo "<tr> <td colspan='7' class='error'> Food not added yet!</td> <tr>";
       }
       
       ?>

      
       
           
   </table>
    </div>
</div>
<?php
include ("partials/footer.php");
?>
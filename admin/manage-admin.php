<?php
include "partials/menu.php";
?>
    <!--Main  content  Section starts--->
    <div class="main-content">
    <div class="wrapper">
   <h1>manage admin</h1>
    <br  />  <br  />
    <?php
    if(isset($_SESSION['add'])){
        echo $_SESSION['add']; //displayin session message
        unset($_SESSION['add']);//removing session message
    }
    if(isset($_SESSION['delete'])){
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }
    if(isset($_SESSION['update'])){
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }
    if(isset($_SESSION['user-not-found'])){
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
    }
   
    
        ?>
<br><br><br>
    <a href="add-admin.php" class="btn-primary">Add admin</a>
    <br><br><br>
   <table class="tbl-full">
       <tr>
           <th>S.No</th>
           <th>full_name</th>
           <th>username</th>
           <th>Actions</th>
       </tr>

       <?php
       //query to get all admin
       $sql = "SELECT * from tbl_admin";
       //execute the query
       $res = mysqli_query($conn,$sql);
       //check the query whether it is executed or not
       if($res){
      //count the rows to check if we have data in the database or not
      $count = mysqli_num_rows($res);//function to get all the rows in the database
      //check the number of rows
      if($count > 0){
          //we have data in the database
          $sno = 1;
          while($rows = mysqli_fetch_assoc($res)){
              //using while loop to fetch all the data from the database
              //while loop will run as long as we have data in the database

              //get the individual data
              $id = $rows['id'];
              $full_name = $rows['full_name'];
              $username = $rows['username'];

              //display the values in our table
              ?>
               <tr>
                   <td><?php echo $sno++;?></td>
                   <td><?php echo $full_name;?></td>
                   <td><?php echo $username;?></td>
                   <td>
                       <a href="<?php echo SITEURL;?>admin/update-password.php?id= <?php echo $id;?>" class="btn-primary">Change password</a>
                       <a href="<?php echo SITEURL;?>admin/update-admin.php?id= <?php echo $id;?>"  class="btn-secondary">Update admin</a>
                       <a href="<?php echo SITEURL;?>admin/delete-admin.php?id= <?php echo $id;?>" class="btn-danger">Delete admin</a>
                   </td>
               </tr>

              <?php
          }
      } else {
          //we do not have data in the database
      }
       }
       ?>
      
   </table>
    </div>
    </div>
    <!---Main content section ends--->
       <!---Main content section ends--->
  <?php
  include "partials/footer.php";
  
  ?>


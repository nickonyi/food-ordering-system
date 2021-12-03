<?php 

include("partials/menu.php");
ob_start();
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>
        <?php 
        if(isset($_GET['id'])){
            //get all the details
            $id = $_GET['id'];
            //create sql to get data from the database
            $sql2 = "SELECT * FROM tbl_food where id = $id";
            //execute the query
            $res2 = mysqli_query($conn,$sql2);
            //count all the rows to see if id is valid
            $count = mysqli_num_rows($res2);

            if($count == 1){
             //get the value based on the query created
            $row2 = mysqli_fetch_assoc($res2);
            //get the individual value of selected foods
            $current_id = $row2['id'];
            $current_title = $row2['title'];
            $description = $row2['description'];
            $price = $row2['price'];
            $current_image = $row2['image_name'];
            $current_category = $row2['category_id'];
            $featured = $row2['featured'];
            $active = $row2['active'];
            }
            else {
                //display the error message
                $_SESSION['food-not-found'] = "<div class='error'>Food was not found.</div>";
                //redirect to manage category page
                header("location:".SITEURL."admin/manage-food.php");
            }
        } else {
            //redirect to the manage category page
            header("location:".SITEURL."admin/manage-food.php");
        }

?>

        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
            <tr>
                  <td>Title:</td>
                  <td>
                      <input type="text"  name="title" placeholder="Food's title" value="<?php echo $current_title;?>">
                  </td>
              </tr>
              <tr>
                  <td>Description:</td>
                  <td>
                     <textarea name="description"  cols="30" rows="5" placeholder="Description""><?php echo $description;?></textarea>
                  </td>
              </tr>
              <tr>
                  <td>Price:</td>
                  <td>
                      <input type="number"  name="price" placeholder="Price" value="<?php echo $price;?>">
                  </td>
              </tr>
              <tr>
                <td>Image:</td>
                  <td>
                    <?php
                    if($current_image !=""){
                       //image is available
                       ?>
                       <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>" width="150px">
                       <?php
                    } else {
                        echo "<div class='error'>Image is not available</div>";
                    }
                    
                    ?>
                  </td>
              </tr>
              <tr>
                <td>Select new Image:</td>
                  <td>
                      <input type="file"  name="image" >
                  </td>
              </tr>
              <tr>
                  <td>Category:</td>
                  <td>
                      <select name="category">
                          <?php
                          //sql query to collect data from the database
                          $sql = "SELECT * FROM tbl_category where active = 'Yes'";
                          //execute the query
                          $res = mysqli_query($conn,$sql);
                          //count the number of rows to see if the data is available
                          $count = mysqli_num_rows($res);
                           
                          if($count > 0){
                              //there is data in the database
                              while ($row = mysqli_fetch_assoc($res) ){
                                  $category_id = $row['id'];
                                  $category_title = $row['title'];
                                  ?>
                                   <option <?php if($current_category == $category_id){echo "selected";}?>  value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                  <?php
                              }
                          } else {
                              //there is no data in the database
                              ?>
                               <option value="0">No categories available!</option>
                              <?php
                          }
                          
                          ?>
                          
                      </select>
                  </td>
              </tr>
              <tr>
                  <td>Featured:</td>
                  <td>
                        <input <?php if($featured == "Yes"){echo "checked";}?>    type="radio" name= "featured" value="Yes">Yes
                        <input <?php if($featured == "No"){echo "checked";}?>    type="radio" name= "featured" value="No">No
                  </td>
              </tr>
              <tr>
                  <td>Active:</td>
                  <td>
                        <input <?php if($active == "Yes"){echo "checked";}?> type="radio" name="active" value="Yes">Yes
                        <input <?php if($active == "No"){echo "checked";}?> type="radio" name="active" value="No">No
                  </td>
              </tr>
              <tr>
                  <td colspan="2">
                      <input type="hidden" name="id" value="<?php echo $current_id;?>">
                      <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                   <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                  </td>
              </tr>

            </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
           //get all the details  from the form
           $id = $_POST['id'];
           $title = $_POST['title'];
           $description = $_POST['description'];
           $price = $_POST['price'];
           $current_image = $_POST['current_image'];
           $category = $_POST['category'];
           $featured = $_POST['featured'];
           $active = $_POST['active'];
           //upload the image if selected
           //check whether the upload button is clicked or not
           if(isset($_FILES['image']['name'])){
                  //upload button is clicked
                  $image_name = $_FILES['image']['name'];
                  //check weather the image exists or not
                  if($image_name !=""){
                      //image is available
                      //rename the image
                      //Uploading the new image
                      $tmp = explode('.',$image_name);
                      $ext = end($tmp);
                      $image_name = "food-name-".rand(0000,9999).".".$ext;
                      //get the source path
                      $source_path = $_FILES['image']['tmp_name'];
                      //get the destination path
                      $dest_path = "../images/food/".$image_name;
                      //finally upload the file
                      $upload = move_uploaded_file($source_path,$dest_path);
                    

                      if(!$upload) {
                          //display error message
                          $_SESSION['upload'] = "<div class='error'>Failed to upload the image</div>";
                          //redirect to manage food page
                          header("location:".SITEURL."admin/manage-food.php");
                          //stop the process
                          die();
                      }


                    //remove the image if new image is uploaded and current image exists
                      //remove image if available
                      if($current_image !=""){
                          //current image is available
                        $remove_path = "../images/food/".$current_image;
                        $remove = unlink($remove_path);
                        //check whether the image is removed or not
                        if(!$remove){
                            //failed to remove the current image
                            $_SESSION['remove-fail'] = "<div class='error'>Failed to remove the photo!</div>";
                            //redirect to manage food page
                            header("location:".SITEURL."admin/mange-food.php" );
                            //stop the process
                            die();
                        }
                    }
                  }
           } else {
               $image_name = $current_image;
           }
          
           //update the food in the database
           $sql3 = "UPDATE tbl_food SET
           title = '$title',
           description = '$description',
           price = $price,
           image_name = '$image_name',
           category_id = '$category_id',
           featured = '$featured',
           active = '$active'
           WHERE id = $id;
            ";
            //execute the query
            $res3 = mysqli_query($conn,$sql3);
            if($res3){
                //display success message
                $_SESSION['update'] = "<div class='success'>Food updated successfully!</div>";
                //redirect to manage food page
                header("location:".SITEURL."admin/manage-food.php");
                //stop the process 
                die();
            } else {
              //display error message
              $_SESSION['update'] = "<div class='error'>Failed to update!</div>";
              //redirect to manage food page
              header("location:".SITEURL."admin/manage-food.php");
              //stop the process 
              die();
            }
           //redirect with session message
        }
        ?>
    </div>
</div>
<?php 
include("partials/footer.php");
ob_end_flush();
?>

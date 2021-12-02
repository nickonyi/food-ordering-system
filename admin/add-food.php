<?php  include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <?php
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        
        ?>
        <br><br>
        <form action="" method="post" enctype="multipart/form-data">
          <table class="tbl-30">
              <tr>
                  <td>Title:</td>
                  <td>
                      <input type="text"  name="title" placeholder="Food's title">
                  </td>
              </tr>
              <tr>
                  <td>Description:</td>
                  <td>
                     <textarea name="description"  cols="30" rows="5" placeholder="Description"></textarea>
                  </td>
              </tr>
              <tr>
                  <td>Price:</td>
                  <td>
                      <input type="number"  name="price" placeholder="Price">
                  </td>
              </tr>
              <td>Select Image:</atd>
                  <td>
                      <input type="file"  name="image" >
                  </td>
              </tr>
              <tr>
                  <td>Category:</td> 
                  <td>
                      <select name="category">
                      <?php
                  //create php code to display categories from the database
                  //create an sql query to get all active  categories from the database
                  $sql = "SELECT * FROM  tbl_category WHERE active='Yes'";

                  //execute the query
                  $result = mysqli_query($conn,$sql);
                  //count the rows to see if the categories are available or not
                  $count = mysqli_num_rows($result);
                  //if the count is greater than  1 then we have categories else we do not have categories
                  if($count > 1){
                    //we have categories
                    while($row = mysqli_fetch_assoc($result)){
                       //get the details of categories
                        $id = $row['id'];
                        $title = $row['title'];
                        ?>
                        <option value="<?php echo $id;?>"><?php echo $title;?></option>
                        <?php
                    }
                  }else {
                      //we do not have categories
                      ?>
                       <option value="0">No categories</option>
                      <?php
                  }

                  //Display on dropdown
                  ?>
                          
                      </select>
                  </td>
              </tr>
              <tr>
                  <td>Featured:</td>
                  <td>
                        <input type="radio" name= "featured" value="Yes">Yes
                        <input type="radio" name= "featured" value="No">No
                  </td>
              </tr>
              <tr>
                  <td>Active:</td>
                  <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                  </td>
              </tr>
              <tr>
                  <td colspan="2">
                   <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                  </td>
              </tr>
              
          </table>
        </form>
        <?php  
        //check whether the button is clicked or not
        if(isset($_POST['submit'])){
            //add the food in the database
            //get the data from form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            //check  whether the value for featured and active have been clicked or not
            if(isset($_POST['featured'])){
                $featured = $_POST['featured'];
            } else {
                $featured = "No";
            }
           
            if(isset($_POST['active'])){
                $active = $_POST['active'];
            } else {
                $active = "No";
            }
           
            
            //insert the image if selected
            //check whether the select image has been clicked or not and upload the image only if the image is selected
            if(isset($_FILES['image']['name'])){
                //get the details of the selected image
                $image_name = $_FILES['image']['name'];
                //check whether the image is selected or not and upload if the image is selected
                if($image_name !=""){
                    //image is selected
                    //rename the image
                    //get the extension of the selected image eg.(jpg,gif,png,e.t.c)
                    $tmp = explode('.', $image_name);
                    $ext = end($tmp);
                    $image_name ="food-name-".rand(0000,9999).".".$ext;
                    //upload the image
                    //get the source path where the image currently resides
                    $source_path = $_FILES['image']['tmp_name'];
                    //the destination path of the image 
                    $destination_path = "../images/food/".$image_name;
                    //upload the image
                    $upload = move_uploaded_file($source_path, $destination_path);
                    //check whether the image is uploaded or not
                    if(!$upload){
                        //display the error message
                        $_SESSION['upload'] = "<div class='error'>Failed to upload the image</div>";
                        //redirect to the add food page
                        header("location:".SITEURL."admin/add-food.php");
                        //stop the process
                        die();
                    } 
                }
            } else {
                $image_name = "";
            }
            //insert into database
            //create an sql query to insert data into database
            $sql2 = "INSERT INTO tbl_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'
            ";
            //execute the query
            $res2 = mysqli_query($conn,$sql2);
            //check whether the query is executed or not
            if($res2){
                //display success message
                $_SESSION['add'] = "<div class='success'>The data was successful added!</div>";
                //redirect to the manage food page
                header("location:".SITEURL."admin/manage-food.php");
            } else {
                //display error message
                $_SESSION['add'] = "<div class='error'>Failed to add data!</div>";
                //redirect to the manage food page
                header("location:".SITEURL."admin/manage-food.php");
            }
            //redirect to manage food page 
        }
        
        ?>
    </div>
</div>
<?php  include("partials/footer.php");?>
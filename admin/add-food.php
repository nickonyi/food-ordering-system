<?php  include("partials/menu.php");?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
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
            $featured = $_POST['featured'];
            $active = $_POST['active'];
            //insert the image if selected
            //insert into database
            //redirect to manage food page 
        }
        
        ?>
    </div>
</div>
<?php  include("partials/footer.php");?>
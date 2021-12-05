<?php include("partials-front/menu.php");?>
<?php 
    if(isset($_SESSION['authorisation'])){
        echo $_SESSION['authorisation'];
        unset($_SESSION['authorisation']);
    } 

    if(isset($_SESSION['ordered'])){
        echo $_SESSION['ordered'];
        unset($_SESSION['ordered']);
    }
    ?>
<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <?php
            //create an sql query to display categories from the database
            $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
            //execute the query
            $res = mysqli_query($conn,$sql);
            //coun the number of rows to see if the category is available
            $count = mysqli_num_rows($res);

            if($count > 0){
                //the categories are available
                while ($row = mysqli_fetch_assoc($res)){
                    //get all the values like id ,title,image name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
               
               
               <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                        <div class="box-3 float-container">
                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve" width="400px" height="400px">

                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                        </div>
                </a>

                    <?php
                }
            } else {
                //categories not available
            }
            
            ?>

           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
               <?php
               //getting foods from the database that are active and featured
               $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
               //execute the query
               $res2 = mysqli_query($conn,$sql2);
               //count the number of rows to see if food are available
               $count2 = mysqli_num_rows($res2);

               if($count2 > 0){
                  //foods are available
                  while($row2 = mysqli_fetch_assoc($res2)){
                      //get the individual data such as id,title and image name
                      $id = $row2['id'];
                      $title = $row2['title'];
                      $description = $row2['description'];
                      $price = $row2['price'];
                      $image_name = $row2['image_name'];
                      ?>
                        <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" height="125px">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title;?></h4>
                    <p class="food-price">Ksh. <?php echo $price;?></p>
                    <p class="food-detail">
                       <?php echo $description;?>
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                      <?php
                  }
               } else {
                   //foods are not available
                   echo "<div class='error'>Foods are not available!</div>";
               }
               
               ?>
            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php  include("partials-front/footer.php");?>
<?php  include("partials-front/menu.php");?>

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



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
                  <?php
                  //display foods that are active
                  //create sql query to display all the foods
                  $sql = "SELECT * FROM tbl_food WHERE active='Yes'";
                  //execute the query
                  $res = mysqli_query($conn,$sql);
                  //count the number of rows to see if the data is available in the database
                  $count = mysqli_num_rows($res);
                  //check whether the foods are available or not
                  if($count > 0){
                      //the foods are available in the database
                      while($row = mysqli_fetch_assoc($res)){
                          //get  the individual details from the data
                          $id = $row['id'];
                          $title = $row['title'];
                          $description = $row['description'];
                          $price = $row['price'];
                          $image_name = $row['image_name'];
                          ?>
                         <div class="food-menu-box">
                                 <div class="food-menu-img">
                                      <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                 </div>

                             <div class="food-menu-desc">
                                 <h4><?php echo $title;?></h4>
                                 <p class="food-price">ksh. <?php echo $price;?></p>
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
                      //foods are not available in the database
                      echo "<div class='error'>Foods not available!</div>";
                  }
                  
                  ?>
         


        <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php  include("partials-front/footer.php");?>
<?php  include("partials-front/menu.php");?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            //get the search keyword
            $search = $_POST['search'];
            ?>

            <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search;?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
              <?php
              //get the search keyword
              $search = $_POST['search'];
              //sql query to get search keyword and foods
              $sql="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
              //execute the query
              $res = mysqli_query($conn,$sql);
              //count the number of rows
              $count = mysqli_num_rows($res);
              //check whether the food is available or not
              if($count > 0){
                    //food is 
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
                //food is not available
                echo "<div class='error'>Food is not available!</div>";
              }
              ?>
          
            <div class="clearfix"></div>



        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php  include("partials-front/footer.php");?>
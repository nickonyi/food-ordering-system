<?php  include("partials-front/menu.php");?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
             <?php
             //create a query to display all the categories
             $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
             //execute the query
             $res = mysqli_query($conn,$sql);
             //count the rows to see if the categories are available
             $count = mysqli_num_rows($res);

             if($count > 0){
                 //category is available
                 while($row = mysqli_fetch_assoc($res)){
                     //get the data such as id,title,image name
                     $id = $row['id'];
                     $title = $row['title'];
                     $image_name = $row['image_name'];
                     ?>
                     <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
                                <div class="box-3 float-container">
                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="Pizza" class="img-responsive img-curve" width="400px" height="350px">

                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                        </div>
                    </a>
                     <?php
                 }
             } else {
                 //category is no  available
                 echo "<div class='error'>Category is not available</div>";
             }
             
             
             ?>
           

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php  include("partials-front/footer.php");?>
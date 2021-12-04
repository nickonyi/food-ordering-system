<?php  include("partials-front/menu.php");?>
<?php 
//check whether the food id is set or not
if(isset($_GET['food_id'])){
   //get the food id and details of the selected foods
   $food_id = $_GET['food_id'];
   //get the details of the selected food
   $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
   //execute the query
   $res = mysqli_query($conn,$sql);
   //count the number of rows
   $count = mysqli_num_rows($res);
   //check if the data is available or not
   if($count == 1){
       //we have data
      //get the data from the database
      $row = mysqli_fetch_assoc($res);

      $title = $row['title'];
      $price = $row['price'];
      $image_name = $row['image_name'];
   } else {
       //data is not available
       //redirect to home page

       header("location:".SITEURL);
   }
} else {
   //redirect to home page
   header("Location:".SITEURL);
}
?>
<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">

            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                        //check whether the image is available or not
                        
                        ?>
                        <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <p class="food-price">ksh. <?php echo $price;?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                    </div>

                </fieldset>

                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g John doe" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 072134xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. johndoe@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php  include("partials-front/footer.php");?>
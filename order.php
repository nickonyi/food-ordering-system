<?php  
include("partials-front/menu.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
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

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php
                        //check whether the image is available or not
                        if($image_name == ""){
                            //image is not available
                            echo "<div class='error'>Image is not available!</div>";
                        } else {
                            //image is available
                            ?>
                             <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                        }
                        
                        ?>
                       
                    </div>

                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="food" value="<?php echo $title;?>">
                        <p class="food-price">ksh. <?php echo $price;?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">

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
            <?php 
            //check whether the submit button is clicked or not
            if(isset($_POST['submit'])){
            //get all the details from the form
               $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price*$qty;
                $order_date = date('Y-m-d  h-i-s');
                $status = "ordered";
                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                //save the data in the database
                //create a sql query to save the data in the database
                 $sql2 = "INSERT INTO tbl_order SET
                 food = '$food',
                 price = $price,
                 qty = $qty,
                 total = $total,
                 status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'
                   ";
                 
                 
                //execute the query
                $res2 = mysqli_query($conn,$sql2);
                if($res2){
                    //query executed and ordered saved
                    $_SESSION['ordered'] = "<div class='text-center success'>Food ordered successfully!</div>";
                    //redirect to homepage
                    header("location:".SITEURL);
                } else {
                     //query executed and ordered saved
                     $_SESSION['ordered'] = "<div class='error'>Fail to order food!</div>";
                     //redirect to homepage
                     header("location:".SITEURL);
                }
              
              
            }
            
            ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php  include("partials-front/footer.php");?>
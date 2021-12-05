<?php
include ("partials/menu.php");
?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    //sql query to get all the order details
    $sql = "SELECT * FROM tbl_order WHERE id = $id";
    //execute the query
    $res = mysqli_query($conn,$sql);
    //count  the rows  
    $count = mysqli_num_rows($res);

    if($count == 1){
          //detail available
          $row = mysqli_fetch_assoc($res);

          $food = $row['food'];
          $price = $row['price'];
          $qty = $row['qty'];
          $status = $row['status'];
          $customer_name = $row['customer_name'];       
          $customer_contact = $row['customer_contact'];
          $customer_email = $row['customer_email'];
          $customer_address = $row['customer_address'];

    } else {
        //detail not available
        //redirect to order page
        header("Location:".SITEURL."admin/manage-order.php");
    }
} else {
    //redirect to order page
    header('Location:'.SITEURL."admin/manage-order.php");
}
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br><br>
        <form action="" method="post">
           <table class="tbl-30">
               <tr>
                   <td>Food:</td>
                  <td><b><?php echo $food;?></b></td>
               </tr>
               <tr>
                   <td>Price:</td>
                   <td><?php echo $price;?></td>
               </tr>
               <tr>
                   <td> Qty:</td>
                   <td>
                       <input type="number" name="qty" value="<?php echo $qty;?>">
                   </td>
               </tr>
               <tr>
                   <td>Status:</td>
                   <td>
                       <select name="status">
                           <option  <?php if($status == "ordered"){echo "selected";}?>  value="ordered">ordered</option>
                           <option  <?php if($status == "on delivery"){echo "selected";}?> value="on delivery">on delivery</option>
                           <option  <?php if($status == "delivered"){echo "selected";}?> value="delivered">delivered</option>
                           <option  <?php if($status == "cancel"){echo "selected";}?> value="cancel">cancel</option>
                       </select>
                   </td>
               </tr>
               <td> Customer name:</td>
                   <td>
                       <input type="text" name="full-name" value="<?php echo $customer_name;?>">
                   </td>
               </tr>
               <td>Customer contact:</td>
                   <td>
                       <input type="text" name="contact" value="<?php echo $customer_contact;?>">
                   </td>
               </tr>
               <td>Customer email:</td>
                   <td>
                       <input type="text" name="email" value="<?php echo $customer_email;?>">
                   </td>
               </tr>
               <td>Customer Address:</td>
                   <td>
                      <textarea name="address"  cols="20" rows="5"><?php echo $customer_address;?></textarea>
                   </td>
               </tr>
               <td colspan='2'>
                        <input type="hidden" name="food" value="<?php echo $food;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                       <input type="submit" name="submit" value="Upate Order" class="btn-secondary">
                   </td>
               </tr>
           </table>

        </form>
        <?php
        //check whether the button is clicked or not
        if(isset($_POST['submit'])){
            //get all the values from the form
            
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $status = $_POST['status'];
            $total = $qty*$price;
            $order_date = date('Y-m-d h-s-i');
            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];
            //update the values
            //sql query to update the database
            $sql2 = "UPDATE tbl_order SET 
            
            food = '$food',
            price = $price,
            qty = $qty,
            total = $total,
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'
            WHERE id = $id
            ";
            //execute the query
            $res2 = mysqli_query($conn,$sql2);
            if($res2){
                //display success message
                $_SESSION['update'] = "<div class='success'>The Order was succesfully updated!</div>";
                //redirect to order page
                header('location:'.SITEURL.'admin/manage-order.php');
            } else {
                 //display erroe message
                 $_SESSION['update'] = "<div class='error'>Failed to update the Order!</div>";
                 //redirect to order page
                 header('location:'.SITEURL.'admin/manage-order.php');
            }
            //and redirect to manage order with message

        }
        ?>
    </div>
</div>
<?php
include ("partials/footer.php");
?>


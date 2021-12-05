<?php
include ("partials/menu.php");
?>
<div class="main-content">
    <div class="wrapper">
        <h1>manage order</h1>
        <br  />  <br  />
         <?php 
         if(isset($_SESSION['update'])){
             echo $_SESSION['update'];
             unset($_SESSION['update']);
         }
         
         ?>
      <br>
   <table class="tbl-full">
       <tr>
           <th>S.N</th>
           <th>Food</th>
           <th>Price</th>
           <th>Qty</th>
           <th>Total</th>
           <th>Order_date</th>
           <th>Status</th>
           <th>customer_name</th>
           <th>contact</th>
           <th>email</th>
           <th>address</th>
           <th>Actions</th>
       </tr>
       <?php
       //get all the orders from the database
       $sql = "SELECT * FROM tbl_order ORDER BY id DESC";//display latest order first
       //execute the query
       $res = mysqli_query($conn,$sql);
       //count the number of rows
       $count = mysqli_num_rows($res);
       //check whether the data is available or not
       if($count > 0){
        //the data is available
        $sn = 1;
        while($row = mysqli_fetch_assoc($res)){
            $id = $row['id'];
            $food= $row['food'];
            $price = $row['price'];
            $qty = $row['qty'];
            $total = $row['total'];
            $order_date = $row['order_date'];
            $status = $row['status'];
            $customer_name = $row['customer_name'];
            $customer_contact = $row['customer_contact'];
            $customer_email = $row['customer_email'];
            $customer_address = $row['customer_address'];
            ?>
                <tr>
                   <td><?php echo $sn++;?></td>
                   <td><?php echo $food;?></td>
                   <td><?php echo $price;?></td>
                   <td><?php echo $qty;?></td>
                   <td><?php echo $total;?></td>
                   <td><?php echo $order_date;?></td>
                   <td>
                       <?php
                       if($status == "ordered"){
                           echo "<label style='color:blue'>ordered</label>";
                       } else if ($status == "on delivery"){
                           echo "<label style='color:orange'>on delivery</label>";
                       } else if($status == "delivered"){
                           echo "<label style='color:green'>delivered</label>";
                       } else if($status  == "cancel"){
                           echo "<label style='color:red'>cancelled</label>";
                       }
                       ;?>
                    </td>
                   <td><?php echo $customer_name;?></td>
                   <td><?php echo $customer_contact;?></td>
                   <td><?php echo $customer_email;?></td>
                   <td><?php echo $customer_address;?></td>
                   <td><a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Update Order</a></td>
              </tr>
            <?php
        }
       } else {
           //data is not available
           echo "<tr> <td colspan='12' class='error'>Food order is not available!</td> </tr>";
       }
       
       ?>
    
   </table>
    </div>
</div>
<?php
include ("partials/footer.php");
?>
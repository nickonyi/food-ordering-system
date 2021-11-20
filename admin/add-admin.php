<?php
include ("partials/menu.php") ;

?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>
        <form action="" method="POST">
          <table class="tbl-30">
              <tr>
                  <td>Full name:</td>
                  <td>
                      <input type="text" name="full_name" placeholder="Insert your name">
                    </td>
              </tr>
              <tr>
                  <td>Username:</td>
                  <td>
                      <input type="text" name="username" placeholder="insert your username"> 
                    </td>
              </tr>
              <tr>
                  <td>Password:</td>
                  <td>
                      <input type="password" name="password" placeholder="Your password please">
                    </td>
              </tr>
          </table>
          <tr>
              <td colspan="2">
                <input type="submit" name="submit" value="Add Admin"  class="btn-secondary">
              </td>
          </tr>
        </form>
    </div>
</div>
<?php
include ("partials/footer.php")
?>

<?php

//Process the data from the form and store it in the database

//check whetherthe submit button  has been clicked or not
 if (isset($_POST['submit'])){
     //get the data from the form
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];
     $password  = md5($_POST['password']); //password encrypted with md5
     //sql query to save the data to the database
     $sql = "INSERT into tbl_admin SET 
          full_name = '$full_name',
          username = '$username',
          password = '$password'
     ";

     //execute query and save in the database
     $res = mysqli_query($conn,$sql) or die(mysqli_error());
 //cheeck whether the (query is executed) data is saved and display the appropriate message
 if($res){
     echo "data is inserted";
 } else {
     echo "failed to insert data";
 }
    } 

?>
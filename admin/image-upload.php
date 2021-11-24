<?php  include("partials/menu.php");
ini_set('display_errors',1);
?>
<div class="main-content">
   <form action="" method="post" enctype="multipart/form-data">
       <table class="tbl-30">
       <td>Select image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>
                    <input type="submit" name="submit">
                    </td>
                   
                </tr>
       </table>

                  
   </form>
<?php

if(isset($_FILES['image']['name'])){
    //upload the image 
    //to upload the image we need image name,source path and destinatio path
    $image_name = $_FILES['image']['name'];
    $source_path = $_FILES['image']['tmp_name'];
    $destination_path = "../images/category/".$image_name;
    $upload = move_uploaded_file($source_path,$destination_path);

    if($upload){
        echo "true";
    } else {
        echo "false";
    }
} else {
    //don't upload the image and leave the value blank
    $image_name = "";
}
?>
    </div>
</div>
<?php  include("partials/footer.php");?>
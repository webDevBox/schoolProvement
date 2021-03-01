<?php
session_start();
error_reporting(0);
include "conn.php";
if(isset($_SESSION['id']))
{
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $country=$_POST['country'];
    $dist=$_POST['dist'];
   
    $sub=mysqli_query($conn,"SELECT * FROM school where school_name='$name'");
    $row=mysqli_num_rows($sub);
    if($row==1)
    {
       ?>
    <script>
    window.alert('A school with same name already exist');
    window.location.href= 'addschool.php';
    </script>
    <?php 
    }
   else
   {
         
      $allow=array("png","jpg","jpeg");
        $fold=$_FILES['image']['name'];
        $temp=explode('.',$fold);
        $ext=end($temp);
        $img=$name.'.'.$ext;

        $tmp=$_FILES['image']['tmp_name'];
        $des="../school/image/".$img;
        $upload=move_uploaded_file($tmp,$des);  
        $size=getimagesize($des);
      if($size[0] == 400 && $size[1] ==400 || !$fold)
      {
 if(in_array($ext,$allow) || !$fold)
    {
      if(!$fold)
      {
        $sql=mysqli_query($conn,"INSERT INTO school(school_name,country_name,school_district)
        VALUES('$name','$country','$dist')");
      }
      else
      {
        $sql=mysqli_query($conn,"INSERT INTO school(school_name,country_name,school_district,school_image)
        VALUES('$name','$country','$dist','$img')");
      } 
        if($sql)
        {
           
            
                 ?>
    <script>
    window.alert('Record Saved');
    window.location.href= 'addschool.php';
    </script>
    <?php
        }
        else{
          unlink($des);
             ?>
    <script>
    window.alert('Record Not Saved');
    window.location.href= 'addschool.php';
    </script>
    <?php
      }
    }
    else{
        ?>
        <script>
        window.alert('Only png,jpg and jpeg allowed!');
        window.location.href= 'addschool.php';
        </script>
        <?php
    }
  }
  else{
    unlink($des);
    ?>
    <script>
    window.alert('Image Dimension should 400x400');
    window.location.href= 'addschool.php';
    </script>
    <?php
  }
}


}
}
else {
          ?>
          <script>
          window.location.href= 'index.html';
          </script>
        <?php
}
?>
<?php
session_start();
error_reporting(0);
include "conn.php";
if(isset($_SESSION['id1']))
{
  $pid=$_SESSION['id1'];
    $run=mysqli_query($conn,"SELECT * FROM principal WHERE principal_id='$pid'");
    $run_id=mysqli_fetch_assoc($run);
    $s_id=$run_id['school_id'];
    $sql1=mysqli_query($conn,"SELECT * FROM school WHERE school_id='$s_id'");
    $fetching=mysqli_fetch_assoc($sql1);
    $schoolName=$fetching['school_name'];
    $dist=$run_id['principal_district'];
    $country=$run_id['country_name'];
    if(isset($_POST['submit']))
    {
      $first=$_POST['fname'];
      $last=$_POST['lname'];
      $email=$_POST['email'];
      $pass=md5(12345);
      $join=date('Y-m-d');
      
        $string=substr($email,-4);
        if($string=='.com')
        {
 
        $sub1=mysqli_query($conn,"SELECT * FROM teacher where teacher_email='$email'");
            $row1=mysqli_num_rows($sub1);
            if($row1==1)
            {
                ?>
                <script>
                window.alert('A teacher with same email already exist');
                window.location.href= 'teacher.php';
                </script>
                <?php
            }
            else{
        $allow=array("png","jpg","jpeg");
        $fold=$_FILES['image']['name'];
        $temp=explode('.',$fold);
        $ext=end($temp);
        $img=$email.'.'.$ext;

        $tmp=$_FILES['image']['tmp_name'];
        $des="../school/teacher/".$img;
        $upload=move_uploaded_file($tmp,$des);  
        $size = getimagesize($des); 
        if($size[0] == 400 && $size[1] == 400 || !$fold)
        {
 if(in_array($ext,$allow) || !$fold)
    {
        if(!$fold)
        {
 $sql=mysqli_query($conn,"INSERT INTO teacher(school_id,teacher_firstName,teacher_lastName,teacher_absence,teacher_email,teacher_password,teacher_district,country_name,joining_date,teacher_account,teacher_reset_password)
        VALUES('$s_id','$first','$last',0,'$email','$pass','$dist','$country','$join','approved',0)");
        }
        else
        {
 $sql=mysqli_query($conn,"INSERT INTO teacher(school_id,teacher_firstName,teacher_lastName,teacher_absence,teacher_email,teacher_password,teacher_district,country_name,teacher_image,joining_date,teacher_account,teacher_reset_password)
        VALUES('$s_id','$first','$last',0,'$email','$pass','$dist','$country','$img','$join','approved',0)");
        }
        if($sql)
        {
                 ?>
    <script>
    window.alert('Record Saved');
    window.location.href= 'teacher.php';
    </script>
    <?php
        }
        else{
            unlink($des);
             ?>
    <script>
    window.alert('Record Not Saved');
    window.location.href= 'teacher.php';
    </script>
    <?php
      }
    }
    else{
        ?>
        <script>
        window.alert('Only png,jpg and jpeg allowed!');
        window.location.href= 'teacher.php';
        </script>
        <?php
    }
}
else{
    unlink($des);
    ?>
        <script>
        window.alert('Image Dimension should 400x400');
        window.location.href= 'teacher.php';
        </script>
        <?php
}
}

    
}
    else{
        ?>
        <script>
        window.alert('Please Enter Valid Email');
        window.location.href= 'teacher.php';
        </script>
        <?php
       
    }
    }
    else if(isset($_POST['file']))
    {
        $extension =$_FILES["excel"]["name"];
      $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
      include("../PHPExcel-1.8/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
      $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file
    
      $run=0;
      $nosave=0;
      foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
      {
       $highestRow = $worksheet->getHighestRow();
       for($row9=2; $row9<=$highestRow; $row9++)
       {
        $firstname = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0, $row9)->getValue());
        $lastname = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row9)->getValue());
        $email1=mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row9)->getValue());
        $Join1 = date('Y-m-d');
        $password1=md5(12345);
       
        
        $district1=$run_id['principal_district'];
        $country = $run_id['country_name'];
        
        
        $school_id1=$run_id['school_id'];
        
       
        $string1=substr($email1,-4);
    
    
        $sub3=mysqli_query($conn,"SELECT * FROM teacher where teacher_email='$email1'");
        $row3=mysqli_num_rows($sub3);
    
        if($firstname && $lastname && $email1 && $password1 && $district1 && $schoolName && $Join1 && $string1 == '.com' && $row3 == 0)
        {
        $query7 = mysqli_query($conn,"INSERT INTO teacher(school_id,teacher_firstName,teacher_lastName,teacher_email,teacher_password,teacher_district,country_name,joining_date,teacher_account,teacher_reset_password)
        VALUES ('$school_id1','$firstname','$lastname','$email1','$password1','$district1','$country','$Join1','approved',0)");
        if($query7)
        {
            $run=$run+1;
        }
        else
            {
        $nosave++;
            }
    }
       }
       ?>
   <script>
   window.alert('Numer of Saved Records: <?php echo $run; ?>');
   window.location.href= 'teacher.php';
   </script>
   <?php
    }
    }
    
    }

else {
          ?>
          <script>
          window.location.href= '../index.html';
          </script>
        <?php
}
?>
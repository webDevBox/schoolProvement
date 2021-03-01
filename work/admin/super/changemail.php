<?php
session_start();
include "conn.php";
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM super WHERE id='$id'"));
    $older=$sql['email'];
    $olduser=$sql['username'];
    if (isset($_POST['update'])) {
        $email=$_POST['email'];
        $user=$_POST['user'];
        $string=substr($email,-4);
        $query=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM super WHERE email='$email'"));
        if($older == $email)
        {
           $query=0;
        }
        if($query > 0)
        {
            ?>
    <script>
        window.alert("This Email Already Exist");
        window.location.href = 'changemail.php';
    </script>
    <?php 
        }
        else{
            if($string != '.com')
            {
                ?>
    <script>
        window.alert("Please Enter Valid Email");
        window.location.href = 'changemail.php';
    </script>
    <?php 
            }
            else
            {
                $query5=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM super WHERE username='$user'"));
                if($olduser == $user)
                {
                    $query5=0;
                }
                if($query5 == 0)
                {
                $query1=mysqli_query($conn,"UPDATE super SET username='$user', email='$email' WHERE id='$id'");
                if($query1)
                {
                    ?>
                    <script>
                        window.alert("Record Updated");
                        window.location.href = 'profile.php';
                    </script>
                    <?php 
                } 
                else
                {
                    ?>
                    <script>
                        window.alert("Record Not Updated");
                        window.location.href = 'changemail.php';
                    </script>
                    <?php 
                }  
            }
            else
            {
                ?>
                <script>
                    window.alert("This User Name Already Exist");
                    window.location.href = 'changemail.php';
                </script>
                <?php 
            }  
            }

        }
        
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>SchoolProvement</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <link href="../style.css" rel="stylesheet">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

                </head>
        <body>

            <header class="header ">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="superdash.php"> <img class="logo1" src="../images/logo1.png"> <img class="logo2" src="../images/logo2.png"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>

                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="btn btn-danger" href="logout.php"><img src="https://img.icons8.com/dotty/20/000000/export.png"> <span class="mx-1">SIGN OUT </span></a>
                            </li>
                        </ul>

                    </div>
                </nav>


            </header>
            <div class="row">
    <?php include "sidebar.html"; ?>

                <div style="background-color: #464644" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

                    <div class="w3-container">
                        <h1 class="text-center dash">Super Admin Dashboard</h1>
                    </div>

                    <div class="container">
                        <form action="#" method="post" class="form">

                            <legend class="legend">Change Email</legend>
                            <div class="form-group">
                                <label id="emailHelp" class="form-text required">Enter New Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $older; ?>" required>
                            </div>
                            <div class="form-group">
                                <label id="emailHelp" class="form-text required">Enter New User Name</label>
                                <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $olduser; ?>" required>
                            </div>
                            <center> <input type="submit" name="update" value="Update" class="btn btn-primary"> </center>

                        </form>
                      

                    </div>
                </div>
            </div>
        </body>
    </html>


    <?php
} else {
    ?>
    <script>
        window.location.href= '../index.html';
    </script>
    <?php
}
?>
<?php
session_start();
include "conn.php";
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    if (isset($_POST['update'])) {
        $old = md5($_POST['old']);
        $new = md5($_POST['new']);
        $cpass = md5($_POST['confirm']);
        $ab = strlen($_POST['new']);
        $paa = $_POST['new'];
        if (preg_match('/[A-Z]/', $paa)) {
            if (preg_match('/[a-z]/', $paa)) {
                if (preg_match('/[0-9]/', $paa)) {
                    if ($ab >= 8) {



                        if ($new == $cpass) {
                            $sql1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM super WHERE id='$id'"));
                            $datapass = $sql1['password'];
                            if ($old == $datapass) {
                                $sql2 = mysqli_query($conn, "UPDATE super SET password='$new' WHERE id='$id'");
                                if ($sql2) {
                                    ?>
                                    <script>
                                        window.alert('Password Updated Successfully');
                                        window.location.href = 'logout.php';
                                    </script>
                                    <?php
                                }
                            } else {
                                ?>
                                <script>
                                    window.alert('Please Enter right old password');
                                    window.location.href = 'change.php';
                                </script>
                                <?php
                            }
                        } else {
                            ?>
                            <script>
                                window.alert('Confirm Password should same as new password');
                                window.location.href = 'change.php';
                            </script>
                            <?php
                        }
                    }
                }
            }
        } else {
            ?>
            <script>
                window.alert('you dont follow password rules');
                window.location.href = 'change.php';
            </script>
            <?php
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
            <style>
                /* Style all input fields */
                /* Style the submit button */

                /* Style the container for inputs */

                /* The message box is shown when the user clicks on the password field */
                #message {
                    display:none;
                    background: #f1f1f1;
                    color: #000;
                    position: relative;
                    padding: 20px;
                    margin-top: 10px;
                }

                #message p {
                    padding: 2px 35px;
                    font-size: 12px;
                }

                /* Add a green text color and a checkmark when the requirements are right */
                .valid {
                    color: green;
                }

                .valid:before {
                    position: relative;
                    left: -35px;
                    content: "✔";
                }

                /* Add a red text color and an "x" when the requirements are wrong */
                .invalid {
                    color: red;
                }

                .invalid:before {
                    position: relative;
                    left: -35px;
                    content: "✖";
                }
            </style>

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

                            <legend class="legend">Change Password</legend>
                            <div class="form-group">
                                <label id="emailHelp" class="form-text required">Enter Old Password</label>
                                <input type="password" name="old" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Old Password" required>

                            </div>
                            <div class="form-group">
                                <label id="emailHelp" class="form-text required">Enter New Password</label>
                                <input type="password" name="new" class="form-control" id="psw" aria-describedby="emailHelp" placeholder="New Password" required>

                            </div>
                            <div class="form-group">
                                <label id="emailHelp" class="form-text required">Confirm Password</label>
                                <input type="password" name="confirm" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  placeholder="Confirm Password" required>

                            </div>

                            <center> <input type="submit" name="update" value="Update" class="btn btn-primary"> </center>

                        </form>
                        <div id="message">
                            <h5>Password must contain the following:</h5>
                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                            <p id="number" class="invalid">A <b>number</b></p>
                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                        </div>

                    </div>
                </div>
            </div>
            <script>

        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function () {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function () {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function () {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;

            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }

            </script>
        </body>
    </html>


    <?php
} else {
    ?>
    <script>
        window.location.href= 'index.html';
    </script>
    <?php
}
?>
<?php
session_start();
include "conn.php";
if (isset($_GET['user'])) {
    $user = $_GET['user'];
    if (isset($_POST['principal'])) {
        $old = md5($_POST['old']);
        $new = $_POST['new'];
        $pass=md5($_POST['new']);
        $cpass = $_POST['renew'];
        $ab = strlen($_POST['new']);
        $paa = $_POST['new'];
        if (preg_match('/[A-Z]/', $paa)) {
            if (preg_match('/[a-z]/', $paa)) {
                if (preg_match('/[0-9]/', $paa)) {
                    if ($ab >= 8) {

                        if ($new == $cpass) {
                            $sql1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM principal WHERE principal_email='$user'"));
                            $datapass = $sql1['principal_password'];
                            if ($old == $datapass) {
                                $sql2 = mysqli_query($conn, "UPDATE principal SET principal_password='$pass' WHERE principal_email='$user'");
                                if ($sql2) {
                                    ?>
                                    <script>
                                        window.alert('Password Updated Successfully');
                                        window.location.href = 'index.html';
                                    </script>
                                    <?php
                                }
                            } else {
                                ?>
                                <script>
                                    window.alert('Please Enter right old password');
                                    window.location.href = 'princhangepassword.php?user=<?php echo $user; ?>';
                                </script>
                                <?php
                            }
                        } else {
                            ?>
                            <script>
                                window.alert('Confirm Password should same as new password');
                                window.location.href = 'princhangepassword.php?user=<?php echo $user; ?>';
                            </script>
                            <?php
                        }
                    }
                }
            }
        }
        else {
        ?>
        <script>
            window.alert('you dont follow password rules');
            window.location.href = 'princhangepassword.php?user=<?php echo $user; ?>';
        </script>
        <?php
    }
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SchoolProvement</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script type="text/javascript" src="jquery.js"></script>
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
                <a class="navbar-brand" href="index.html"> <img class="logo1" src="images/logo1.png"> <img class="logo2" src="images/logo2.png"> </a>

            </nav>
        </header>


        <div  class="bg" style="background-color: #464644">
            <h1 class="text-center" style="padding-top:20px; color: white;">School Provement Portal</h1>

            <div class="container">
                <form action="#" method="post" class="form-container">

                    <h3 class="text-center text-white">Change Password</h3>
                    <small id="emailHelp" class="form-text small required">Enter Old Password</small>
                    <input class="form-control" type="password" placeholder="Enter Old Password" name="old" required><br>
                    <small id="emailHelp" class="form-text small required">Enter New Password</small>
                    <input class="form-control" type="password" placeholder="Enter New Password" id="psw" name="new" required><br>
                    <small id="emailHelp" class="form-text small required">Repeat Password</small>
                    <input class="form-control" type="password" placeholder="Confirm Password" name="renew" required>
                    <br>
                    <center>  <input type="submit" name="principal" id="submit" value="Change Password" class="btn btn-primary"> </center>  

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


        <script>
    $(".btn").click(function ()
    {
        if ($(".form-popup").css("display") == "none")
        {
            $(".form-popup").fadeIn("slow");
        }
        else {
            $(".form-popup").fadeOut("slow");
        }
    });


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
<?php
session_start();
include "conn.php";
if (isset($_SESSION['id'])) {
    if (isset($_POST['specific'])) {
        $district = $_POST['dist'];
        $school = '';
        $checkbox1 = $_POST['user'];


        $date=date("m-d-Y");
        $text = $_POST['text'];

        class Firebase {

// sending push message to single user by firebase reg id
            public function send($to, $message) {
                $fields = array(
                    'to' => $to,
                    'data' => $message,
                );
                return $this->sendPushNotification($fields);
            }

// Sending message to a topic by topic name
            public function sendToTopic($to, $message) {
                $fields = array(
                    'to' => '/topics/' . $to,
                    'data' => $message,
                );
                return $this->sendPushNotification($fields);
            }

// sending push message to multiple users by firebase registration ids
            public function sendMultiple($registration_ids, $message) {
                $fields = array(
                    'to' => $registration_ids,
                    'data' => $message,
                );

                return $this->sendPushNotification($fields);
            }

// function makes curl request to firebase servers
            private function sendPushNotification($fields) {

// require_once __DIR__ . '/config.php';
// Set POST variables
                $url = 'https://fcm.googleapis.com/fcm/send';

                $headers = array(
                    'Authorization: key=' . 'AAAAk1SHP68:APA91bEV9e3n1bVi4nv2TLrvF8uPoJnKOMLmjLub7reVZD4SRoqZVRjt5_qPS6T2YK-GuB6cuacZ2w4Y-RxsRtsVjzZSHxnGCSrAzNYBWT8QSxaxVxhnvACCo9Xh5APd5v4_R0w2_-KQ',
                    'Content-Type: application/json'
                );
// Open connection
                $ch = curl_init();

// Set the url, number of POST vars, POST data
                curl_setopt($ch, CURLOPT_URL, $url);

                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Disabling SSL Certificate support temporarly
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

// Execute post
                $result = curl_exec($ch);
                if ($result === FALSE) {
                    die('Curl failed: ' . curl_error($ch));
                }

// Close connection
                curl_close($ch);

                return $result;
            }

        }

        class Push {

// push message title
            private $title;
            private $message;
            private $image;
// push message payload
            private $data;
// flag indicating whether to show the push
// notification or not
// this flag will be useful when perform some opertation
// in background when push is recevied
            private $is_background;

            public function __construct() {
                
            }

            public function setTitle($title) {
                $this->title = $title;
            }

            function setMessage($message) {
                $this->message = $message;
            }

            public function setImage($imageUrl) {
                $this->image = $imageUrl;
            }

            public function setPayload($data) {
                $this->data = $data;
            }

            public function setIsBackground($is_background) {
                $this->is_background = $is_background;
            }

            public function getPush() {
                $res = array();
                $res['data']['title'] = $this->title;
                $res['data']['is_background'] = $this->is_background;
                $res['data']['message'] = $this->message;
                $res['data']['image'] = $this->image;
                $res['data']['payload'] = $this->data;
                $res['data']['timestamp'] = date('Y-m-d G:i:s');
                return $res;
            }

        }

        foreach($checkbox1 as $chk){
        if ($district == 'all') {
            $district = '';
            $topic = str_replace(' ', '', $chk);

        } else {
             $school = $_POST['school'];
             $topic = $_POST['dist'] . $_POST['school'] . $chk;
             $topic = str_replace(' ', '', $topic);

        }
        
       $title = "Alert Notification";
        $message = $text;


        error_reporting(-1);
        ini_set('display_errors', 'On');

        $firebase = new Firebase();
        $push = new Push();

// // optional payload
        $payload = array();
        $payload['team'] = 'Pak';
        $payload['score'] = '5.6';

        $push->setTitle($title);
        $push->setMessage($message);
        $push->setIsBackground(FALSE);
        $push->setPayload($payload);

        $json = $push->getPush();
        $response = $firebase->sendToTopic($topic, $json);
}
        

        if ($response) {
            
            
            
            $checkbox1 = $_POST['user'];
            $chk="";  
                foreach($checkbox1 as $chk1)  
                   {  
                      $chk.= $chk1."  ";  
                   }  
            $type = $chk;
            $district=$_POST['dist'];
            $school=$_POST['school'];
        $sql = mysqli_query($conn, "INSERT INTO notification(dist,school,user,text,date)VALUES('$district','$school','$type','$text','$date')");
        if ($sql) {
            ?>
            <script>
                window.alert("Notification Sent Successfuly");
                window.location.href = 'notification.php';
            </script>
            <?php
        }
            
            
        } else {

            
            ?>

            <script>
                window.alert("Notification Not Sent");
                   window.location.href = 'notification.php';
            </script>
            <?php
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
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-app.js"></script>
            <script src="https://www.gstatic.com/firebasejs/7.13.2/firebase-analytics.js"></script>
            <link href="../style.css" rel="stylesheet">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        </head>
        <body>


            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Add Notification </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" method="post" class="form">
                            <legend class="legend text-dark">Specific Notification</legend>
                            <div class="form-group">
                                <small id="emailHelp" class="form-text small">Select District</small>
                                <select class="form-control my-2" name="dist" id="dist" required>
                                    <option value="all" selected>All District</option>
                                    <?php
                                    $query3 = mysqli_query($conn, "SELECT * FROM district");
                                    while ($row = mysqli_fetch_assoc($query3)) {
                                        ?>
                                        <option value="<?php echo $row['dist_name']; ?>"> <?php echo $row['dist_name']; ?> </option>;
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <small id="emailHelp" class="form-text small">Select School</small>
                                <select name="school" id="school" class="form-control my-2">
                                     <option value="all" selected>All School</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <small id="emailHelp" class="form-text small required">Select User Type</small>
                                <input type="checkbox" name="user[]" class="requser" value="Students"> Students<br/>
                                <input type="checkbox" name="user[]" class="requser" value="Parents"> Parents<br/>
                                <input type="checkbox" name="user[]" class="requser" value="Community Members"> Community Members<br/>
                                <input type="checkbox" name="user[]" class="requser" value="Teachers"> Teachers<br/>
                                <input type="checkbox" name="user[]" class="requser" value="Principals"> Principals<br/>
                             
                            </div>

                            <div class="form-group">
                                <small id="emailHelp" class="form-text small required">Enter Notification</small>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text" placeholder="Enter Push Notification" required></textarea>
                            </div>

                            <center> <input type="submit" style="margin-bottom:10px" id="submit11" title="" name="specific" value="Send" class="btn btn-primary pumpo" disabled> </center>

                        </form>


                    </div>
                </div>
            </div>



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

                <div style="background-color: #464644;" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

                    <div class="w3-container">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
                                <h1 class="text-center dash">Super Admin Dashboard</h1>
                            </div>
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 mt-3">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Add Notification
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive-xs table-responsive-sm table-responsive-md container">
                        <table id="tableid" class="table table-dark table-striped table-bordered table-hover">
                            <thead>
                                <tr> <th colspan="9" class="text-center" scope="col">Notification List</th> </tr>
                                <tr>
                                    <th class="text-center" scope="col">Serial</th>
                                    <th class="text-center" scope="col">Message</th>
                                    <th class="text-center" scope="col">User</th>
                                    <th class="text-center" scope="col">District</th>
                                    <th class="text-center" scope="col">School</th>
                                    <th class="text-center" scope="col"> Delete </th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sub = 0;
                                $query = "SELECT * FROM notification";
                                $query_run = mysqli_query($conn, $query);
                                if ($query_run) {
                                    foreach ($query_run as $row) {

                                        $sub = $sub + 1;
                                        ?>
                                        <tr>
                                            <td class="text-center"> <?php echo $sub; ?> </td>
                                            <td class="text-center"> <?php echo $row['text']; ?> </td>
                                            <td class="text-center"> <?php echo $row['user']; ?> </td>
                                            <td class="text-center"> <?php echo $row['dist']; ?> </td>
                                            <td class="text-center"> <?php echo $row['school']; ?> </td>
                                            <?php $id = $row['id']; ?>
                                            <td class="text-center"> <button onclick="{
                        var x = confirm('Are you sure you want to delete?');
                        if (x)
                            window.location = 'notification.php?status=<?php echo $id; ?>';
                    }" type="button" class="rounded-pill btn btn-danger" > Delete </button>  </td> 
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>

                                <?php
                            } else {
                                echo "No record Found";
                            }
                            ?>
                        </table>
                    </div>




                </div>
            </div>
            <?php
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                $query1 = mysqli_query($conn, "DELETE FROM notification WHERE id='$status'");
                if ($query1) {
                    ?>
                    <script>
                        window.alert('Notification Deleted');
                        window.location.href = 'notification.php';
                    </script>
                    <?php
                } else {
                    ?>
                    <script>
                        window.alert('Notification Not Deleted');
                        window.location.href = 'notification.php';
                    </script>
                    <?php
                }
            }
            ?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>


            <script>

                $(document).ready(function () {
                    $('#tableid').DataTable();
                });

            </script>

            <script>
                $(document).ready(function ()
                {
                    $("#dist").change(function ()
                    {
                        if ($(this).val() != '')
                        {
                            var dist = $(this).val();
                            $.ajax({
                                url: "ajax.php",
                                method: "post",
                                data: {dist: dist},
                                success: function (data)
                                {
                                    $("#school").html(data);
                                }
                            });
                        }
                    });
                });
                
                $('.requser').click(function()
                {
                    $status=0;
                $('input[type=checkbox]:checked').each(function () {
                    if(this.checked)
                    {
                        $status=1;
                    }
                });
                
                
                if($status==1)
                {
                  $('.pumpo').removeAttr("disabled");
                }
                else{
                     $('.pumpo').attr('disabled','disabled');
                }
                
                    
                });
                
                
                
                
            </script>
            <script>

                window.onload = function () {
                    //run js code here
                    // Your web app's Firebase configuration
                    var firebaseConfig = {
                        apiKey: "AIzaSyAQ6rbOndLnXriBLxRL6VLo2NDD8ounO44",
                        authDomain: "schoolprovement.firebaseapp.com",
                        databaseURL: "https://schoolprovement.firebaseio.com",
                        projectId: "schoolprovement",
                        storageBucket: "schoolprovement.appspot.com",
                        messagingSenderId: "632778342319",
                        appId: "1:632778342319:web:75e91f6c2ff1addcd6395a",
                        measurementId: "G-NBENYFR7GK"
                    };
                    // Initialize Firebase
                    firebase.initializeApp(firebaseConfig);
                    firebase.analytics();
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
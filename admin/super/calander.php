<?php
session_start();
include "conn.php";
if(isset($_SESSION['id']))
{
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
    <link href="../style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="../jquery.js" type="text/javascript"></script>
</head>
<body>
    
    <header class="header ">
        <nav class="navbar navbar-expand-lg navbar-light">
                <div class="row container">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
            <a class="navbar-brand" href="superdash.php"> <img class="logo1" src="../images/logo1.png"> <img class="logo2" src="../images/logo2.png"> </a>
               <button class="navbar-toggler" type="button" id="toggler">
                   <span class="navbar-toggler-icon"></span>
               </button>
            </div>
           
              <div class="collapse navbar-collapse col-lg-3 col-md-3 col-sm-3 col-xs-3" id="navbarSupportedContent">
                   <ul class="navbar-nav ml-auto">
                     <li class="nav-item">
                       <a class="btn btn-danger" href="logout.php"><img src="https://img.icons8.com/dotty/20/000000/export.png"> <span class="mx-1">SIGN OUT </span></a>
                     </li>
                     </ul>
                </div>
          
                </div>
             </nav>
   </header>
    <div class="row">
      <?php include "sidebar.html"; ?>
      <div style="background-color: #464644;" class="col-md-10 col-lg-10 col-sm-12 col-xs-12 ">

        <div class="row container">
            <div class="col-11" >
          <h1 class="text-center dash">Super Admin Dashboard</h1>
        </div>
        <div class="col-1">
          <button id="senddata" class="btn btn-primary mt-3">Submit</button>
        </div>
    </div>
            <div class="container" style="background-color: white;" id="calendar"></div>
         </div>
</div>  
<?php
if(isset($_GET['status']))
{
    $distId=$_GET['status'];
}
?>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
   <script>
    
   $(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
     editable:true,
     header:{
      left:'prev,',
      center:'title',
      right:'next'
     },
     events: 'load.php?status=<?php echo $distId; ?>',
     selectable:true,
     selectHelper:true,
     select: function(start, end, allDay)
     {
      var title = prompt("Enter Event Title");
      if(title)
      {
       var start = $.fullCalendar.formatDate(start, "Y-MM-DD hh:mm:ss");
       var end = $.fullCalendar.formatDate(end, "Y-MM-DD hh:mm:ss");
       $.ajax({
        url:"insert.php",
        method:"POST",
        data:{title:title, start:start, dist_id:'<?php echo $distId; ?>' },
        success:function()
        {
         calendar.fullCalendar('refetchEvents');
        }
       });
      }
     },
     editable:true,
     eventResize:function(event)
     {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
       url:"update.php",
       type:"POST",
       data:{title:title, start:start, end:end, id:id},
       success:function(){
        calendar.fullCalendar('refetchEvents');
        alert('Event Update');
       }
      });
     },
 
     eventDrop:function(event)
     {
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
       url:"update.php",
       type:"POST",
       data:{title:title, start:start, end:end, id:id},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Updated");
       }
      });
     },
 
     eventClick:function(event)
     {
      if(confirm("Are you sure you want to remove it?"))
      {
       var id = event.id;
       $.ajax({
        url:"delete.php",
        type:"POST",
        data:{id:id},
        success:function()
        {
         calendar.fullCalendar('refetchEvents');
         alert("Event Removed");
        }
       })
      }
     },
 
    });
   });
    
   </script>

<script>
$(document).ready(function () {
    $('.editbtn').on('click',function() {
        $('#EditData').modal('show');
        
        $tr = $(this).closest('tr');

var data = $tr.children("td").map(function() {
    return $(this).text();

}).get();

console.log(data);

$('#update_id').val(data[0]);
$('#sname').val(data[1]);
$('#simage').val(data[2]);
$('#scountry').val(data[3]);
$('#sdistrict').val(data[4]);

    });
});
</script>

<script>
$(document).ready(function () {
    $('.deletebtn').on('click',function() {
        $('#DeleteData').modal('show');
        
        $tr = $(this).closest('tr');

var data = $tr.children("td").map(function() {
    return $(this).text();

}).get();

console.log(data);

$('#delete_id').val(data[0]);


    });
});

</script>

<script>

$(document).ready(function() {
    $('#tableid').DataTable();
} );
</script>  

<script>
    $("#toggler").click(function()
    {
            
         if($("#navbarSupportedContent").fadeOut()){
                $("#navbarSupportedContent").fadeIn("slow");
            }
    });

    $("#senddata").click(function()
    {
        window.alert("District Added Successfully");
        window.location="adddist.php"; 
    });
</script>


</body>
</html>
<?php
}
else {
          ?>
          <script>
          window.location.href= 'index.html';
          </script>
        <?php
}
?>
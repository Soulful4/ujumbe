<?php
require('connect.php');

$con=mysqli_connect("localhost","root","","ujumbe");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


?>
<?php
session_start();
unset($_SESSION['sess_user']);
session_destroy();
header("location:index.php");
?>

<html>
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <style type="text/css">
        body {
background-image: url("blah.jpg");
            color:white;
        }
    </style>
</head>
<body>
<h3>Events Page</h3>

<table class="table table-condensed">
    <thead>
    <td>Event id</td>
    <td>Event Name</td>
    <td>Event faculty</td>
    <td>Event venue</td>
    <td>Event date</td>
    <td>Event time</td>
    <td>Event description</td>
    </thead>
    <tbody>
    <?php
    $data = "Select * from events";
    $events = mysqli_query($con,$data);

    foreach($events as $event):

        echo "<tr>";
        echo "<td>".$event['event_id']."</td>";
        echo "<td>".$event['event_name']."</td>";
        echo "<td>".$event['event_Faculty']."</td>";
        echo "<td>".$event['event_Venue']."</td>";
        echo "<td>".$event['event_date']."</td>";
        echo "<td>".$event['event_time']."</td>";
        echo "<td>".$event['event_Description']."</td>";


        echo"</tr>";

    endforeach;
    ?>




    </tbody>
</table>

</body>
</html>
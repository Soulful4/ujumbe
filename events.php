<?php
//require('connect.php')

$con=mysqli_connect("localhost","root","","ujumbe");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
//mysqli_query($con,"SELECT * FROM Persons");


?>

<html>
<head>

</head>
<body>
<h3>Events Page</h3>

<table>
    <thead>
    <td>Event id</td>
    <td>Event Name</td>
    <td>Event Description</td>
    </thead>
    <tbody>
    <?php
    $data = "Select * from events";
    $events = mysqli_query($con,$data);

    foreach($events as $event):

        echo "<tr>";
        echo "<td>".$event['event_id']."</td>";
        echo "<td>".$event['event_name']."</td>";
        echo "<td>".$event['event_description']."</td>";
        echo"</tr>";

    endforeach;
    ?>


    </tbody>
</table>

</body>
</html>
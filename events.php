<?php
//require('connect.php')

$con=mysqli_connect("localhost","root","ichigoojenge","ujumbe");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
//mysqli_query($con,"SELECT * FROM Persons");


?>

?>
<html>
<head>

</head>
<body>
<h3>Events Page</h3>

<table>
    <thead>
    <td>Event 1</td>
    <td>Event 2</td>
    <td>Event 3</td>
    </thead>
    <tbody>
    <?php
    $data = "Select * from users";
    $events = mysqli_query($con,$data);

    foreach($events as $event):

        echo "<tr>";
        echo "<td>".$event['fname']."</td>";
        echo "<td>".$event['lname']."</td>";
        echo "<td>".$event['username']."</td>";
        echo"</tr>";

    endforeach;
    ?>
    

    </tbody>
</table>

</body>
</html>
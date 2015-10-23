<?php
$con = mysqli_connect("localhost","root","","ujumbe");

if(mysqli_connect_errno())
{
    echo "Failed to connect to MySQL ".mysqli_connect_error();
}



//mysql_connect("localhost", "root", "") or die(mysql_error());
//mysql_select_db("ujumbe") or die(mysql_error());
//// Check connection
//if (mysqli_connect_errno())
//{
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}
//

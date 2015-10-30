<?php
// Connects to your Database
$con=mysqli_connect("localhost","root","","ujumbe");
// Check connection
if (mysqli_connect_errno()) {
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//if the login form is submitted
if (isset($_POST['submit']))
{
    var_dump($_POST);
// if form has been submitted
// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass'])
{
die('You did not fill in a required field.');
}
// checks it against the database
if (!get_magic_quotes_gpc())
{
$_POST['username'] = addslashes($_POST['username']);
}
$check = mysqli_query($con,"SELECT * FROM users WHERE username = '".$_POST['username']."'");

//Gives error if user doesn't exist
$check2 = mysqli_num_rows($check);

if ($check2 == 0)
{
$err= 'That user does not exist in our database';
//        die('That user does not exist in our database. <a href=registration.php>Click Here to Register</a>');
}
while($info = mysqli_fetch_array( $check ))
{
$_POST['pass'] = md5($_POST['pass']);
//gives error if the password is wrong

if ($_POST['pass'] != $info['password'])
{
die('Incorrect password, please try again.');
}
else
{
//add the new if statement here as instructed
if($info['usertype_id']== 1)
{
header("Location: events.php");
}
elseif($info['usertype_id']== 3)
{
header("Location: table.php");
}
else
{
header("Location: events.php");

}

//then redirect them to the members area
//header("Location: events.php");
}
}
}
?>
<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/3/2015
 * Time: 2:28 PM
 *
 */
?>
<!--<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

<table>
    <tr>
        <th></th>
        <tr></tr>
        <td>Cell B</td>
    </tr>
</table>

</body>
<div id = "Table">
    <div class = "row">
        <div class = "Event"> EventId    EventName  EventVenue   EventTime   EventDescription   EventTag</div>
        <!--<div class = "box">box2</div>
        <div class = "box">box3</div>
        <div class = "box">box4</div>
        <div class ="clear"></div>
    </div>
</div>

</html> -->

<?php
// Connects to your Database
mysql_connect("localhost", "root", "Root123456") or die(mysql_error());
mysql_select_db("ujumbe") or die(mysql_error());
//This code runs if the form has been submitted

if (isset($_POST['submit'])) {
//This makes sure they did not leave any fields blank
    if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] )
    {
        die('You did not complete all of the required fields');
    }
// checks if the username is in use
    if (!get_magic_quotes_gpc())
    {
        $_POST['username'] = addslashes($_POST['username']);
    }
    $usercheck = $_POST['username'];

    $check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'")   or die(mysql_error());
    $check2 = mysql_num_rows($check);

    //if the name exists it gives an error
    if ($check2 != 0)
    {
        die('Sorry, the username '.$_POST['username'].' is already in use.');
    }
    //  this makes sure both passwords entered match
    if ($_POST['pass'] != $_POST['pass2'])
    {
        die('Your passwords did not match. ');
    }
    // here we encrypt the password and add slashes if needed
    $_POST['pass'] = md5($_POST['pass']);
    if (!get_magic_quotes_gpc())
    {
        $_POST['pass'] = addslashes($_POST['pass']);
        $_POST['username'] = addslashes($_POST['username']);
    }
    // now we insert it into the database
    $insert = "INSERT INTO users (username, password)  VALUES ('".$_POST['username']."', '".$_POST['pass']."')";
    $add_member = mysql_query($insert);

    ?>
    <h1>Registered</h1>
    <p>Thank you, you have registered - you may now login</a>.
    </p>


    <?php
}
else
{
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table border="5">
            <tr>
                <th>Event ID:</th>
                <td>  <input type="int" name="Event ID" maxlength="60">  </td>
            </tr>
            <tr>
                <th>Event Name:</th>
                <td>  <input type="text" name="Event Name" maxlength="30">  </td>
            </tr>
            <tr>
                <th>Event Venue:</th>
                <td>  <input type="text" name="Event Venue" maxlength="50">  </td>
            </tr>
            <tr>
                <th>Event Time:</th>
                <td>  <input type="time" name="Event Time" maxlength="50">  </td>
            </tr>
            <tr>
                <th>Event Description:</th>
                <td>  <input type="text" name="Event Description" maxlength="100">  </td>
            </tr>
            <tr>
                <th>Event Tag:</th>
                <td>  <input type="text" name="Event Tag" maxlength="50">  </td>
            </tr>

            <tr>
                <th colspan=2><input type="submit" name="submit"  value="Register"></th></tr>
        </table>
    </form>
<?php  } ?>


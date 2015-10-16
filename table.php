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
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("ujumbe") or die(mysql_error());
//This code runs if the form has been submitted

if (isset($_POST['submit'])) {
//This makes sure they did not leave any fields blank
    if (!$_POST['Event ID'] | !$_POST['Event name'] | !$_POST['Event faculty'] )
    {
        die('You did not complete all of the required fields');
    }
// checks if the username is in use
    if (!get_magic_quotes_gpc())
    {
        $_POST['Event name'] = addslashes($_POST['Event name']);
    }
    $usercheck = $_POST['Event name'];

    $check = mysql_query("SELECT event_name FROM events WHERE event_name = '$eventscheck'")   or die(mysql_error());
    $check2 = mysql_num_rows($check);

    //if the name exists it gives an error
    if ($check2 != 0)
    {
        die('Sorry, the event_name '.$_POST['event_name'].' is already in use.');
    }

    // now we insert it into the database
    $insert = "INSERT INTO events (event_name)  VALUES ('".$_POST['event_name']."', )";
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
            <th> Event TypeID:</th>
                <td> <input type="text" name="Event TypeID" maxlength="30"> </td>
            </tr>
                <tr>
                    <th>Event Faculty:</th>
                 <td > <input type="option" name="Event Faculty" maxlength="50">
                    <select name="Faculty">
                        <option value="FIT"></option>
                        <option value="SMC"></option>
                        <option value="SFAE"></option>
                        <option value="LAW"></option>
                    </select> </td>

            </tr>
            <tr>
                <th>Event Venue:</th>
                <td>  <input type="text" name="Event Venue" maxlength="50">  </td>
            </tr>
            <tr>
                <th>Event Time:</th>
                <td>  <input type="datetime" name="Event Time" maxlength="30">  </td>
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


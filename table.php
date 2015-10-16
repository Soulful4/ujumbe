<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10/3/2015
 * Time: 2:28 PM
 *
 */
?>

<?php
//This code runs if the form has been submitted
if (isset($_POST['submit'])) {
//This makes sure they did not leave any fields blank
    if (!$_POST['event_id'] | !$_POST['event_venue'] | !$_POST['event_typeID'] )
    {
        die('You did not complete all of the required fields');
    }
// checks if the username is in use
    if (!get_magic_quotes_gpc())
    {
        $_POST['event_id'] = addslashes($_POST['event_id']);
    }
    $usercheck = $_POST['event_id'];

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
    // insert it into the database
    $insert = "INSERT INTO users (event_id, event_venue, event_typeID, event_description, event_tag, event_time)  VALUES ('".$_POST['event_id']."', '".$_POST['event_venue']."', '".$_POST['event_typeID']."', '".$_POST['event_time']."', '".$_POST['event_description']."', '".$_POST['event_tag']."')";
    $add_member = mysql_query($insert);

    ?>
    <h1>Registered</h1>
    <p>Thank you, you have registered the Events Succefully</a>.
    </p>


    <?php
}
else
{
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <center>
            <br>EVENT DETAILS </br>
            <table border="100">
        </center>
        <table border="5">
            <tr>
                <th>Event ID:</th>
                <td>  <input type="int" name="event_id" maxlength="60">  </td>
            </tr>
            <tr>
                <th>Event Name:</th>
                <td>  <input type="text" name="event_name" maxlength="30">  </td>
            </tr>
            <tr>
                <th>Event Venue:</th>
                <td>  <input type="text" name="event_venue" maxlength="50">  </td>
            </tr>
            <tr>
                <th>Event TypeID:</th>
                <td>  <input type="int" name="event_typeID" maxlength="50">  </td>
            </tr>
            <tr>
                <th>Event Description:</th>
                <td>  <input type="text" name="event_description" maxlength="100">  </td>
            </tr>
            <tr>
                <th>Event Tag:</th>
                <td>  <input type="text" name="event_tag" maxlength="50">  </td>
            </tr>
            <tr>
                <th>Event Time:</th>
                <td>  <input type=datetime name="event_time" maxlength="50">  </td>
            </tr>

            <tr>
                <th colspan=2><input type="submit" name="submit"  value="Register"></th></tr>
        </table>
    </form>
<?php  } ?>


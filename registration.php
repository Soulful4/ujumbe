<?php
// Connects to your Database
require('connect.php');
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
    //added a comment
    // here we encrypt the password and add slashes if needed
    $_POST['pass'] = md5($_POST['pass']);
    if (!get_magic_quotes_gpc())
    {
        $_POST['pass'] = addslashes($_POST['pass']);
        $_POST['username'] = addslashes($_POST['username']);
    }
    // now we insert it into the database
    echo "INSERT INTO users ( username, password, fname, lname, usertype_id ) VALUES ('".$_POST['username']."', '".$_POST['pass']."','".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['usertype_id']."')";exit;
    $insert = "INSERT INTO users ( username, password, fname, lname, usertype_id ) VALUES ('".$_POST['username']."', '".$_POST['pass']."','".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['usertype_id']."')";
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
                <th>First Name:</th>
                <td> <input type="Text"name ="fname" maxlenghth="60" </td>
            </tr>
            <tr>
                <th>Last Name:</th>
                <td> <input type="Text"name ="lname" maxlenghth="60" </td>
            </tr>

            <tr>
                <th>Username:</th>
                <td>  <input type="text" name="username" maxlength="60">  </td>
            </tr>
            <tr>
                <th>Usertype:</th>
                <td> <input type="option" name ="Usertype" maxlenghth="20" </td>

                <select name="usertype_id">
                    <option value="Student" </option>
                    <option value="Administrator" </option>
                    <option value="Staff" </option>
                </select>

            </tr>

        <tr>
                <th>Password:</th>
                <td>  <input type="password" name="pass" maxlength="10">  </td>
            </tr>
            <tr>
                <th>Confirm Password:</th>
                <td>  <input type="password" name="pass2" maxlength="10">  </td>
            </tr>
            <tr>
                <th colspan=2><input type="submit" name="submit"  value="Register"></th></tr>
        </table>
    </form>
<?php  } ?>
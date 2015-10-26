<?php
require ('connect.php');

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
    $insert = "INSERT INTO users ( username, password, fname, lname, usertype_id)  VALUES ('".$_POST['username']."', '".$_POST['pass']."','".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['usertype_id']."')";
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
    <head>
        <!--Bootstrap Files-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    </head>
    <body>

    <form class ="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="First Name" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control focus" name="First Name" maxlength="60">
            </div>
        </div>
        <div class="form-group">
            <label for="Last Name" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control focus" name="Last Name" maxlength="60">
            </div>
        </div>
        <div class="form-group">
            <label for="Username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control focus" name="Username" maxlength="60">
            </div>
        </div>
            <?php
            $usertypes = "";
            ?>
        <div class="form-group">
            <label for="Usertype ID" class="col-sm-2 control-label">Usertype ID</label>
            <div class="col-sm-4">
                <input type="int" class ="form-control focus" name="Usertype ID" maxlength="60">
            </div>
        </div>
        <div class="form-group">
            <label for="Password" class="col-sm-2 control-label input-success">Password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" maxlegnth="60">
            </div>
        </div>
        <div class="form-group">
            <label for="Confirm Password" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-4">
                <input type="password" class ="form-control focus" name="pass2" maxlength="60">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Register</button>
            </div>
        </div>
    </form>
    </body>
<?php  } ?>
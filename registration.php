5<?php
// Connects to your Database
//require('connect.php');
$con=mysqli_connect("localhost","root","","ujumbe");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
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

    $check = mysqli_query($con,"SELECT username FROM users WHERE username = '$usercheck'");
    $check2 = mysqli_num_rows($check);

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

    $add_member = mysqli_query($con,$insert);

    ?>
    <h1>Registered</h1>
    <p>Thank you, you have registered -<a href =  index.php> you may now login</a>.
    </p>


    <?php
}
else
{
    ?>
    <head>
        <!--Bootstrap Files-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <style type="text/css">
            body {
                background:#eee} /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
        </style>

    </head>
    <body>
<div class ="container">
    <center>
    <h1> Registration Form</h1>
        </center>
    <div  style="margin-top: 200px; margin-bottom: 100px; margin-left: 360px; margin-right: 100px ">
    <form class ="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="First Name" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-4 ">
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
                <select name = "usertype_id">
                <?php
                $usertypes = mysqli_query($con, "Select * from usertypes");
                while ($types = mysqli_fetch_array($usertypes)){
                        echo "<option value =".$types['id']." >".$types['description']."</option>";
                }
                ?>
                </select>
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
                <button type="submit" name="submit" class="btn btn-default">Register</button>
            </div>
        </div>
    </form>
        </div>
</div>
    </body>
<?php  } ?>
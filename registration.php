 <?php
// Connects to your Database
//require('connect.php');
$con=mysqli_connect("localhost","root","ichigoojenge","ujumbe");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_POST['submit'])) {

    $usercheck = $_POST['username'];
    $password = md5($_POST['password']);

    $check = mysqli_query($con,"SELECT username FROM users WHERE username = '$usercheck'");
    $check2 = mysqli_num_rows($check);

    //if the name exists it gives an error
    if ($check2 != 0)
    {
        die('Sorry, the username '.$_POST['username'].' is already in use.');
    }
    //  this makes sure both passwords entered match
    if ($_POST['password'] != $_POST['password2'])
    {
        die('Your passwords did not match. ');
    }
    // here we encrypt the password and add slashes if needed



   // echo $_POST['password'];exit;
    // now we insert it into the database
    $insert = "INSERT INTO users ( username, password, fname, lname, usertype_id)  VALUES ('".$_POST['username']."', '".$password."','".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['usertype_id']."')";

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

    </head>
    <body>

    <form class ="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="First Name" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control focus" name="fname" maxlength="60" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Last Name" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control focus" name="lname" maxlength="60" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control focus" name="username" maxlength="60" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Usertype ID" class="col-sm-2 control-label">Usertype:</label>
            <div class="col-sm-4">
                <select name ="usertype_id">
                    <?php
                    $usertypes = mysqli_query($con, "Select * from usertypes");
                    while ($types = mysqli_fetch_array ($usertypes)){
                        echo "<option value =".$types['description']."  >".$types['description']."</option>";
                    }

                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="Password" class="col-sm-2 control-label input-success">Password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" name="password" maxlength="60" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Confirm Password" class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-4">
                <input type="password" class ="form-control focus" name="password2" maxlength="60" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-default">Register</button>
            </div>
        </div>
    </form>
    </body>
<?php  } ?>
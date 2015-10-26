<?php
// Connects to your Database
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("ujumbe") or die(mysql_error());
//Checks if there is a login cookie
if(isset($_COOKIE['ID_my_site']))
//if there is, it logs you in and directs you to the members page
{

          $username = $_COOKIE['ID_my_site'];
    $pass = $_COOKIE['Key_my_site'];
    $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
    while($info = mysql_fetch_array( $check ))
    {
        if ($pass != $info['password'])
        {
        }
        else
    {
            header("Location: members.php");
        }
    }
}
//if the login form is submitted
if (isset($_POST['submit']))
{
// if form has been submitted
// makes sure they filled it in
if(!$_POST['username'] | !$_POST['pass'])
{
    die('You did not fill in a required field.');
}
// checks it against the database
/*if (!get_magic_quotes_gpc())
{
    $_POST['email'] = addslashes($_POST['email']);
}*/
    $check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());
    //Gives error if user doesn't exist
    $check2 = mysql_num_rows($check);
    if ($check2 == 0)
    {
        die('That user does not exist in our database. <a href=registration.php>Click Here to Register</a>');
    }
    while($info = mysql_fetch_array( $check ))
    {
        var_dump($check);
        exit;
        $_POST['pass'] = stripslashes($_POST['pass']);
        $info['password'] = stripslashes($info['password']);
        $_POST['pass'] = md5($_POST['pass']);
        //gives error if the password is wrong
        if ($_POST['pass'] != $info['password'])
        {
            die('Incorrect password, please try again.');
        }
        else
        {
        // if login is ok then we add a cookie
        $_POST['username'] = stripslashes($_POST['username']);

            $hour = time() + 3600;
//            setcookie(ID_my_site, $_POST['username'], $hour);
//            setcookie(Key_my_site, $_POST['pass'], $hour);
//            //then redirect them to the members area
            header("Location: table.php");
        }
    }
}
else
{
// if they are not logged in   ?>
    <head>
        <!--Bootstrap Files-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <style type="text/css">
            body {
                background:#ced2d8} /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
        </style>

    </head>
    <body>
    <div  style="margin-top: 200px; margin-bottom: 100px; margin-left: 360px; margin-right: 100px ">
        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            
            <div class="form-group">
                <label for="Username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                    <input type="int" class ="form-control" name="Username" maxlength="60">
                </div>
            </div>
            <div class="form-group">
                <label for="Password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                    <input type="password" class ="form-control" name="password" maxlength="60">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Login</button>
                </div>
            </div>

        </form>

    </div>

    </body>
<?php   }     ?>



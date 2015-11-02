<?php
error_reporting(E_ALL & ~E_NOTICE);
// Connects to your Database
$con=mysqli_connect("localhost","root","ichigoojenge","ujumbe");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//if the login form is submitted
if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $check = "SELECT * FROM users WHERE username = '$username' and password='$password'";
    $query = mysqli_query($con,$check);
    $content = mysqli_num_rows($query);


    while(mysqli_fetch_row($query)){

    }

    $content=mysqli_fetch_row($query);
   // echo "<pre>";print_r($content);exit;

   // var_dump($query);exit;



    if(@mysqli_num_rows($check) > 0 ){

        if ($info['usertype_id'] == 1 ) {

            header("Location: events.php");

        }
        elseif ($info['usertype_id'] == 3) {

            header("Location: table.php");
        }
        elseif ($info['usertype_id'] == 2) {

            header("Location: events.php");
        }


    }
    else
        {
            $msg= 'Incorrect password, please try again.';
        }

}else{


?>
    <head>
        <!--Bootstrap Files-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="js/jquery-1.11.3.min.js"></script>
        <style type="text/css">
            body {
                background:#ced2d8} /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
        </style>

    </head>
    <body>
    <div  style="margin-top: 200px; margin-bottom: 100px; margin-left: 360px; margin-right: 100px ">
        <?php if($msg!='') { ?>
        <div class="alert-warning">
                <?php echo $msg; ?>
        </div>
    <?php } ?>
        <form class="form-horizontal" id="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> <!-- -->

            <div class="form-group">
                <label for="Username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-4">
                    <input type="text" class ="form-control" name="username" maxlength="60" placeholder="username" required>
                </div>
            </div>
            <div class="form-group">
                <label for="Password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-4">
                    <input type="password" class ="form-control" name="password" maxlength="60" placeholder="password" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="form_submit" class="btn btn-default" name="submit">Login</button>
                </div>
            </div>

        </form>

    </div>
    </body>
<?php } ?>
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
// Connects to your Database
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
    $insert = "INSERT INTO users (username, password)  VALUES ('".$_POST['event_id']."', '".$_POST['event_venue']."', '".$_POST['event_typeID']."', '".$_POST['event_time']."', '".$_POST['event_description']."', '".$_POST['event_tag']."')";
    $add_member = mysqli_query($con, $insert);

    ?>
    <h1>Registered</h1>
    <p>Thank you, you have registered the Events Succefully</a>.
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
                <label for="EventID" class="col-sm-2 control-label">Event ID</label>
                <div class="col-sm-4">
                    <input type="int" class ="form-control" name="event_id" maxlength="60">
                </div>
            </div>
            <div class="form-group">
                <label for="EventName" class="col-sm-2 control-label">Event Name</label>
                <div class="col-sm-4">
                    <input type="text" class ="form-control" name="event_name" maxlength="60">
                </div>
            </div>

            <div class="form-group">
                <label for="EventVenue" class="col-sm-2 control-label">Event Venue</label>
                <div class="col-sm-4">
                    <input type="text" class ="form-control" name="event_venue" maxlength="60">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class='col-sm-6'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker2'>
                                <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker2').datetimepicker({
                                locale: 'ru'
                            });
                        });
                    </script>
                </div>
            </div>
            <div class="form-group">
                <label for="EventDescription" class="col-sm-2 control-label">Event Description</label>
                <div class="col-sm-4">
                    <input type="int" class ="form-control" name="event_description" maxlength="60">
                </div>
            </div>
            <div class="form-group">
                <label for="EventType ID" class="col-sm-2 control-label">EventType ID</label>
                <div class="col-sm-4">
                    <input type="int" class ="form-control" name="event type ID" maxlength="60">
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


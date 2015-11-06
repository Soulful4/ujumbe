<?php
// Connects to your Database
$con=mysqli_connect("localhost","root","","ujumbe");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_POST['submit'])) {

    $usercheck = $_POST['event_name'];

    $check = mysqli_query($con,"SELECT event_name FROM events WHERE event_name = '$usercheck'");
    $check2 = mysqli_num_rows($check);

    //if the name exists it gives an error
    if ($check2 != 0)
    {
        die('Sorry, the Event Name '.$_POST['event_name'].' is already in use.');
    }
    // insert it into the database
    $insert = "INSERT INTO events (event_name,event_faculty,event_venue,event_date,event_time,event_description)  VALUES ('".$_POST['event_name']."','".$_POST['event_faculty']."','".$_POST['event_venue']."', '".$_POST['event_date']."', '".$_POST['event_time']."', '".$_POST['event_description']."')";

   // echo $insert;exit;
    $add_member = mysqli_query($con, $insert);

    ?>
    <h1>Registered</h1>
    <p>Thank you, you have registered the Events Successfully</a>.
    </p>


    <?php
}
else
{
    ?>
    <head>
        <!--Bootstrap Files-->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <style>
          body {
              background-image: url("blah.jpg");
                color:white;

            }
            </style>

    </head>
    <body>
  <center> <h1>Event Registration</h1> </center>
    <div  style="margin-top: 180px; margin-bottom: 100px; margin-left: 400px; margin-right: 100px ">
    <form class ="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="EventName" class="col-sm-2 control-label">Event Name</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control" name="event_name" maxlength="60" required>
            </div>
        </div>
        <div class="form-group">
            <label for="Event Faculty" class="col-sm-2 control-label">Event Faculty</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control" name="event_faculty" maxlength="60" required>
            </div>
        </div>
        <div class="form-group">
            <label for="EventVenue" class="col-sm-2 control-label">Event Venue</label>
            <div class="col-sm-4">
                <input type="text" class ="form-control" name="event_venue" maxlength="60" required>
            </div>
        </div>

        <div class="form-group">
            <label for="Event date" class="col-sm-2 control-label">Event Date</label>
            <div class="col-sm-4">
                <input type="date" class ="form-control" name="event_date" maxlength="60" required>
            </div>
        </div>

        <div class="form-group">
            <label for="Event time" class="col-sm-2 control-label">Event Time</label>
            <div class="col-sm-4">
                <input type="time" class ="form-control" name="event_time" maxlength="60" required>
            </div>
        </div>

        <div class="form-group">
            <label for="EventDescription" class="col-sm-2 control-label">Event Description</label>
            <div class="col-sm-4">
                <input type="int" class ="form-control" name="event_description" maxlength="60"required>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
            </div>
        </div>

    </form>
    </body>
<?php  } ?>


<?php
// Connects to your Database
 require ('connect.php');

if (isset($_POST['submit'])) {
    echo "it works";exit;
    $eventname = $_POST['event_name'];
    $check = mysqli_query($con,"SELECT event_name FROM events WHERE event_name = '$eventname'");
    $check2 = mysqli_num_rows($check);

    //if the name exists it gives an error
    if ($check2 != 0)
    {
        die('Sorry, the event '.$_POST['event_name'].' is already in use.');
    }

    // insert it into the database
    $insert = "INSERT INTO events (event_venue, event_typeID, event_time, event_description, event_name)  VALUES ('".$_POST['event_venue']."', '".$_POST['event_typeID']."', '".$_POST['event_time']."', '".$_POST['event_description']."', '".$_POST['event_tag']."', '".$_POST['event_id']."', '".$_POST['event_name']."')";
    echo $insert;
    exit;
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

    </head>
    <body>
        <form class ="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


<!--             <div class="form-group">-->
<!--                <label for="EventID" class="col-sm-2 control-label">Event ID</label>-->
<!--                <div class="col-sm-4">-->
<!--                    <input type="int" class ="form-control" name="event_id" maxlength="60">-->
<!--                </div>-->
<!--            </div>-->
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
            <div class="form-group">
                <label for="EventTypeID" class="col-sm-2 control-label">Event Type ID</label>
                <div class="col-sm-4">
                    <input type="int" class ="form-control" name="event_typeID" maxlength="60">
                </div>
            </div>
            <div class="form-group">
                <label for="EventDescription" class="col-sm-2 control-label">Event Description</label>
                <div class="col-sm-4">
                    <input type="int" class ="form-control" name="event_description" maxlength="60">
                </div>
            </div>
            <div class="form-group">
                <label for="EventDate" class="col-sm-2 control-label">Event Date & Time</label>
                <div class="col-sm-4">
                    <input type="int" class ="form-control" name="event_time" maxlength="60">
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


 <?php


    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table border="5">
            <tr>
                <th>Event ID:</th>
                <td>  <input type="int" name="Event ID" maxlength="60">  </td>
            </tr>
            <tr>
                <th>Event Name:</th>
                <td>  <input type="text" name="Event Name" maxlength="30">  </td>
            </tr>
            <tr>
            <th> Event TypeID:</th>
                <td> <input type="text" name="Event TypeID" maxlength="30"> </td>
            </tr>
                <tr>
                    <th>Event Faculty:</th>
                <td>  <input type="option" name="Event Faculty" maxlength="20">  
				<select name="Faculty">
    <option value="FIT"></option>
    <option value="SMC"></option>
    <option value="SFAE"></option>
    <option value="LAW"></option>
  </select>	
				</td>
				
  <input type="submit" value="Submit">
            </tr>
            <tr>
                <th>Event Venue:</th>
                <td>  <input type="text" name="Event Venue" maxlength="50"></td>
            </tr>
            <tr>
                <th>Event Time:</th>
                <td>  <input type="datetime" name="Event Time" maxlength="30">  </td>
            </tr>
            <tr>
                <th>Event Description:</th>
                <td>  <input type="text" name="Event Description" maxlength="100">  </td>
            </tr>
            <tr>
                <th>Event Tag:</th>
                <td>  <input type="text" name="Event Tag" maxlength="50">  </td>
            </tr>

            <tr>
                <th colspan=2><input type="submit" name="submit"  value="Register"></th></tr>
        </table>
    </form>
<?php   ?>


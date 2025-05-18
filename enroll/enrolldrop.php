<?php
require("../include/conn.php");

$vstudentnumber = $_POST['txtstudentnumber'];
$vcourse_code = $_POST['txtcourse_code'];

$sql = "SELECT * FROM tblstudent where fldstudentnumber='$vstudentnumber'  order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $vstudentindex=$row['fldindex'];
                $vlastname=$row['fldlastname'];					
                $vfirstname=$row['fldfirstname'];			
                $vmiddlename=$row['fldmiddlename'];		
                $vprogramofstudy=$row['fldprogramofstudy'];	
                
            }
        }

$sql2 = "SELECT * FROM tblcourse where course_code='$vcourse_code'  order by fldindex";
        $result2 = $conn->query($sql2);
        if($result2->num_rows > 0) 
        {
            while($row2 = $result2->fetch_assoc())
            {
                $vcourseindex=$row2['fldindex'];
                $vcourse_title=$row2['course_title'];			
                $vunits=$row2['units'];			
                
            }
        }

?>

<html>
<body>
<form action="enrolldrop-save.php" method="post">
    <table border="1" style="width: auto; height: auto;" align=center>  
        <tr>
            <td colspan="2" align="center">
                <b>Confirm Drop Course</b>
            </td>
        </tr>

        <tr>
            <td><label>Student Number:</label></td>
            <td>
                <input type="hidden" name="txtstudentnumber" value="<?php echo $vstudentnumber; ?>">
                <input type="text" readonly value="<?php echo $vstudentnumber; ?>">
            </td>
        </tr>

        <tr>
            <td><label>Last Name:</label></td>
            <td><input type="text" readonly value="<?php echo $vlastname; ?>"></td>
        </tr>

        <tr>
            <td><label>First Name:</label></td>
            <td><input type="text" readonly value="<?php echo $vfirstname; ?>"></td>
        </tr>

        <tr>
            <td><label>Middle Name:</label></td>
            <td><input type="text" readonly value="<?php echo $vmiddlename; ?>"></td>
        </tr>

        <tr>
            <td><label>Program of Study:</label></td>
            <td><input type="text" readonly value="<?php echo $vprogramofstudy; ?>"></td>
        </tr>

        <input type="hidden" name="studentindex" value="<?php echo $vstudentindex; ?>">
        <input type="hidden" name="courseindex" value="<?php echo $vcourseindex; ?>">


        <tr>
            <td><label>Course Code:</label></td>
            <td>
                <input type="hidden" name="course_code" value="<?php echo $vcourse_code; ?>">
                <input type="text" readonly value="<?php echo $vcourse_code; ?>">
            </td>
        </tr>

        <tr>
            <td><label>Course Name:</label></td>
            <td><input type="text" readonly value="<?php echo $vcourse_title; ?>"></td>
        </tr>

        <tr>
            <td><label>Units:</label></td>
            <td><input type="text" readonly value="<?php echo $vunits; ?>"></td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Drop Course" />
                <button type="button" onclick="window.history.back()">Cancel</button>
            </td>
        </tr>
    </table>
</form>
</body>
</html>
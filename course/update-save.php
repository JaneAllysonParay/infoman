<?php
require("../include/conn.php");

$vcourse_code=$_POST['txtcourse_code'];
$vcourse_title=$_POST['txtcourse_title'];
$vunits=$_POST['txtunits'];

$vindex=0;

$sql = "UPDATE tblcourse SET course_code='$vcourse_code', course_title='$vcourse_title', units='$vunits' WHERE course_code='$vcourse_code'";
                    if ($conn->query($sql) === TRUE) 
                    {
                        //echo "Record updated successfully";
                    } 
                    else 
                    {
                        //echo "Error updating record: " . mysqli_error($conn);
                    }
?>
<script>
    alert("Record Updated.");								
</script>
<meta  http-equiv="refresh" content=".000001;url=course.php" />
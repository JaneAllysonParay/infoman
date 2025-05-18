<?php
require("../include/conn.php");

$vcourse_code=$_POST['txtcourse_code'];
$vcourse_title=$_POST['txtcourse_title'];
$vunits=$_POST['txtunits'];

$vindex=0;

$sql = "DELETE FROM tblcourse WHERE course_code='$vcourse_code'";

if ($conn->query($sql) === TRUE) {
  // echo "Record deleted successfully";
} else {
  // echo "Error deleting record: " . $conn->error;
}
?> 
<script>
    alert("Record Saved.");								
</script>
<meta  http-equiv="refresh" content=".000001;url=course.php" />
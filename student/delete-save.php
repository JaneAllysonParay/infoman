<?php
require("../include/conn.php");

$vstudentnumber=$_POST['txtstudentnumber'];
$vlastname=$_POST['txtlastname'];
$vfirstname=$_POST['txtfirstname'];
$vmiddlename=$_POST['txtmiddlename'];
$vprogramofstudy=$_POST['txtprogramofstudy'];

$vindex=0;

$sql = "DELETE FROM tblstudent WHERE fldstudentnumber='$vstudentnumber'";

if ($conn->query($sql) === TRUE) {
  // echo "Record deleted successfully";
} else {
  // echo "Error deleting record: " . $conn->error;
}
?> 

<script>
    alert("Record Deleted.");								
</script>
<meta  http-equiv="refresh" content=".000001;url=student.php" />
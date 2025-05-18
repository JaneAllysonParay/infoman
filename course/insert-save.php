<?php
require("../include/conn.php");

$vcourse_code=$_POST['txtcourse_code'];
$vcourse_title=$_POST['txtcourse_title'];
$vunits=$_POST['txtunits'];

$vindex=0;

$sql = "SELECT * FROM tblcourse  order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vindex=$row['fldindex'];			
                
            }
        }
        $vindex=$vindex+1;

$sql="INSERT INTO tblcourse (fldindex, course_code, course_title, units) VALUES ('$vindex', '$vcourse_code', '$vcourse_title', '$vunits')";
if ($conn->query($sql) === TRUE) 
{
} 
else 
{            
} 

?>
<script>
    alert("Record Saved.");								
</script>
<meta  http-equiv="refresh" content=".000001;url=course.php" />
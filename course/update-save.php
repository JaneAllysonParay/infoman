<?php
require("../include/conn.php");

$vcourse_code=$_POST['txtcourse_code'];
$vcourse_title=$_POST['txtcourse_title'];
$vunits=$_POST['txtunits'];
$vcoursecodeold=$_POST['txtcoursecodeold'];

$vindex=$_POST['txtindex'];

$vdup=0;
if($vcourse_code == $vcoursecodeold)
{

    $vdup = 0;
}
else
{
    $sql = "SELECT * FROM tblcourse WHERE course_code='$vcourse_code' ORDER BY fldindex";
    $result = $conn->query($sql);   
    if($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc())
        {
            $vdup = 1;
        }
    }
    
}

if($vdup == 0)
{
    $sql = "UPDATE tblcourse SET course_code='$vcourse_code', course_title='$vcourse_title', units='$vunits' WHERE course_code='$vcoursecodeold'";
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
<?php
}
else
{
    ?>
    <script>
    alert("Duplicate Course Code.");								
    </script>
    <meta  http-equiv="refresh" content=".000001;url=update.php?vid=<?php echo $vcoursecodeold; ?>" />
<?php
}
?>


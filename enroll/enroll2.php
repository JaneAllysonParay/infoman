<?php
require("../include/conn.php");

$vstudentindex=$_REQUEST['vid'];
$vcourseindex=$_REQUEST['vid1'];
$vstudentnumber=$_REQUEST['vid2'];

$vindex=0;

$vdupcourse=0;



$sql = "SELECT * FROM tbllist order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vindex=$row['fldindex'];			
                
            }
        }
        $vindex=$vindex+1;

$sql = "SELECT * FROM tbllist WHERE fldstudentindex='$vstudentindex' AND fldcourseindex='$vcourseindex'";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vdupcourse=1;		
                
            }
        }

if($vdupcourse ==  0){
    $sql="INSERT INTO tbllist (fldindex, fldstudentindex, fldcourseindex) VALUES ('$vindex', '$vstudentindex', '$vcourseindex')";
    if ($conn->query($sql) === TRUE) 
    {
    } 
    else 
    {            
    } 

?>
    <script>
        alert("Student Enrolled.");								
    </script>
    <meta  http-equiv="refresh" content="0.00001;url=enroll1.php?vid=<?php echo $vstudentnumber; ?>" />
    <?php
}else{
    ?>
    <script>
    alert("You are already enrolled in this course.");								
    </script>
    <meta  http-equiv="refresh" content="0.00001;url=enroll1.php?vid=<?php echo $vstudentnumber; ?>" />
    <?php
}
?>



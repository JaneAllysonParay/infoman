<?php
require("../include/conn.php");

$vcourse_code = $_POST['txtcourse_code'];
$vcourse_title = $_POST['txtcourse_title'];
$vunits = $_POST['txtunits'];

$vdup=0;
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

$sql = "SELECT * FROM tblcourse  WHERE course_code='$vcourse_code' order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vdup=1;		
                
            }
        }

if($vdup ==  0){
    $sql = "INSERT INTO tblcourse (fldindex, course_code, course_title, units) VALUES ('$vindex', '$vcourse_code', '$vcourse_title', '$vunits')";
    if ($conn->query($sql) === TRUE) {} 
        else {} 
        ?>
            <script>
                alert("Record Saved.");								
            </script>
            <meta  http-equiv="refresh" content=".000001;url=course.php" />
        <?php
}else{
    ?>
    <script>
    alert("Duplicate Course Code.");								
    </script>
    <meta  http-equiv="refresh" content=".000001;url=insert.php" />
    <?php
}
?>
<?php
require("../include/conn.php");

$vstudentnumber = $_POST['txtstudentnumber'];
$vcourse_code = $_POST['course_code'];

$sql = "SELECT fldindex FROM tblstudent WHERE fldstudentnumber='$vstudentnumber'  order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $vstudentindex = $row['fldindex'];
            }
        }

$sql2 = "SELECT fldindex FROM tblcourse WHERE course_code='$vcourse_code' order by fldindex";
        $result2 = $conn->query($sql2);
        if($result2->num_rows > 0) 
        {
            while($row2 = $result2->fetch_assoc())
            {
                
                $vcourseindex = $row2['fldindex'];
                
            }
        }

$sql_delete = "DELETE FROM tbllist 
               WHERE fldstudentindex='$vstudentindex' AND fldcourseindex='$vcourseindex'";

if ($conn->query($sql_delete) === TRUE) {
    ?>
    <script>
        alert("Course dropped successfully.");
        window.location.href = "enrollview.php?vid=<?php echo $vstudentnumber; ?>";
    </script>
    <?php
} else {
    ?>
    <script>
        alert("Error dropping course: <?php echo $conn->error; ?>");
        window.location.href = "enrollview.php?vid=<?php echo $vstudentnumber; ?>";
    </script>
    <?php
}
?>
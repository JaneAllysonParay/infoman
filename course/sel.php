<?php
require("../include/conn.php");

$sql = "SELECT * FROM tblstudent order by fldindex desc";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vcourse_code=$row['course_code'];			
                $vcourse_title=$row['course_title'];	
                $vunits=$row['units'];	
                ?>
                <br>
                <?php
                echo $vcourse_code." - ".$vcourse_title.", ",$vunits;
                
            }
        }
?>
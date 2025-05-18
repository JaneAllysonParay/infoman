<?php
require("../include/conn.php");

$sql = "SELECT * FROM tblstudent order by fldindex desc";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vstudentnumber=$row['fldstudentnumber'];			
                $vlastname=$row['fldlastname'];	
                $vfirstname=$row['fldfirstname'];	
                $vmiddlename=$row['fldmiddlename'];
                $vprogramofstudy=$row['fldprogramofstudy'];	
                ?>
                <br>
                <?php
                echo $vstudentnumber." - ".$vlastname.", ",$vfirstname. " - ",$vprogramofstudy;
                
            }
        }
?>
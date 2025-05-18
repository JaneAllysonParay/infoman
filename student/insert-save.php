<?php
require("../include/conn.php");

$vstudentnumber=$_POST['txtstudentnumber'];
$vlastname=$_POST['txtlastname'];
$vfirstname=$_POST['txtfirstname'];
$vmiddlename=$_POST['txtmiddlename'];
$vprogramofstudy=$_POST['txtprogramofstudy'];

$vindex=0;
$vdup=0;

$sql = "SELECT * FROM tblstudent  order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vindex=$row['fldindex'];			
                
            }
        }
        $vindex=$vindex+1;

$sql = "SELECT * FROM tblstudent where fldstudentnumber ='$vstudentnumber' order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vdup=1;			
                
            }
        }

if($vdup==0)
{
     $sql="INSERT INTO tblstudent (fldindex, fldstudentnumber, fldlastname, fldfirstname, fldmiddlename, fldprogramofstudy) VALUES ('$vindex', '$vstudentnumber', '$vlastname', '$vfirstname', '$vmiddlename', '$vprogramofstudy')";
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
        <meta  http-equiv="refresh" content=".000001;url=student.php" />

<?php
}
else{
?>
        <script>
            alert("Duplicate Student Number.");								
        </script>
        <meta  http-equiv="refresh" content=".000001;url=insert.php" />
        <?php
}

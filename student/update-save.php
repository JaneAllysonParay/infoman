<?php
require("../include/conn.php");

$vstudentnumber=$_POST['txtstudentnumber'];
$vstudentnumberold=$_POST['txtstudentnumberold'];
$vlastname=$_POST['txtlastname'];
$vfirstname=$_POST['txtfirstname'];
$vmiddlename=$_POST['txtmiddlename'];
$vprogramofstudy=$_POST['txtprogramofstudy'];

$vindex=$_POST['txtindex'];
$vdup=0;

if($vstudentnumber==$vstudentnumberold){
    $vdup=0;
}
else{
    $sql = "SELECT * FROM tblstudent where fldstudentnumber ='$vstudentnumber' order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vdup=1;			
                
            }
        }
}

if($vdup==0)
{
$sql = "UPDATE tblstudent SET fldstudentnumber='$vstudentnumber', fldlastname='$vlastname',fldfirstname='$vfirstname',fldmiddlename='$vmiddlename',fldprogramofstudy='$vprogramofstudy' WHERE fldstudentnumber='$vstudentnumberold'";
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
    <meta  http-equiv="refresh" content=".000001;url=student.php" />

<?php
}
else{
?>
    <script>
        alert("Duplicate Student Number.");								
    </script>
    <meta  http-equiv="refresh" content=".000001;url=update.php?vid=<?php echo $vstudentnumberold; ?>" />
<?php
}
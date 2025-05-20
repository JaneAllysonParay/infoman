<?php
require("../include/conn.php");
$vsearch=$_POST['txtsearch'];
?>
<table border="1" style="width: 80%; height: auto;" align=center>
<tr>
<td colspan="6" align=center>
    <b>Enroll Students</b>    
</td>
</tr>

<form action="search.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
    <tr>
        <td colspan="6" align=center>
            <input type="text" name="txtsearch" id="txtsearch">
            <input type="submit" value="Search Record" />
        </td>
    </tr>
</form>

<?php
$sql = "SELECT * FROM tblstudent where fldstudentnumber='$vsearch' || fldlastname='$vsearch' || fldfirstname='$vsearch' || fldmiddlename='$vsearch'|| fldprogramofstudy='$vsearch' order by fldindex";
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
                <tr>
                <td>
                <?php
                echo $vstudentnumber;
                ?>
                </td>
                <td>
                <?php
                echo $row['fldlastname'];	
                ?>
                </td>
                <td>
                <?php
                echo $vfirstname;
                ?>
                </td>
                <td>
                <?php
                echo $vmiddlename;
                ?>
                </td>
                <td>
                <?php
                echo $vprogramofstudy;
                ?>
                </td>
                    
                <td align=center>
                <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='update.php?vid=<?php echo $vstudentnumber; ?>'">Update</button>
                <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='delete.php?vid=<?php echo $vstudentnumber; ?>'">Delete</button>
                </td>

                </tr>
                <?php
            }
        } else {
            echo "<script>alert('No Records Found');</script>";
            echo "<tr><td colspan = '6' align = center>No Records Found</tr></td>";
        }
?>
<tr>
<td colspan="6" align=center>
    <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='enroll.php'">Display All</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='../index.php'">Back</button>
</td>
</tr>

</table>
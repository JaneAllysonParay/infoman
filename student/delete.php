<?php
require("../include/conn.php");
$vstudentnumber=$_REQUEST['vid'];

$sql = "SELECT * FROM tblstudent where fldstudentnumber='$vstudentnumber'  order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vlastname=$row['fldlastname'];			
                $vfirstname=$row['fldfirstname'];			
                $vmiddlename=$row['fldmiddlename'];			
                $vprogramofstudy=$row['fldprogramofstudy'];
            }
        }

?>
<html>
    <body>
    <form action="delete-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
        <table border="1">    
            <tr>
                <td colspan="2" align=center>
                    <b>Delete Student</b>
                </td>
            </tr>
            <tr>
                <td>
                <label >Enter Student Number:</label>
                </td>
                <td>
                <input readonly type="text" name="txtstudentnumber" id="txtstudentnumber" value="<?php echo $vstudentnumber; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Last Name:</label>
                </td>
                <td>
                <input readonly type="text" name="txtlastname" id="txtlastname" value="<?php echo $vlastname; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter First Name:</label>
                </td>
                <td>
                <input readonly type="text" name="txtfirstname" id="txtfirstname" value="<?php echo $vfirstname; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label>Enter Middle Name:</label>
                </td>
                <td>
                <input readonly type="text" name="txtmiddlename" id="txtmiddlename" value="<?php echo $vmiddlename; ?>">
                </td>
            </tr>

            <tr>
                <td>
                <label >Enter Program of Study:</label>
                </td>
                <td>
                <input readonly type="text" name="txtprogramofstudy" id="txtprogramofstudy" value="<?php echo $vprogramofstudy; ?>">
                </td>
            </tr>
            
            <tr>
                <td colspan="2" align=center>
                <input type="submit" value="Delete Record" />
                <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='student.php'">Back</button>
                </td>
            </tr>
        </table>
    </form>
        
    </body>
</html>
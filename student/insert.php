<?php
require("../include/conn.php");

$vstudentnumber="";
$vlastname="";
$vfirstname="";
$vmiddlename="";
$vprogramofstudy="";

?>
<html>
    <body>
    <form action="insert-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
        <table border="1">    
            <tr>
                <td colspan="2" align=center>
                    <b>Insert Student</b>
                </td>
            </tr>
            <tr>
                <td>
                <label >Enter Student Number:</label>
                </td>
                <td>
                <input type="text" name="txtstudentnumber" id="txtstudentnumber" value="<?php echo $vstudentnumber; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Last Name:</label>
                </td>
                <td>
                <input type="text" name="txtlastname" id="txtlastname" value="<?php echo $vlastname; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter First Name:</label>
                </td>
                <td>
                <input type="text" name="txtfirstname" id="txtfirstname" value="<?php echo $vfirstname; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Middle Name:</label>
                </td>
                <td>
                <input type="text" name="txtmiddlename" id="txtmiddlename" value="<?php echo $vmiddlename; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Program of Study:</label>
                </td>
                <td>
                <input type="text" name="txtprogramofstudy" id="txtprogramofstudy" value="<?php echo $vprogramofstudy; ?>">
                </td>
            </tr>

            <tr>
                <td colspan="2" align=center>
                <input type="submit" value="Save Record" />
                <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='student.php'">Back</button>
                </td>
            </tr>
            
        </table>
    </form>
        
    </body>
</html>
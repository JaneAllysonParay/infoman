<?php
require("../include/conn.php");
$vcourse_code=$_REQUEST['vid'];

$sql = "SELECT * FROM tblcourse WHERE course_code='$vcourse_code'  order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vcourse_code=$row['course_code'];
                $vcourse_title=$row['course_title']; 
                $vunits=$row['units'];		
        
            }
        }

?>
<html>
    <body>
    <form action="delete-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
        <table border="1">    
            <tr>
                <td colspan="2" align=center>
                    <b>Delete Course</b>
                </td>
            </tr>
            <tr>
                <td>
                <label >Enter Course Code:</label>
                </td>
                <td>
                <input readonly type="text" name="txtcourse_code" id="txtcourse_code" value="<?php echo $vcourse_code; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Course Title:</label>
                </td>
                <td>
                <input readonly type="text" name="txtcourse_title" id="txtcourse_title" value="<?php echo $vcourse_title; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Number of Units:</label>
                </td>
                <td>
                <input readonly type="text" name="txtunits" id="txtunits" value="<?php echo $vunits; ?>">
                </td>
            </tr>
            

            <tr>
                <td colspan="2" align=center>
                <input type="submit" value="Delete Record" />
                <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='course.php'">Back</button>
                </td>
            </tr>
        </table>
    </form>
        
    </body>
</html>
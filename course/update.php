<?php
require("../include/conn.php");
$vcourse_code=$_REQUEST['vid'];
$vcoursecodeold=$_REQUEST['vid'];

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
    <form action="update-save.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
        <input type="hidden" name="txtcoursecodeold" id="txtcoursecodeold" value="<?php echo $vcoursecodeold; ?>">
        <input type="hidden" name="txtindex" id="txtindex" value="<?php echo $vindex; ?>">
        <table border="1">    
            <tr>
                <td colspan="2" align=center>
                    <b>Update Course</b>
                </td>
            </tr>
            <tr>
                <td>
                <label >Enter Course Code:</label>
                </td>
                <td>
                <input type="text" name="txtcourse_code" id="txtcourse_code" value="<?php echo $vcourse_code; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Course Title:</label>
                </td>
                <td>
                <input type="text" name="txtcourse_title" id="txtcourse_title" value="<?php echo $vcourse_title; ?>">
                </td>
            </tr>
            
            <tr>
                <td>
                <label >Enter Number of Units:</label>
                </td>
                <td>
                <input type="text" name="txtunits" id="txtunits" value="<?php echo $vunits; ?>">
                </td>
            </tr>
            

            <tr>
                <td colspan="2" align=center>
                <input type="submit" value="Update Record" />
                <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='course.php'">Back</button>
                </td>
            </tr>
        </table>
    </form>
        
    </body>
</html>
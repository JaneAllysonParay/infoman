<?php
require("../include/conn.php");
$vstudentnumber=$_REQUEST['vid'];
$vstudentnumberold=$_REQUEST['vid'];

$sql = "SELECT * FROM tblstudent where fldstudentnumber='$vstudentnumber'  order by fldindex";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                $vstudentindex=$row['fldindex'];			
                $vlastname=$row['fldlastname'];			
                $vfirstname=$row['fldfirstname'];			
                $vmiddlename=$row['fldmiddlename'];		
                $vprogramofstudy=$row['fldprogramofstudy'];	
                
            }
        }

?>
<html>
    <body>
        <h4> Enlist Student </h4>
        <hr>
        Student Number: <?php echo $vstudentnumber; ?><br>
        Last Name: <?php echo $vlastname; ?><br>
        First Name: <?php echo $vfirstname; ?><br>
        Middle Name: <?php echo $vmiddlename; ?> <br>
        Program of Study: <?php echo $vprogramofstudy; ?><br>
        <hr>
        
        <table border="1">
<tr>
<td colspan="5" align=center>
    <b>Courses Offered</b>    
</td>
</tr>
<form action="search.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>        
    <tr>
        <td align=center colspan="2">
            <input type="text" name="txtsearch" id="txtsearch">    
        </td>
    
        <td align=center colspan="2">    
            <input type="submit" value="Search" />
        </td>
    </tr>
</form>                               
<?php
$sql = "SELECT * FROM tbllist where fldstudentindex='$vstudentindex' order by fldindex desc";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vcourseindex=$row['fldcourseindex'];			
                
                $sql1 = "SELECT * FROM tblcourse where fldindex='$vcourseindex' order by fldindex desc";
                $result1 = $conn->query($sql1);
                if($result1->num_rows > 0) 
                {
                    while($row1 = $result1->fetch_assoc())
                    {
                        $vcourse_code=$row1['course_code'];			        
                        $vcourse_title=$row1['course_title'];
                        $vunits=$row1['units'];			        
                    }
                }
                
                $vcourseindex=$row['fldcourseindex'];			

                
                
                
                ?>
                <tr>
                <td>
                <?php
                echo $vcourse_code;
                ?>
                </td>
                <td>
                <?php
                echo $vcourse_title;	
                ?>
                </td>
                <td>
                <?php
                echo $vunits	
                ?>
                </td>
                    
                <td>
                    <form action="enrolldrop.php" method="post">
                    <input type="hidden" name="txtstudentnumber" value="<?php echo $vstudentnumber; ?>">
                    <input type="hidden" name="txtcourse_code" value="<?php echo $vcourse_code; ?>">
                    <button type="submit">Drop</button>
                    </form> 
                </td>
                
                </tr>
                <?php
            }
        }
?>
<tr>
<td colspan="5" align=center>
    <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='student.php'">Display All</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='tcpdf6/examples/aaarepstudent.php'">Print</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='enroll.php'">Back</button>
    <a href="tcpdf6/examples/aaarepstudent.php" target="_blank"> Print</a>
</td>
</tr>

</table>

        
    </body>
</html>
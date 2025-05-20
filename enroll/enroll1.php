<?php
require("../include/conn.php");
$vstudentnumber=$_REQUEST['vid'];
$vstudentnumberold=$_REQUEST['vid'];

$vlastname = "";
$vfirstname = "";
$vmiddlename = "";
$vstudentindex = 0;

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
$sql = "SELECT * FROM tblcourse order by fldindex ";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
                $vcourseindex=$row['fldindex'];			
                $vcourse_code=$row['course_code'];	
                $vcourse_title=$row['course_title'];	
                $vunits=$row['units'];	
	                
                
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
                echo $vunits;
                ?>
                </td>
                    
                <td>
                <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='enroll2.php?vid=<?php echo $vstudentindex; ?>&vid1=<?php echo $vcourseindex; ?>&vid2=<?php echo $vstudentnumber; ?>'">Enroll</button>
                </td>
                
                </tr>
                <?php
            }
        }
?>
<tr>
<td colspan="5" align=center>
    <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='student.php'">Display All</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='../tcpdf6/examples/aaarepcourse.php'">Print</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='enroll.php'">Back</button>
</td>
</tr>

</table>

        
    </body>
</html>
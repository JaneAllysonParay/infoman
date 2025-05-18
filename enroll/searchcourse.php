<?php
require("../include/conn.php");

$vsearch=$_POST['txtsearch'];
?>
<table border="1">
<tr>
<td colspan="6" align=center>
    <b>Student Course</b>    
</td>
</tr>

</tr>
<form action="searchcourse.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
<tr>
<td colspan="4">
<input type="text" name="txtsearch" id="txtsearch">
        </td>
            <td align = center colspan="2">
            <input type="submit" value="Search" />
</td>
</tr>
<?php
$sql = "SELECT * FROM tblcourse where course_code='$vsearch' || course_title='$vsearch' || units='$vsearch' order by fldindex desc";
        $result = $conn->query($sql);
        if($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc())
            {
                
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
        else  { echo '<tr><td colspan="6" align="center">Record does not exist</td></tr>';}
?>
<tr>
<td colspan="5" align=center>
<button type="button" class="btn btn-warning btn-s" onClick="window.location.href='course.php'">Display All</button>
    <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='insert.php'">Insert</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='tcpdf6/examples/aaarepcourse.php'">Print</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='course.php'">Back</button>
    <a href="tcpdf6/examples/aaarepstudent.php" target="_blank"> Print</a>
</td>
</tr>

</table>

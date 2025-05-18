<?php
require("../include/conn.php");
?>
<table border="1">
<tr>
<td colspan="6" align=center>
    <b>Student Course</b>    
</td>
</tr>

</tr>
<form action="search.php" method="post" name="formadd" enctype="multipart/form-data" novalidate>
<tr>
<td colspan="4">
<input type="text" name="txtsearch" id="txtsearch">
        </td>
            <td align = center colspan="2">
            <input type="submit" value="Search" />
</td>
</tr>
<?php
$sql = "SELECT * FROM tblcourse order by fldindex";
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
                <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='update.php?vid=<?php echo $vcourse_code; ?>'">Update</button>
                </td>
                <td>
                <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='delete.php?vid=<?php echo $vcourse_code; ?>'">Delete</button>
                </td>

                </tr>
                <?php
            }
        }
?>
<tr>
<td colspan="5" align=center>
    <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='insert.php'">Insert</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='tcpdf6/examples/aaarepcourse.php'">Print</button>
    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='../index.php'">Back</button>
    <a href="tcpdf6/examples/aaarepstudent.php" target="_blank"> Print</a>
</td>
</tr>

</table>

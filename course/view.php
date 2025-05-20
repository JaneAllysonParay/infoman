<?php
require("../include/conn.php");

$vcourse_code = $_REQUEST['vid'];
$originalcoursecode = $_REQUEST['vid'];

// Fetch course details
$sql = "SELECT * FROM tblcourse WHERE course_code='$vcourse_code' ORDER BY fldindex";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vcourseindex = $row['fldindex'];
        $vcourse_code = $row['course_code'];
        $vcourse_title = $row['course_title'];
        $vunits = $row['units'];
    }
}
?>

<html>
    <body>
        <h4>Course Details</h4>
        <hr>
        Course Code: <?php echo $vcourse_code; ?><br>
        Course Name: <?php echo $vcourse_title; ?><br>
        Units: <?php echo $vunits; ?><br>
        <hr>

        <table border="1">
            <tr>
                <td colspan="2" align="center">
                    <b>Students Enrolled</b>
                </td>
            </tr>

            <?php
            // Get all students enrolled in this course
            $sql_enroll = "SELECT * FROM tbllist WHERE fldcourseindex='$vcourseindex'";
            $result_enroll = $conn->query($sql_enroll);

            if ($result_enroll->num_rows > 0) {
                while ($enroll_row = $result_enroll->fetch_assoc()) {
                    $student_index = $enroll_row['fldstudentindex'];

                    // Get student info
                    $sql_student = "SELECT * FROM tblstudent WHERE fldindex='$student_index'";
                    $result_student = $conn->query($sql_student);

                    if ($result_student->num_rows > 0) {
                        while ($student_row = $result_student->fetch_assoc()) {
                            $student_number = $student_row['fldstudentnumber'];
                            $lastname = $student_row['fldlastname'];
                            $firstname = $student_row['fldfirstname'];
                            $middlename = $student_row['fldmiddlename'];
                            ?>
                            <tr>
                                <td><?php echo $student_number; ?></td>
                                <td><?php echo $lastname . ', ' . $firstname . ' ' . $middlename; ?></td>
                            </tr>
                            <?php
                        }
                    }
                }
            } else {
                ?>
                <tr>
                    <td colspan="2" align="center">No students enrolled yet.</td>
                </tr>
                <?php
            }
            ?>

            <tr>
                <td colspan="2" align="center">
                    <button type="button" class="btn btn-warning btn-s" onClick="window.location.href='course.php'">Display All</button>
                    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='../tcpdf6/examples/aaarepclasslist.php?vid=<?php echo $vcourse_code; ?>'">Print</button>
                    <button type="reset" class="btn btn-warning btn-s" onClick="window.location.href='course.php'">Back</button>
                </td>
            </tr>
        </table>
    </body>
</html>
<?php
require("../include/conn.php");

// Handle form submission for dropping the course
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vstudentnumber = $_POST['txtstudentnumber'];
    $vcourse_code = $_POST['txtcourse_code'];

    // Get student index
    $sql = "SELECT fldindex FROM tblstudent WHERE fldstudentnumber='$vstudentnumber' ORDER BY fldindex";
    $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $vstudentindex = $row['fldindex'];
            }
        }

    // Get course index
    $sql2 = "SELECT fldindex FROM tblcourse WHERE course_code='$vcourse_code' ORDER BY fldindex";
    $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $vcourseindex = $row2['fldindex'];
            }
        }

    // Delete course enrollment
    $sql_delete = "DELETE FROM tbllist WHERE fldstudentindex='$vstudentindex' AND fldcourseindex='$vcourseindex'";
        if ($conn->query($sql_delete) === TRUE) {
            echo "<script>alert('Course dropped successfully.'); window.location.href = 'enrollview.php?vid=$vstudentnumber';</script>";
        } else {
            echo "<script>alert('Error dropping course: " . $conn->error . "'); window.location.href = 'enrollview.php?vid=$vstudentnumber';</script>";
        }

    exit; // Stop further execution after processing form
}   
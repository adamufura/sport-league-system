<?php
//  fetch staff
$student_id = $_GET['edit'];
$staff_data_q = "SELECT * FROM `student` WHERE `matric` = ?";

$student_data_stmt = mysqli_prepare($connection, $staff_data_q);

mysqli_stmt_bind_param($student_data_stmt, "s", $student_id);

mysqli_stmt_execute($student_data_stmt);

$student_results = mysqli_fetch_assoc(mysqli_stmt_get_result($student_data_stmt));

if (isset($_POST['edit_student'])) {
    $firstname = mysqli_real_escape_string($connection, sanitizeInput($_POST['firstname']));
    $lastname = mysqli_real_escape_string($connection, sanitizeInput($_POST['lastname']));
    $email = mysqli_real_escape_string($connection, sanitizeInput($_POST['email']));
    $level = mysqli_real_escape_string($connection, sanitizeInput($_POST['level']));
    $department = mysqli_real_escape_string($connection, sanitizeInput($_POST['department']));

    if ($department == "Select Department" || empty($department)) {
        $department = "";
    }

    if ($level == "Select Level" || empty($level)) {
        $level = "100";
    }

    $messages = [];

    if (count($messages) < 1) {
        $update_student_query = "UPDATE `student` SET `email`= ?,`firstname`= ?,`lastname`= ?,`level`= ?,`department`= ? WHERE `matric` = ?";

        $update_student_stmt = mysqli_prepare($connection, $update_student_query);

        mysqli_stmt_bind_param(
            $update_student_stmt,
            "ssssss",
            $email,
            $firstname,
            $lastname,
            $level,
            $department,
            $student_id
        );

        $exec_update_student = mysqli_stmt_execute($update_student_stmt);

        mysqli_stmt_close($update_student_stmt);

        if ($exec_update_student) {
            $messages['msgSucc'] = "Student Updated Successfully...";
        } else {
            $messages['msgErr'] = "Error Occured updating student, try again";
        }
    }
}

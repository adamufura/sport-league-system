<?php
//  fetch staff
$staff_id = $_GET['edit'];
$staff_data_q = "SELECT * FROM `staff` WHERE staff_id = ?";

$staff_data_stmt = mysqli_prepare($connection, $staff_data_q);

mysqli_stmt_bind_param($staff_data_stmt, "s", $staff_id);

mysqli_stmt_execute($staff_data_stmt);

$staff_results = mysqli_fetch_assoc(mysqli_stmt_get_result($staff_data_stmt));

if (isset($_POST['edit_staff'])) {
    $firstname = mysqli_real_escape_string($connection, sanitizeInput($_POST['firstname']));
    $lastname = mysqli_real_escape_string($connection, sanitizeInput($_POST['lastname']));
    $email = mysqli_real_escape_string($connection, sanitizeInput($_POST['email']));
    $department = mysqli_real_escape_string($connection, sanitizeInput($_POST['department']));
    $position = mysqli_real_escape_string($connection, sanitizeInput($_POST['position']));


    if ($department == "Select Department" || empty($department)) {
        $department = "";
    }

    if ($position == "Select Position" || empty($position)) {
        $position = "Lecturer";
    }

    $messages = [];

    if (count($messages) < 1) {
        $update_staff_query = "UPDATE `staff` SET `email` = ?, `department` = ?, `first_name` = ?, `last_name` = ?, `position` = ? WHERE `staff_id` = ?";

        $update_staff_stmt = mysqli_prepare($connection, $update_staff_query);

        mysqli_stmt_bind_param(
            $update_staff_stmt,
            "ssssss",
            $email,
            $department,
            $firstname,
            $lastname,
            $position,
            $staff_id
        );

        $exec_update_staff = mysqli_stmt_execute($update_staff_stmt);

        mysqli_stmt_close($update_staff_stmt);

        if ($exec_update_staff) {
            $messages['msgSucc'] = "Staff Updated Successfully...";
        } else {
            $messages['msgErr'] = "Error Occured updating staff, try again";
        }
    }
}

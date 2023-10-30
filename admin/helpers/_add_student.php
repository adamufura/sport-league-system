<?php
if (isset($_POST['add_student'])) {
    $matric = mysqli_real_escape_string($connection, sanitizeInput($_POST['matric']));
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
    if (student_id_exist($matric)) {
        $messages['msgErr'] = "user exist with same matric number";
    } else if (student_email_exist($email)) {
        $messages['msgErr'] = "user exist with same email";
    }

    if (count($messages) < 1) {
        $add_student_query = "INSERT INTO `student` (`matric`, `email`, `firstname`, `lastname`, `level`, `department`) VALUES (?, ?, ?, ?, ?, ?)";

        $add_student_stmt = mysqli_prepare($connection, $add_student_query);

        mysqli_stmt_bind_param(
            $add_student_stmt,
            "ssssss",
            $matric,
            $email,
            $firstname,
            $lastname,
            $level,
            $department
        );

        $exec_add_student = mysqli_stmt_execute($add_student_stmt);

        mysqli_stmt_close($add_student_stmt);

        if ($exec_add_student) {
            $messages['msgSucc'] = "Student Added Successfully...";
        } else {
            $messages['msgErr'] = "Error Occured adding student, try again";
        }
    }
}

function getStudentByEmail($email)
{
    global $connection;

    $student_data_q = "SELECT * FROM `student` WHERE `email` = ?";

    $student_data_stmt = mysqli_prepare($connection, $student_data_q);

    mysqli_stmt_bind_param($student_data_stmt, 's', $email);

    mysqli_stmt_execute($student_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($student_data_stmt));

    mysqli_stmt_close($student_data_stmt);

    return $result;
}

function student_email_exist($email)
{
    $emailExist = false;

    $result = getStudentByEmail($email);

    $db_email = $result['email'];

    if ($db_email == $email) {
        $emailExist = true;
    } else {
        $emailExist = false;
    }
    return $emailExist;
}

function student_id_exist($matric)
{
    global $connection;

    $student_data_q = "SELECT * FROM `student` WHERE `matric` = ?";

    $student_data_stmt = mysqli_prepare($connection, $student_data_q);

    mysqli_stmt_bind_param($student_data_stmt, 's', $matric);

    mysqli_stmt_execute($student_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($student_data_stmt));

    mysqli_stmt_close($student_data_stmt);

    $studentIDExist = false;

    $db_staffID = $result['matric'];

    if ($db_staffID == $matric) {
        $studentIDExist = true;
    } else {
        $studentIDExist = false;
    }
    return $studentIDExist;
}

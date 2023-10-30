<?php

$student_data_q = "SELECT * FROM `student`";

$student_data_stmt = mysqli_prepare($connection, $student_data_q);

mysqli_stmt_execute($student_data_stmt);

$student_res = mysqli_stmt_get_result($student_data_stmt);


if (isset($_GET['del'])) {
    $del_matric = $_GET['del'];
    delete_student($del_matric);
}

function delete_student($matric)
{
    global $connection;

    $delete_q = "DELETE FROM `student` WHERE `matric` = ?";

    $delete_stmt = mysqli_prepare($connection, $delete_q);

    mysqli_stmt_bind_param($delete_stmt, 's', $matric);

    mysqli_stmt_execute($delete_stmt);

    mysqli_stmt_close($delete_stmt);

    header("Location: manage_students.php");
}

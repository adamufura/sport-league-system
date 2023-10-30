<?php
if (isset($_POST['add_team'])) {
    $team_id = mysqli_real_escape_string($connection, sanitizeInput($_POST['team_id']));
    $team_title = mysqli_real_escape_string($connection, sanitizeInput($_POST['team_title']));
    $team_slogan = mysqli_real_escape_string($connection, sanitizeInput($_POST['team_slogan']));
    $team_stadium = mysqli_real_escape_string($connection, sanitizeInput($_POST['team_stadium']));
    // $team_logo = mysqli_real_escape_string($connection, sanitizeInput($_POST['team_logo']));

    $messages = [];
    if (team_exist($team_id)) {
        $messages['msgErr'] = "Team already exist";
    }

    if ($_FILES['team_logo']['error'] < 1 && isset($_FILES['team_logo'])) {
        $avatar_name = $team_id;
        $file_input = 'team_logo';
        $upload_dir = 'assets/images/logos/';

        $target_file = $upload_dir .  basename($_FILES["team_logo"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!isset($_FILES[$file_input])) {
            $msgs['imageErr'] = "Error Uploading image";
        }

        // return false if error occurred
        $error = $_FILES[$file_input]['error'];

        if ($error !== UPLOAD_ERR_OK) {
            $msgs['imageErr'] = "Error Uploading image";
        }

        // move the uploaded file to the upload_dir
        $new_file = $upload_dir . $avatar_name . '.' . $imageFileType;

        if (move_uploaded_file(
            $_FILES[$file_input]['tmp_name'],
            $new_file
        )) {
            $team_logo = $new_file;
        };
    }

    if (count($messages) < 1) {
        $add_dept_query = "INSERT INTO `teams`(`team_id`, `team_title`, `team_slogan`, `team_stadium`, `team_logo`) VALUES (?, ?, ?, ?, ?)";

        $add_dept_stmt = mysqli_prepare($connection, $add_dept_query);

        mysqli_stmt_bind_param(
            $add_dept_stmt,
            "sssss",
            $team_id,
            $team_title,
            $team_slogan,
            $team_stadium,
            $team_logo
        );

        $exec_add_dept = mysqli_stmt_execute($add_dept_stmt);

        mysqli_stmt_close($add_dept_stmt);

        if ($exec_add_dept) {
            $messages['msgSucc'] = "Team Added Successfully...";
        } else {
            $messages['msgErr'] = "Error Occured adding Team, try again";
        }
    }
}


function team_exist($id)
{
    $deptExist = false;

    global $connection;

    $dept_data_q = "SELECT * FROM `teams` WHERE `team_id` = ?";

    $dept_data_stmt = mysqli_prepare($connection, $dept_data_q);

    mysqli_stmt_bind_param($dept_data_stmt, 's', $id);

    mysqli_stmt_execute($dept_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($dept_data_stmt));

    mysqli_stmt_close($dept_data_stmt);

    $db_dept_id = isset($result['team_id']) ? $result['team_id'] : null;

    if ($db_dept_id == $id) {
        $deptExist = true;
    } else {
        $deptExist = false;
    }
    return $deptExist;
}

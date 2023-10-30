<?php
if (isset($_POST['add_team'])) {
    $firstname = mysqli_real_escape_string($connection, sanitizeInput($_POST['firstname']));
    $lastname = mysqli_real_escape_string($connection, sanitizeInput($_POST['lastname']));
    $email = mysqli_real_escape_string($connection, sanitizeInput($_POST['email']));
    $name_on_shirt = mysqli_real_escape_string($connection, sanitizeInput($_POST['name_on_shirt']));
    $phonenumber = mysqli_real_escape_string($connection, sanitizeInput($_POST['phonenumber']));
    $address = mysqli_real_escape_string($connection, sanitizeInput($_POST['address']));
    $position = mysqli_real_escape_string($connection, sanitizeInput($_POST['position']));
    $team = mysqli_real_escape_string($connection, sanitizeInput($_POST['team']));

    $messages = [];
    if (staff_email_exist($email)) {
        $messages['msgErr'] = "player exist with same email";
    }

    if (count($messages) < 1) {

        if ($_FILES['avatar']['error'] < 1 && isset($_FILES['avatar'])) {
        $file_input = 'avatar';
        $upload_dir = 'assets/images/avatars/';

        $target_file = $upload_dir .  basename($_FILES["avatar"]["name"]);
        $image_temp = $_FILES[$file_input]['tmp_name'];
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!isset($_FILES[$file_input])) {
            $msgs['imageErr'] = "Error Uploading image";
        }

        // return false if error occurred
        $error = $_FILES[$file_input]['error'];

        if ($error !== UPLOAD_ERR_OK) {
            $msgs['imageErr'] = "Error Uploading image";
        }

        // resize image
        $maxDimW = 360;
        $maxDimH = 360;
        list($width, $height, $type, $attr) = getimagesize( $image_temp );
        if ( $width > $maxDimW || $height > $maxDimH ) {
            $target_filename = $image_temp;
            $fn = $image_temp;
            $size = getimagesize( $fn );
            $ratio = $size[0]/$size[1]; // width/height
            if( $ratio > 1) {
                $width = $maxDimW;
                $height = $maxDimH/$ratio;
            } else {
                $width = $maxDimW*$ratio;
                $height = $maxDimH;
            }
            $src = imagecreatefromstring(file_get_contents($fn));
            $dst = imagecreatetruecolor( $width, $height );
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
            imagejpeg($dst, $target_filename); // adjust format as needed
        }

        // move the uploaded file to the upload_dir
        $new_file = $upload_dir . $email . '.' . $imageFileType;

        if (move_uploaded_file($image_temp, $new_file)) {
                $avatar = $new_file;
            }
        }



        $add_staff_query = "INSERT INTO `players`(`email`, `first_name`, `last_name`, `name_on_shirt`, `phone_number`, `position`, `address`, `team`, `avatar`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $add_staff_stmt = mysqli_prepare($connection, $add_staff_query);

        mysqli_stmt_bind_param(
            $add_staff_stmt,
            "sssssssss",
            $email,
            $firstname,
            $lastname,
            $name_on_shirt,
            $phonenumber,
            $position,
            $address,
            $team,
            $avatar
        );

        $exec_add_staff = mysqli_stmt_execute($add_staff_stmt);

        mysqli_stmt_close($add_staff_stmt);

        if ($exec_add_staff) {
            $messages['msgSucc'] = "Player Added Successfully...";
        } else {
            $messages['msgErr'] = "Error Occured adding Player, try again";
        }
    }
}

function getStaffByEmail($email)
{
    global $connection;

    $staff_data_q = "SELECT * FROM `players` WHERE `email` = ?";

    $staff_data_stmt = mysqli_prepare($connection, $staff_data_q);

    mysqli_stmt_bind_param($staff_data_stmt, 's', $email);

    mysqli_stmt_execute($staff_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($staff_data_stmt));

    mysqli_stmt_close($staff_data_stmt);

    return $result;
}

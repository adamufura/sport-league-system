<?php

include 'setup.php';

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = stripslashes($data);
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    return $data;
}

function staff_email_exist($email)
{
    $emailExist = false;

    $result = getStaffByEmail($email);

    $db_email = isset($result['email']) ? $result['email'] : null;

    if ($db_email == $email) {
        $emailExist = true;
    } else {
        $emailExist = false;
    }
    return $emailExist;
}

function staff_id_exist($staffid)
{
    global $connection;

    $staff_data_q = "SELECT * FROM `players` WHERE `email` = ?";

    $staff_data_stmt = mysqli_prepare($connection, $staff_data_q);

    mysqli_stmt_bind_param($staff_data_stmt, 's', $staffid);

    mysqli_stmt_execute($staff_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($staff_data_stmt));

    mysqli_stmt_close($staff_data_stmt);

    $staffIDExist = false;

    $db_staffID = $result['email'];

    if ($db_staffID == $staffid) {
        $staffIDExist = true;
    } else {
        $staffIDExist = false;
    }
    return $staffIDExist;
}

function haveSpecialChar($data)
{
    return preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $data);
}

function getAdminByUsername($username)
{
    global $connection;

    $admin_data_q = "SELECT * FROM `admin` WHERE `username` = ?";

    $admin_data_stmt = mysqli_prepare($connection, $admin_data_q);

    mysqli_stmt_bind_param($admin_data_stmt, 's', $username);

    mysqli_stmt_execute($admin_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($admin_data_stmt));

    mysqli_stmt_close($admin_data_stmt);

    return $result;
}

function getAdminByEmail($email)
{
    global $connection;

    $admin_data_q = "SELECT * FROM `admin` WHERE `email` = ?";

    $admin_data_stmt = mysqli_prepare($connection, $admin_data_q);

    mysqli_stmt_bind_param($admin_data_stmt, 's', $email);

    mysqli_stmt_execute($admin_data_stmt);

    $result = mysqli_fetch_assoc(mysqli_stmt_get_result($admin_data_stmt));

    mysqli_stmt_close($admin_data_stmt);

    return $result;
}

function admin_exist($username, $password)
{
    $adminExist = false;

    $result = getAdminByUsername($username);

    $db_username = isset($result['username']) ? $result['username'] : NULL;
    $is_password = isset($result['password']) ? password_verify($password, $result['password']) : NULL;

    if ($db_username == $username && $is_password) {
        $adminExist = true;
    } else {
        $adminExist = false;
    }
    return $adminExist;
}

function email_exist($email)
{
    $emailExist = false;

    $result = getAdminByEmail($email);

    $db_email = $result['email'];

    if ($db_email == $email) {
        $emailExist = true;
    } else {
        $emailExist = false;
    }
    return $emailExist;
}


function loginAdmin($username, $password)
{
    if (admin_exist($username, $password)) {
        $result = getAdminByUsername($username);

        session_start();
        $_SESSION['s_adminID'] = $result['id'];
        $_SESSION['s_adminUsername'] = $result['username'];
        header("Location: index.php");
    }
}

function isAdminLoggedIn()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['s_adminID']) && isset($_SESSION['s_adminUsername'])) {
        return true;
    } else {
        return false;
    }
}


function logoutAdmin()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $s_id = $_SESSION['s_adminID'];
    $s_username = $_SESSION['s_adminUsername'];

    $s_id = null;
    $s_username = null;

    unset($s_id);
    unset($s_username);

    session_destroy();
    header("Location: login.php");
}

function getDepartments()
{

    global $connection;

    $dept_data_q = "SELECT * FROM `teams`";

    $dept_data_stmt = mysqli_prepare($connection, $dept_data_q);

    mysqli_stmt_execute($dept_data_stmt);

    $dept_res = mysqli_stmt_get_result($dept_data_stmt);
    mysqli_stmt_close($dept_data_stmt);
    return $dept_res;
}

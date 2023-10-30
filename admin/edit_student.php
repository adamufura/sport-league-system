<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_edit_student.php'; ?>

<?php
$pageDetails = [
    'title' => "Edit Student"
];

if (!isset($_GET['edit'])) {
    header("Location: manage_students.php");
}

Includes::custom_include('includes/header.php', $pageDetails, true);

?>


<body class="app">
    <header class="app-header fixed-top">
        <?php Includes::custom_include('includes/navbar.php', [], true);    ?>
        <!--//app-header-inner-->
        <?php Includes::custom_include('includes/sidebar.php', [], true);    ?>
        <!--//app-sidepanel-->
    </header>
    <!--//app-header-->

    <!--//app-content-->
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title text-success">Update a Student</h1>
                <hr class="mb-4">
                <div class="row g-4 settings-section">

                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="" method="POST">
                                    <span class="text-success text-center">
                                        <?php if (isset($messages['msgSucc'])) {
                                            echo $messages['msgSucc'];
                                        } ?>
                                    </span>
                                    <span class="text-danger text-center">
                                        <?php if (isset($messages['msgErr'])) {
                                            echo $messages['msgErr'];
                                        } ?>
                                    </span>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="setting-input-1" class="form-label">Matric Number</label>
                                                <input name="matric" type="text" class="form-control" id="setting-input-1" placeholder="NAS/STE/19/****" value="<?php echo $student_results['matric']; ?>" disabled required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">First Name</label>
                                                <input name="firstname" type="text" class="form-control" id="setting-input-2" required placeholder="Enter First Name" value="<?php echo $student_results['firstname']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Last Name</label>
                                                <input name="lastname" type="text" class="form-control" id="setting-input-2" required placeholder="Enter Last Name" value="<?php echo $student_results['lastname']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Email Address</label>
                                                <input name="email" type="email" class="form-control" id="setting-input-3" placeholder="Enter Email Address" value="<?php echo $student_results['email']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Level</label>
                                                <div class="form-floating">
                                                    <select required class="form-select" name="level" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Select Level</option>
                                                        <option value="100">100</option>
                                                        <option value="200">200</option>
                                                        <option value="300">300</option>
                                                        <option value="400">400</option>
                                                        <option value="500">500</option>

                                                    </select>
                                                    <label for="floatingSelect">Level</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Department</label>
                                                <div class="form-floating">
                                                    <select required class="form-select" name="department" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Select Department</option>
                                                        <?php
                                                        $depts = getDepartments();
                                                        while ($res = mysqli_fetch_array($depts)) : ?>
                                                            <option value="<?php echo $res['dept_id'] ?>"><?php echo $res['dept_title'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                    <label for=" floatingSelect">Department</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button name="edit_student" type="submit" class="btn app-btn-primary float-end">Update Student</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--//app-card-body-->

                        </div>
                        <!--//app-card-->
                    </div>
                </div>
                <!--//row-->
                <hr class="my-4">
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

    </div>
    <!--//app-wrapper-->

    <!--//app-content-->


    <?php Includes::custom_include('includes/footer.php', [], true);    ?>
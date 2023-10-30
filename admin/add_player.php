<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_add_player.php'; ?>

<?php
$pageDetails = [
    'title' => "Add a Player"
];

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
                <h1 class="app-page-title text-success">Add a Player</h1>
                <hr class="mb-4">
                <div class="row g-4 settings-section">

                    <div class="col-12 col-md-8">
                        <div class="app-card app-card-settings shadow-sm p-4">

                            <div class="app-card-body">
                                <form class="settings-form" action="" method="POST" enctype="multipart/form-data">
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
                                                <label for="setting-input-3" class="form-label">Player Avatar</label>
                                                <input name="avatar" type="file" class="form-control" id="setting-input-3" placeholder="Player Picture" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">First Name</label>
                                                <input name="firstname" type="text" class="form-control" id="setting-input-2" required placeholder="Enter First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Last Name</label>
                                                <input name="lastname" type="text" class="form-control" id="setting-input-2" required placeholder="Enter Last Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Email Address</label>
                                                <input name="email" type="email" class="form-control" id="setting-input-3" placeholder="Enter Email Address" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Name on Shirt</label>
                                                <input name="name_on_shirt" type="text" class="form-control" id="setting-input-2" required placeholder="Enter Name On Shirt">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Phone Number</label>
                                                <input name="phonenumber" type="text" class="form-control" id="setting-input-2" required placeholder="Enter Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Address</label>
                                                <textarea name="address" class="form-control h-25"  id="" cols="10" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Position</label>
                                                <div class="form-floating">
                                                    <select required name="position" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                                       <option value="" disabled selected>Select a Position</option>
                                                        <option value="Striker">Striker</option>
                                                        <option value="Forward">Forward</option>
                                                        <option value="Midfielder">Midfielder</option>
                                                        <option value="Defender">Defender</option>
                                                        <option value="Goalkeeper">Goalkeeper</option>
                                                        <option value="Left Back">Left Back</option>
                                                        <option value="Right Back">Right Back</option>
                                                    </select>
                                                    <label for="floatingSelect">Position</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Team</label>
                                                <div class="form-floating">
                                                    <select required class="form-select" name="team" id="floatingSelect" aria-label="Floating label select example">
                                                        <option selected>Select Team</option>
                                                        <?php
                                                        $depts = getDepartments();
                                                        while ($res = mysqli_fetch_array($depts)) : ?>
                                                            <option value="<?php echo $res['team_id'] ?>"><?php echo $res['team_title'] ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                    <label for=" floatingSelect">Team</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button name="add_team" type="submit" class="btn app-btn-primary float-end">Add Player</button>
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
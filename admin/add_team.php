<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_add_team.php'; ?>

<?php
$pageDetails = [
    'title' => "Add Team"
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
                <h1 class="app-page-title text-success">Add a Team</h1>
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
                                                <label for="setting-input-1" class="form-label">Team ID</label>
                                                <input name="team_id" type="text" class="form-control" id="setting-input-1" placeholder="e.g Real Madrid: RM101: " required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Team Title</label>
                                                <input name="team_title" type="text" class="form-control" id="setting-input-3" placeholder="Enter Team Title" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Team Slogan</label>
                                                <input name="team_slogan" type="text" class="form-control" id="setting-input-3" placeholder="Enter Team Slogan" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Team Stadium</label>
                                                <input name="team_stadium" type="text" class="form-control" id="setting-input-3" placeholder="Enter Team Stadium" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="setting-input-3" class="form-label">Team Logo</label>
                                                <input name="team_logo" type="file" class="form-control" id="setting-input-3" placeholder="Enter Team Logo" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button name="add_team" type="submit" class="btn app-btn-primary float-end">Add Team</button>
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
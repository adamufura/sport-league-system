<?php require 'helpers/admin_init.php'; ?>
<?php require 'helpers/_manage_players.php'; ?>

<?php
$pageDetails = [
    'title' => "Players"
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

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <div class="row g-3 mb-4 align-items-center justify-content-between">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Manage Players</h1>
                    </div>
                    <div class="col-auto">
                        <div class="page-utilities">
                            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                                <div class="col-auto">
                                    <form class="table-search-form row gx-1 align-items-center">
                                        <div class="col-auto">
                                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn app-btn-secondary">Search</button>
                                        </div>
                                    </form>

                                </div>
                                <!--//col-->
                            </div>
                            <!--//row-->
                        </div>
                        <!--//table-utilities-->
                    </div>
                    <!--//col-auto-->
                </div>
                <!--//row-->

                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left">
                                <thead>
                                    <tr>
                                        <th class="cell">#</th>
                                        <th class="cell">Avatar</th>
                                        <th class="cell">Email</th>
                                        <th class="cell">Name</th>
                                        <th class="cell">Position</th>
                                        <th class="cell">Address</th>
                                        <th class="cell">Team</th>
                                        <th class="cell">Name on shirt</th>
                                        <th class="cell">Action</th>
                                        <th class="cell"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                                            <?php $counter = 1; ?>

                                    <?php


                                    while ($staff_result = mysqli_fetch_array($staff_res)) : ?>

                                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><img src="<?php echo  $staff_result['avatar']; ?>" class="rounded w-25" alt=""></td>

                            <td class="cell"><?php echo $staff_result['email'] ?></td>
                            <td class="cell"><?php echo $staff_result['first_name'] . " ".$staff_result['last_name']  ; ?></td>
                                            <td class="cell"><span class="badge bg-success"><?php echo $staff_result['position'] ?></span></td>
                                        <td class="cell"><?php echo $staff_result['address'] ?></td>
                                        <td class="cell"><?php echo $staff_result['team'] ?></td>
                                        <td class="cell"><?php echo $staff_result['name_on_shirt'] ?></td>

                                            <td class="cell">
                                                <a class="btn btn-sm text-white btn-success" href="#">Edit</a>

                                                <a class="btn btn-sm text-white btn-danger" href="?del=<?php echo $staff_result['email'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <?php mysqli_stmt_close($staff_data_stmt);
                                    ?>

                                </tbody>
                            </table>
                        </div>
                        <!--//table-responsive-->

                    </div>
                    <!--//app-card-body-->
                </div>

            </div>
            <!--//container-fluid-->
        </div>
    </div>
    <!--//app-content-->


    <?php Includes::custom_include('includes/footer.php', [], true);    ?>
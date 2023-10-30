<?php
require 'helpers/admin_init.php';
require 'helpers/_index.php';

$pageDetails = [
    'title' => "Admin"
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
            <div class="d-flex justify-content-between">
                <h1 class="app-page-title">Fixtures</h1>
                <button class="btn btn-sm btn-primary" id="generateFixtures">Generate Fixtures</button>
            </div>

            <!--//app-card-->
           
            <div class="my-4">
                <select id="selectLeague" class="form-select">
                    <option value="">Select a League</option>
                    <!-- You will populate the options dynamically using JavaScript -->
                </select>
            </div>

            <div id="output"></div>
  
            <!--//col-->
            </div>
        </div>
        <!--//container-fluid-->
        </div>
    </div>
    <!--//app-content-->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
         <script>
$(document).ready(function () {
    // Function to load leagues into the select box
    function loadLeagues() {
        $.ajax({
            type: "GET",
            url: "load_leagues.php", // Create this PHP file to fetch leagues from the database
            success: function (data) {
                $("#selectLeague").html(data);
            },
        });
    }

    // Initial load of leagues
    loadLeagues();

    // Load fixtures based on the selected league
    $("#selectLeague").on("change", function () {
        var selectedLeague = $(this).val();
        if (selectedLeague !== "") {
            $.ajax({
                type: "GET",
                url: "load_fixtures.php?league_id=" + selectedLeague, // Create this PHP file to fetch fixtures for the selected league
                success: function (data) {
                    $("#output").html(data);
                },
            });
        }
    });

    // Generate fixtures button click event
    $("#generateFixtures").on("click", function () {
        $.ajax({
            type: "GET",
            url: "generate_fixtures.php",
            success: function (data) {
                $("#output").html(data);
                // After generating fixtures, reload the leagues in case a new one was added
                loadLeagues();
            },
        });
    });
});

    </script>

    <?php Includes::custom_include('includes/footer.php', [], true);    ?>


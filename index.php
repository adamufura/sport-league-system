<?php include 'includes/header.php' ?>

<body>
  <!-- Navbar  -->
  <?php include 'includes/nav.php' ?>

  <!-- /Navbar -->

  <main>
    <header>
      <img src="assets/images/background.png" class="img-fluid w-100" alt="" />
    </header>
    <div class="container mt-5">
      <div class="card shadow-lg">
        <div class="card-body">
            <div class="my-4">
              <h3>FIXTURES</h3>
                <select id="selectLeague" class="form-select">
                    <option value="">Select a League</option>
                    <!-- You will populate the options dynamically using JavaScript -->
                </select>
            </div>
        </div>
        <div class="card-body">
            <div id="output"></div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-10 shadow card m-5">
          <section class="text-center">
            <h4 class="text-info">Sport League System</h4>
            <p class="lead p-2">
            The Sports League Management System is a comprehensive software platform designed for efficiently managing sports leagues that focus on clubs, player management, and tournaments. It allows for easy club and player registration, supports various league structures and tournament formats, and provides scheduling and real-time result tracking. The system is web-based, ensuring secure communication and notifications, and it offers features for recruiting, training, and evaluating officials. Additionally, it facilitates league promotion and marketing, maintains organized data, gathers feedback for improvement, and offers a user-friendly, centralized solution for organizing sports leagues.
            </p>
          </section>

        </div>

      </div>
    </div>

 <div class="container-fluid">
  <div class="ratio ratio-21x9 w-100">
    <video controls autoplay src="highlights.mp4" class="w-100 h-100" style="object-fit: cover;"></video>
  </div>
</div>

  </main>

   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
         <script>
$(document).ready(function () {
    // Function to load leagues into the select box
    function loadLeagues() {
        $.ajax({
            type: "GET",
            url: "admin/load_leagues.php", // Create this PHP file to fetch leagues from the database
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
                url: "admin/load_fix.php?league_id=" + selectedLeague, // Create this PHP file to fetch fixtures for the selected league
                success: function (data) {
                    $("#output").html(data);
                },
            });
        }
    });

});

    </script>

  <!-- Footer -->
  <?php include 'includes/footer.php' ?>
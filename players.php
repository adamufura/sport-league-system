<?php include 'includes/header.php' ?>

<body>
  <!-- Navbar -->
  <?php include 'includes/nav.php' ?>

  <main>
    <div class="container my-5">
      <div class="card shadow-lg">
        <div class="card-body">
          <h3><?php echo $_GET['team_title'] ?> Players</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Name on Shirt</th>
                <th>Position</th>
                <th>Address</th>
                <th>Avatar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require 'helpers/setup.php';

              // Get the selected team's ID from the URL
              if (isset($_GET['team_id'])) {
                $team_id = $_GET['team_id'];

                // Query to fetch players for the selected team
                $query = "SELECT * FROM players WHERE team = '$team_id'";
                $result = mysqli_query($connection, $query);

                // Fetch and display players
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                  echo "<td>{$row['id']}</td>";
                  echo "<td>{$row['first_name']}</td>";
                  echo "<td>{$row['last_name']}</td>";
                  echo "<td>{$row['name_on_shirt']}</td>";
                  echo "<td>{$row['position']}</td>";
                  echo "<td>{$row['address']}</td>";
                  echo "<td><img src='admin/{$row['avatar']}' alt='Player Avatar' width='50'></td>";
                  echo "</tr>";
                }
              } else {
                echo "No team selected.";
              }

              // Close the database connection
              mysqli_close($connection);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <?php include 'includes/footer.php' ?>
</body>

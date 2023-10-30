<?php include 'includes/header.php' ?>

<body>
  <!-- Navbar  -->
  <?php include 'includes/nav.php' ?>

  <main>
    <div class="container my-5">
      <div class="card shadow-lg">
        <div class="card-body">
          <h3>TEAMS</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Team Title</th>
                <th>Team Slogan</th>
                <th>Team Stadium</th>
                <th>Team Logo</th>
                <th>Players</th>
              </tr>
            </thead>
            <tbody>
              <?php

              require 'helpers/setup.php';
              // Query to fetch all teams
              $query = "SELECT * FROM teams";
              $result = mysqli_query($connection, $query);

              // Fetch and display teams
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['team_id']}</td>";
                echo "<td>{$row['team_title']}</td>";
                echo "<td>{$row['team_slogan']}</td>";
                echo "<td>{$row['team_stadium']}</td>";
                echo "<td><img src='admin/{$row['team_logo']}' alt='Team Logo' width='50'></td>";
                echo "<td> <a href='players.php?team_id={$row['team_id']}&team_title={$row['team_title']}' class='btn btn-success '>View Players<a/> </td>";
                echo "</tr>";
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

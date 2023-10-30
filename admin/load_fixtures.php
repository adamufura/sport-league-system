<?php
require './helpers/setup.php';



if (isset($_GET['league_id'])) {
    $league_id = $_GET['league_id'];

    // Fetch fixtures for the selected league
    $sql = "SELECT * FROM fixtures WHERE league_id = '$league_id'";
    $result = $connection->query($sql);

    $fixtures = '<h2>Fixtures for the Selected League</h2>';
    
    if ($result->num_rows > 0) {
        $fixtures .= '<table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Home Team</th>
                                <th>Away Team</th>
                                <th>Venue</th>
                                <th>Match Date & Time</th>
                            </tr>
                        </thead>
                        <tbody>';

        while ($row = $result->fetch_assoc()) {
            $fixtures .= '<tr>
                            <td>' . $row['home_team'] . '<img width="30" src= '.  getTeamById($row['home_id'])['team_logo'] . ' />' .  '</td>
                            <td>' . $row['away_team'] . '<img width="30" src= '.  getTeamById($row['away_id'])['team_logo'] . ' />' .  '</td>
                            <td>' . $row['venue'] . '</td>
                            <td>' . $row['match_datetime'] . '</td>
                         </tr>';
        }

        $fixtures .= '</tbody></table>';
    } else {
        $fixtures .= 'No fixtures found for this league.';
    }

    echo $fixtures;
}


function getTeamById($teamId) {
    
    global $connection;

    $teamId = $connection->real_escape_string($teamId);

    // Query to fetch team information by ID
    $sql = "SELECT * FROM teams WHERE team_id = '$teamId'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $teamInfo = $result->fetch_assoc();
    } else {
        $teamInfo = null; // Team not found
    }

    // Close the database connection

    return $teamInfo;
}

?>

<?php
// Establish your database connection

require './helpers/setup.php';

// Get a random league from the 'leagues' table
$sql = "SELECT * FROM leagues ORDER BY RAND() LIMIT 1";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $league = $result->fetch_assoc();
    $leagueID = $league['league_id'];
    $leagueName = $league['league_name'];

    // Get teams from the 'teams' table
    $sql = "SELECT * FROM teams";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        $teams = array();
        while ($row = $result->fetch_assoc()) {
            $teams[] = $row;
        }

        // Generate random fixtures for the selected league
        $fixtures = array();
        $matchDate = strtotime('2023-11-01'); // Start date for match datetime

        foreach ($teams as $homeTeam) {
            foreach ($teams as $awayTeam) {
                if ($homeTeam['team_title'] != $awayTeam['team_title']) {
                    $fixture = array(
                        'league_id' => $leagueID,
                        'home_team' => $homeTeam['team_title'],
                        'home_id' => $homeTeam['team_id'],
                        'away_team' => $awayTeam['team_title'],
                        'away_id' => $awayTeam['team_id'],
                        'venue' => $homeTeam['team_stadium'],
                        'match_datetime' => date('Y-m-d H:i:s', $matchDate)
                    );
                    $fixtures[] = $fixture;
                    $matchDate += 3600; // Add 1 hour for the next match
                }
            }
        }

        // Insert fixtures into the 'fixtures' table
        foreach ($fixtures as $fixture) {
            $sql = "INSERT INTO fixtures (league_id, home_team, home_id, away_id, away_team, venue, match_datetime) VALUES (
                '{$fixture['league_id']}',
                '{$fixture['home_team']}',
                '{$fixture['home_id']}',
                '{$fixture['away_id']}',
                '{$fixture['away_team']}',
                '{$fixture['venue']}',
                '{$fixture['match_datetime']}'
            )";

            if ($connection->query($sql) !== TRUE) {
                echo 'Error: ' . $sql . '<br>' . $connection->error;
            }
        }

        echo "Fixtures generated for league: $leagueName ($leagueID)";
    }
}
?>

<?php
require './helpers/setup.php';

// Fetch leagues from the database
$sql = "SELECT * FROM leagues";
$result = $connection->query($sql);

$options = '<option value="">Select a League</option>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['league_id'] . '">' . $row['league_name'] . '--------' . $row['league_id'] . '</option>';
    }
}

$connection->close();

echo $options;
?>

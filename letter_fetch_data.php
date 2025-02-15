<?php
// Establish database connection
$pdo = new PDO('mysql:host=localhost;dbname=doc_manege', 'root', '');

// Fetch data from database
$stmt = $pdo->query("SELECT * FROM letters");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output table rows
foreach ($results as $row) {
    echo '<tr>';
    echo '<td>' . $row['letter_number'] . '</td>';
    echo '<td>' . $row['topic'] . '</td>';
    echo '<td>' . $row['sender'] . '</td>';
    echo '<td>' . $row['received_date'] . '</td>';
    echo '<td>' . $row['officer_id'] . '</td>';
    if (!empty($row["letter_path"])) {
        echo '<td><button><a href=' .($row["letter_path"]) . ' target="_blank">Show Letter</a></button></td>';
    } else {
        echo '<td>No Letter</td>';
    }
    echo '<td>' . $row['reply_date'] . '</td>';
    if (!empty($row["letter_path_for_reply"])) {
        echo '<td><button><a href=' .($row["letter_path_for_reply"]) . ' target="_blank">Show Letter</a></button></td>';
    } else {
        echo '<td>No Letter</td>';
    }
    echo '</tr>';
}
?>

<?php
// Establish database connection
$pdo = new PDO('mysql:host=localhost;dbname=do_manage', 'root', '');

// Retrieve search criteria sent by AJAX
$search1 = isset($_POST['search1']) ? $_POST['search1'] : '';
$search2 = isset($_POST['search2']) ? $_POST['search2'] : '';
$search3 = isset($_POST['search3']) ? $_POST['search3'] : '';
$search4 = isset($_POST['search4']) ? $_POST['search4'] : '';
$search5 = isset($_POST['search5']) ? $_POST['search5'] : '';
$search6 = isset($_POST['search6']) ? $_POST['search6'] : '';

// Construct SQL query
$sql = "SELECT * FROM letters WHERE `letter_number` LIKE ? AND `topic` LIKE ? AND `sender` LIKE ? AND `received_date` LIKE ? AND `officer_id` LIKE ? AND `letter_path` LIKE ? AND `reply_date` LIKE ? AND `letter_path_for_reply` LIKE ?";
$stmt = $pdo->prepare($sql);

// Bind parameters and execute query
$stmt->execute(["%$search1%", "%$search2%", "%$search3%", "%$search4%", "%$search5%", "%$search6%", "%$search6%", "%$search6%"]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the filtered results
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

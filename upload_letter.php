<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "do_manage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$topic = $_POST['topic'];
$date_received = $_POST['date_received'];
$reply_date = $_POST['reply_date'];
$letter_number = $_POST['letter_number'];
$sender = $_POST['sender'];
$officer_id = $_POST['officer_id'];

$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$file1 = $_FILES['file_rep'];
$fileName1 = $file1['name'];
$fileTmpName1 = $file1['tmp_name'];
$fileSize1 = $file1['size'];
$fileError1 = $file1['error'];
$fileType1 = $file1['type'];

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('pdf', 'jpg', 'jpeg', 'png');

$fileExt1 = explode('.', $fileName1);
$fileActualExt1 = strtolower(end($fileExt1));
$allowed1 = array('pdf', 'jpg', 'jpeg', 'png');

if (in_array($fileActualExt, $allowed) && in_array($fileActualExt1, $allowed1)) {
    if ($fileError === 0 && $fileError1 === 0) {
        if ($fileSize < 5000000 && $fileSize1 < 5000000) {
            $fileNewName = uniqid('', true) . "." . $fileActualExt;
            $fileDestination = 'uploads/' . $fileNewName;
            move_uploaded_file($fileTmpName, $fileDestination);

            $fileNewName1 = uniqid('', true) . "." . $fileActualExt1;
            $fileDestination1 = 'reply/' . $fileNewName1;
            move_uploaded_file($fileTmpName1, $fileDestination1);

            $stmt = $conn->prepare("INSERT INTO letters (letter_number, topic, sender, received_date, officer_id, letter_path, reply_date, letter_path_for_reply) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssss", $letter_number, $topic, $sender, $date_received, $officer_id, $fileDestination, $reply_date, $fileDestination1);

            if ($stmt->execute()) {
                header("Location: index.php?status=success");
            } else {
                header("Location: index.php?status=error"). $stmt->error;
            }

            $stmt->close();
        } else {
            echo "File is too big.";
        }
    } else {
        echo "There was an error uploading your file.";
    }
} else {
    echo "You cannot upload files of this type.";
}

$conn->close();
?>

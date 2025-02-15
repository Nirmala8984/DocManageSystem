<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dcouments Management System</title>
</head>
<body>
    <bg color = "yellow">
     <?php include 'navi.php'; ?>
     <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo "<p class='succes' style='color:black;'>Document upload successfully!</p>";
        } else {
            echo "<p class='not_succes'style='color:red;'>Error uploding form</p>";
        }
    }
    ?>
    <div class="topper">

    <form action="upload_letter.php" method="post" enctype="multipart/form-data">
        <h1>Upload a New Documents</h1>
        <label for="topic">Letter Topic:</label>
        <input type="text" id="topic" name="topic" required><br><br>
        
        <label for="date_received">Date Received:</label>
        <input type="date" id="date_received" name="date_received" required><br><br>

        <label for="letter_number">Letter number:</label>
        <input type="text" id="letter_number" name="letter_number" required><br><br>

        <label for="date_received">Sender:</label>
        <input type="text" id="sender" name="sender" required><br><br>

        <label for="reply_date">Replay date:</label>
        <input type="date" id="reply_date" name="reply_date" required><br><br>
        
        <label for="officer">Relevant Officer:</label>
        <select id="officer" name="officer_id" required>
            <option value="no_choice" id="officer_id">--Select officer--</option>
            <option value="Mrs.D.M.U.Nirmala Kumari Dewagedara" id="officer_id">Mrs.D.M.U.Nirmala Kumari Dewagedara</option>
            <option value="Mrs.A.M.Chandani Sandamali" id="officer_id">Mrs.A.M.Chandani Sandamali</option>
            <option value="Mr.J.H.A.Asanka Jayasekara" id="officer_id">Mr.J.H.A.Asanka Jayasekara</option>
        </select><br><br>
        
        <label for="file">Upload Letter:</label>
        <input type="file" id="file" name="file" accept=".pdf, .jpg, .jpeg, .png" required><br><br>

        <label for="file_rep">Upload Replay :</label>
        <input type="file" id="file_rep" name="file_rep" accept=".pdf, .jpg, .jpeg, .png" required><br><br>
        
        <input type="submit" value="Upload Letter" id="button">
        <input type="reset" value="Reset Data" id="button">


    </form> 
    </div>
</body>
</html>

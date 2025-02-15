<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letter Handling System</title>
</head>
<body>
    <h1>Upload a Reply</h1>
    <form action="upload_reply.php" method="post" enctype="multipart/form-data">
        <label for="letter_id">Select Letter:</label>
        <select id="letter_id" name="letter_id" required>
            <!-- Dynamically populate this list with letter topics from the database -->
        </select><br><br>
        
        <label for="date_replied">Date Replied:</label>
        <input type="date" id="date_replied" name="date_replied" required><br><br>
        
        <label for="file">Upload Reply:</label>
        <input type="file" id="file" name="file" accept=".pdf, .jpg, .jpeg, .png" required><br><br>
        
        <input type="submit" value="Upload Reply">
    </form>
</body>
</html>
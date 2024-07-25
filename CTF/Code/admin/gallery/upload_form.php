<?php
include '../../database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $user_id = 1; 
    $target_dir = "uploads/";
    $image_name = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image_name;

    // echo $image_name;
    // echo $target_file;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
    } else {
        // Move uploaded file to target directory
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert file information into the database
            $sql = "INSERT INTO gallery_db (user_id, image_name, image_path, uploaded_at) VALUES ('$user_id', '$image_name', '$target_file', NOW())";
            if ($connection->query($sql) === TRUE) {
                echo "File uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>
    <h2>Upload Image</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="image" id="image" accept="image/*">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gallery</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 10px;
        padding: 20px;
    }
    .gallery img {
        width: 100%;
        height: auto;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }
    .gallery img:hover {
        transform: scale(1.1);
    }
    .btn-container {
        text-align: center;
        margin-bottom: 20px;
    }
    .btn-container button {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-container button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <div class="btn-container">
        <button onclick="window.location.href='upload_form.php'">Upload Image</button>
    </div>
    <div class="gallery">
        <?php
        include '../../database.php';

        $user_id = 1; 
        $sql = "SELECT * FROM gallery_db WHERE user_id = '$user_id'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<img src="' . $row["image_path"] . '" alt="' . $row["image_name"] . '">';
            }
        } else {
            echo "No images found.";
        }
        $connection->close();
        ?>
    </div>
</body>
</html>

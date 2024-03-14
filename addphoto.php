<?php
// Database connection
include('cons.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Check if files were uploaded without errors
    if (isset($_FILES["photos"])) {
        $targetDir = "uploads/"; // Directory where uploaded files will be stored
        $uploadSuccess = true; // Flag to track overall upload success
        
        // Loop through each uploaded file
        foreach ($_FILES["photos"]["tmp_name"] as $key => $tmpName) {
            $targetFile = $targetDir . basename($_FILES["photos"]["name"][$key]); // Path of the uploaded file
            
            // Try to move the uploaded file to the destination directory
            if (move_uploaded_file($_FILES["photos"]["tmp_name"][$key], $targetFile)) {
                echo "The file " . basename($_FILES["photos"]["name"][$key]) . " has been uploaded.<br>";
                
                // Insert file path into the database
                $filePath = $targetFile; // Get the file path
                $id=$_POST['product_id'];
                
                $sql = "INSERT INTO photos (id,photo_path) VALUES ('$id','$filePath')";
                
                if ($conn->query($sql) === TRUE) {
                    echo "<script>" . "window.location.href='./indexa.php'" . "</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading " . basename($_FILES["photos"]["name"][$key]) . ".<br>";
                $uploadSuccess = false;
            }
        }

        if ($uploadSuccess) {
            echo "All files uploaded successfully.";
           
        } else {
            echo "Some files failed to upload.";
        }
    } else {
        echo "No files uploaded or an error occurred.";
    }
}

// Close the database connection
$conn->close();
?>

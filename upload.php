<?php
$targetDir = "/var/www/html/";
chmod("/var/www/html/", 0777);
if (!empty($_FILES["file"])) {
    $fileName = basename($_FILES["file"]["name"]); // Vulnerability 2
    $targetFilePath = $targetDir . $fileName; // Vulnerability 3
    //$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); // Vulnerability 1

    // Check if file already exists
    // Removed the check for existing files

    // Upload file to server
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
        echo "The file " . $fileName . " has been uploaded.";
        // Redirect to index.html
        header("Location: index.html");
        exit;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "No file uploaded.";
}
?>

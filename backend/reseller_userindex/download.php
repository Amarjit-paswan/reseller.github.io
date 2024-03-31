<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reseller_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from variants_image table
$sql = "SELECT `vr_product_image` FROM `variants_image`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Create a temporary directory to store images
    $tempDir = sys_get_temp_dir() . '/variant_images';
    if (!file_exists($tempDir)) {
        mkdir($tempDir);
    }

    // Loop through each row and save the images in the temporary directory
    while ($row = $result->fetch_assoc()) {
        $imageData = $row['vr_product_image'];
        $imageName = uniqid('image_') . '.jpg'; // You may need to adjust the file extension based on your actual image format
        $imagePath = $tempDir . '/' . $imageName;
        file_put_contents($imagePath, $imageData);
    }

    // Create a zip file containing all the images
    $zipFileName = 'variant_images.zip';
    $zip = new ZipArchive();
    if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($tempDir),
            RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($tempDir) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();

        // Send the zip file to the browser
        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename=' . $zipFileName);
        header('Content-Length: ' . filesize($zipFileName));
        readfile($zipFileName);

        // Clean up: remove temporary directory and zip file
        array_map('unlink', glob("$tempDir/*.*"));
        rmdir($tempDir);
        unlink($zipFileName);

        exit;
    } else {
        echo 'Failed to create zip file';
    }
} else {
    echo "No images found in the database";
}

$conn->close();
?>

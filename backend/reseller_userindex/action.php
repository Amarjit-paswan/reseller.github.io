<?php 

include 'database.php';
$Reseller_object = new Reseller_UserIndex();

if(isset($_POST['action']) && $_POST['action'] == 'select_variant'){
    $selectimg_id = $_POST['vr_selectID'];

   $new =  $Reseller_object->select_imageof_Product($selectimg_id);

   if($new !== false) {
    // Encode the data as JSON and return it
    echo json_encode($new);
} else {
    // Handle case when no data is retrieved
    echo json_encode(array()); // Return an empty array as JSON
}


}





// if(isset($_POST['action']) && $_POST['action'] == 'downloadimage'){
//     $imageFiles = $_POST['images']; // Array of image filenames

//     // Create a zip archive
//     $zip = new ZipArchive();
//     $zipFileName = 'images.zip';

//     if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
//         foreach ($imageFiles as $image) {
//             $imagePath = '../admin/admin_backend/uploads/' . trim($image);
//             if (file_exists($imagePath)) {
//                 $zip->addFile($imagePath, $image);
//             }
//         }
//         $zip->close();

//         // Send the zip file to the browser for download
//         header('Content-Type: application/zip');
//         header('Content-disposition: attachment; filename=' . $zipFileName);
//         header('Content-Length: ' . filesize($zipFileName));
//         readfile($zipFileName);

//         // Delete the zip file after sending
//         unlink($zipFileName);
//         exit;
//     } else {
//         echo "Failed to create ZIP file";
//     }
// } else {
//     echo "No images specified for download.";

// }

?>
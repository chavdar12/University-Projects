<?php
if (isset($_FILES['upload']) && $_FILES["upload"]["error"] == 0) {
    $file_name = $_FILES['upload']['name'];
    $file_type = $_FILES['upload']['type'];
    $file_size = $_FILES['upload']['size'];
    $file_tmp = $_FILES['upload']['tmp_name'];

    $allowed_extensions = array('txt', 'png', 'jpg', 'jpeg');
    $upload_max_size = 20000000;

    $filename = pathinfo($file_name);
    $extension = strtolower($filename['extension']);

    if (in_array($extension, $allowed_extensions)) {
        if ($file_size <= $upload_max_size) {
            $upload_path = 'C:/xampp/htdocs/PHP/dom/6/6-2/upload/';
            $uploaded_file = $upload_path . basename($file_name);
            if (move_uploaded_file($file_tmp, $uploaded_file)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File size must be up to " . $upload_max_size/1000000 . " MB.";
        }
    } else {
        echo "Only " . implode(", ", $allowed_extensions) . " files are allowed.";
    }
}

<?php
require_once("../app/helpers/json_handler.php");
require_once("../app/helpers/general.php");


function insert_product($data)
{
    append_json('../app/storage/JSON/products.json', $data);
}

function get_last_product()
{
    return get_last_id("../app/storage/JSON/products.json");
}

function get_image_new_path($file, $uploadDir = '../app/storage/images/')
{
    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // Get the temporary file path and destination path
    $fileTmpPath = $file['tmp_name'];
    $destPath = $uploadDir . basename($file['name']);

    // Move the uploaded file and return the normalized path
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        return str_replace('\\', '/', $destPath); // Normalize slashes
    }

    // Return false if the upload fails
    return false;
}

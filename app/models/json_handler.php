<?php

function readJson($filePath)
{
    if (!file_exists($filePath)) {
        return [];
    }
    $json = file_get_contents($filePath);
    return json_decode($json, true);
}

function writeJson($file, $array)
{
    $data = readJson($file);
    $data[] = $array;
    file_put_contents($file, json_encode($data), JSON_PRETTY_PRINT);
}

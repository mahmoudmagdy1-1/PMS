<?php

function read_json($filePath)
{
    if (!file_exists($filePath)) {
        return [];
    }
    $json = file_get_contents($filePath);
    return json_decode($json, true);
}

function append_json($file, $array)
{
    $data = read_json($file);
    $data[] = $array;
    file_put_contents($file, json_encode($data), JSON_PRETTY_PRINT);
}

function replace_json($file, $array)
{
    file_put_contents($file, json_encode($array, JSON_PRETTY_PRINT));
}

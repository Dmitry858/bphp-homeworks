<?php

$result_arr = [];

$csv = array_map("str_getcsv", file("data.csv"));
$keys = explode(";", $csv[0][0]);

for ($i = 1; $i < count($csv); $i++) {
    $values = explode(";", $csv[$i][0]);
    $values = array_combine($keys, $values);
    $result_arr[] = $values;
}

$json = json_encode($result_arr, JSON_UNESCAPED_UNICODE);

file_put_contents('data.json', $json);

?>
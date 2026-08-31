<?php

function singleNumber($nums)
{
    $counts = array_count_values($nums);
    $result = [];

    foreach ($counts as $num => $count) {
        if ($count === 2) {
            $result[] = $num;
        }
    }

    return $result;
}

$array = [1, 2, 3, 1, 4, 4, 6, 5, 5, 5, 5];
$result = singleNumber($array);

// 結果を出力
foreach ($result as $value) {
    echo $value . PHP_EOL;
}
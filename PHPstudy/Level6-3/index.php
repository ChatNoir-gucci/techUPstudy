<?php
$fp = fopen("member.csv", "r");

if ($fp === false) {
    die("エラー:ファイルを開くことができません。");
}

while (($line = fgetcsv($fp)) !== false) {
    foreach ($line as $col) {
        echo $col . "<br />";
    }
    echo "<br />";
}

fclose($fp);
?>
<?php
//課題1
$now = date('Y-m-d H:i:s');
printf("現在の日時: %s\n", $now);
echo "<br><br>";


//課題2
$today = date("Y-m-d");
$yserday = date("Y-m-d", strtotime("-1 day"));
$tomorrow = date("Y-m-d", strtotime("+1 day"));
$nextWeek = date("Y-m-d", strtotime("+1 week"));

printf("今日は%sです。\n", $today);
echo "<br>";
printf("昨日は%sです。\n", $yserday);
echo "<br>";
printf("明日は%sです。\n", $tomorrow);
echo "<br>";
printf("来週は%sです。\n", $nextWeek);
echo "<br><br>";

//課題3
$todayTimestamp = strtotime("today");
$threeMonthsLater = date("Y-m-d", strtotime("+3 months", $todayTimestamp));

$threeMonthsLaterTimestamp = strtotime($threeMonthsLater);
$diffSeconds = $threeMonthsLaterTimestamp - $todayTimestamp;
$diffDays = $diffSeconds / (60 * 60 * 24);

printf("今日から3か月後の日付は、%sです。\n", $threeMonthsLater);
echo "<br>";
printf("これは今日から%d日後の日付です。\n", $diffDays);

?>
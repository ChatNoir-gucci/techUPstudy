<?php
//1. 人物データ
$person1 = ["name" => "一郎", "age" => 27, "hobby" => "サッカー"];
$person2 = ["name" => "二郎", "age" => 24, "hobby" => "野球"];
$person3 = ["name" => "三郎", "age" => 21, "hobby" => "バレーボール"];
$person4 = ["name" => "四郎", "age" => 25, "hobby" => "バドミントン"];

//2. 人物リスト
$people = array_merge([$person1, $person2, $person3, $person4]);

//3. 年齢順並び替え
usort($people, function($a, $b) {
    return $a["age"] <=> $b["age"];
});

//4. 出力
foreach ($people as $person) {
    printf("名前：%s (%d歳) - 趣味：%s<br>", $person["name"], $person["age"], $person["hobby"]);
}

//5. 平均年齢の計算
$ages = array_column($people, "age");
$averageAge = array_sum($ages) / count($ages);
printf("平均年齢：%.1f歳<br>", $averageAge);

?>
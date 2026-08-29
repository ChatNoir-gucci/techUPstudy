<?php
session_start();

$cookieKey = "username";
$message = "";
$errorMessage = "";

function validateName($name)
{
    if (trim($name) === "") {
        throw new Exception("エラー：名前が入力されていません。");
    }
    return $name;
}

function saveCookie($key, $value)
{
    return setcookie($key, $value, time() + 10);
}

function deleteCookie($key)
{
    setcookie($key, "", time() - 60);
    unset($_COOKIE[$key]);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["delete"])) {
        deleteCookie($cookieKey);
        $message = "Cookieを削除しました。";
    } else {

        $inputName = isset($_POST["username"]) ? $_POST["username"] : "";

        try {
            $validName = validateName($inputName);

            if (saveCookie($cookieKey, $validName)) {
                $_COOKIE[$cookieKey] = $validName;
                $message = "Cookieに「" . htmlspecialchars($validName) . "」を保存しました。（10秒後に削除されます）";
            } else {
                $errorMessage = "Cookieの保存に失敗しました。ブラウザの設定を確認してください。";
            }

        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
        } finally {
            $message .= "<br>処理が終了しました。";
        }
    }
}

if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}

$currentCookie = isset($_COOKIE[$cookieKey]) ? htmlspecialchars($_COOKIE[$cookieKey]) : "（未保存）";

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>P-4学習課題</title>
</head>
<body>

<h1>名前入力フォーム</h1>

<form method="post">
    <label for="username">名前：</label>
    <input type="text" id="username" name="username"
           value="<?= $currentCookie !== "（未保存）" ? $currentCookie : "" ?>">
    <button type="submit">保存する</button>
</form>

<form method="post">
    <button type="submit" name="delete" value="1">Cookieを削除する</button>
</form>

<hr>

<?php if ($message !== ""): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<?php if ($errorMessage !== ""): ?>
    <p style="color:red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<h2>現在のCookieの値</h2>
<p>現在保存されている名前：<?= $currentCookie ?></p>
<p>※Cookieは10秒後に自動的に削除されます。</p>

<hr>

<p><?= (int)$_SESSION['count'] ?>回目の訪問です。</p>

</body>
</html>
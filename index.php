<?php
// index.php

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['username'], $_GET['password'])) {
    $username = $_GET['username'];
    $password = $_GET['password'];

    $db = new SQLite3('users.db');
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $db->query($query);

    if ($result && $result->fetchArray()) {
        echo "✅ 登入成功";
    } else {
        echo "❌ 登入失敗";
    }
} else {
    echo '<form method="GET">
            帳號: <input type="text" name="username"><br>
            密碼: <input type="password" name="password"><br>
            <input type="submit" value="登入">
          </form>';
}
?>

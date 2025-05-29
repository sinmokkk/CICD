<?php
// vuln.php

// 模擬登入功能，存在 SQL Injection 漏洞
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // 與 SQLite 資料庫連線（測試用）
    $db = new PDO('sqlite:users.db');

    // ⚠️ SQL Injection 漏洞：未使用預處理語句
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $db->query($query);

    if ($result && $result->fetch()) {
        echo "✅ 登入成功";
    } else {
        echo "❌ 登入失敗";
    }
} else {
    // 簡單的登入表單
    echo '<form method="POST">
            帳號: <input type="text" name="username"><br>
            密碼: <input type="password" name="password"><br>
            <input type="submit" value="登入">
          </form>';
}
?>

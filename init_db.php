<?php
// 建立簡單的 SQLite 資料庫與帳號密碼
$db = new PDO('sqlite:users.db');
$db->exec("CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY, username TEXT, password TEXT)");
$db->exec("INSERT INTO users (username, password) VALUES ('admin', 'admin123')");
echo "資料庫初始化完成";
?>

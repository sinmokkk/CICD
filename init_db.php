<?php
// 建立或打開 SQLite 資料庫檔案
$db = new SQLite3('users.db');

// 建立 users 表格（如果尚未存在）
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT,
    password TEXT
)");

// 插入一筆帳號密碼資料
$db->exec("INSERT INTO users (username, password) VALUES ('admin', 'admin123')");

echo "資料庫初始化完成";

// 關閉連線
$db->close();
?>

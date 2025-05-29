<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class IndexTest extends TestCase
{
    public function testLoginSuccess(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['username'] = 'admin';
        $_POST['password'] = '1234';

        // 建立測試資料庫
        $db = new SQLite3('users.db');
        $db->exec("DROP TABLE IF EXISTS users");
        $db->exec("CREATE TABLE users (username TEXT, password TEXT)");
        $db->exec("INSERT INTO users (username, password) VALUES ('admin', '1234')");

        // 開始捕捉輸出
        ob_start();
        include __DIR__ . '/../index.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('✅ 登入成功', $output);
    }

    public function testLoginFailure(): void
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['username'] = 'admin';
        $_POST['password'] = 'wrongpass';

        ob_start();
        include __DIR__ . '/../index.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('❌ 登入失敗', $output);
    }
}

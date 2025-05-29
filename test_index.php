<?php
function testLogin($username, $password) {
    $url = 'http://localhost/index.php';

    $data = http_build_query([
        'username' => $username,
        'password' => $password
    ]);

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $data,
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    echo "=== 測試：帳號={$username} 密碼={$password} ===\n";
    echo $result . "\n\n";
}

// DataBase 要改

// 測試案例
testLogin("' OR '1'='1", "' OR '1'='1");
testLogin("admin' --", '');

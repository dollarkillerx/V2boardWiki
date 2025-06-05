<?php

class User {
    public $phone;
    public $password;
    public $balance;

    public function __construct($phone, $password, $balance = 0)
    {
        $this->balance = $balance;
        $this->phone = $phone;
        $this->password = $password;
    }
}

// mem database
// mem database：改为 map（phone => User）
$users = [
    '123' => new User('123', '123', 100),
    '456' => new User('456', '456', 200),
    '789' => new User('789', '789', 300),
];
function input($prompt) {
    echo $prompt;
    return trim(fgets(STDIN));
}

function showMenu() {
    echo "\n==== 银行系统功能列表 ====\n";
    echo "1. 入金（输入账户名）\n";
    echo "2. 出金（输入账户名和密码）\n";
    echo "3. 转账（输入发送账户名、密码和接收账户名）\n";
    echo "4. 查看所有用户余额\n";
    echo "0. 退出\n";
}

function main() {
    global $users;
    while (true) {
        showMenu();
        $choice = input("请输入你的选择:");

        switch ($choice) {
            case '1':
                $phone = input("请输入账户名（phone number）:");
                echo $phone;
                if (!isset($users[$phone])) {
                    echo "找不到该用户\n";
                    break;
                }

                $amount = floatval(input("请输入入金金额："));
                $users[$phone]->balance += $amount;
                echo "入金成功 余额为 {$users[$phone]->balance}\n";
                break;
            case '2':
                $phone = input("请输入账户名（phone number）:");
                if (!isset($users[$phone])) {
                    echo "找不到该用户\n";
                    break;
                }

                $password = input("请输入密码:");
                if ($users[$phone]->password !== $password) {
                    echo "密码错误\n";
                    break;
                }

                $amount = floatval(input("请输入出金金额："));
                if ($users[$phone]->balance < $amount) {
                    echo "余额不足\n";
                    break;
                }
                $users[$phone]->balance -= $amount;
                echo "出金成功 余额为 {$users[$phone]->balance}\n";
                break;
            case '3':
                $senderPhone = input("请输入账户名（phone number）:");
                if (!isset($users[$senderPhone])) {
                    echo "找不到该用户\n";
                    break;
                }

                $senderPassword = input("请输入密码:");
                if ($users[$senderPhone]->password !== $senderPassword) {
                    echo "密码错误\n";
                    break;
                }

                $receiverPhone = input("请输入接收账户名（phone number）:");
                if (!isset($users[$receiverPhone])) {
                    echo "找不到该用户\n";
                    break;
                }

                $amount = floatval(input("请输入转账金额："));
                if ($users[$senderPhone]->balance < $amount) {
                    echo "余额不足\n";
                    break;
                }
                $users[$senderPhone]->balance -= $amount;
                $users[$receiverPhone]->balance += $amount;
                echo "转账成功 余额为 {$users[$senderPhone]->balance}\n";
                break;
            case '4':
                echo "所有用户余额:\n";
                foreach ($users as $user) {
                    echo "{$user->phone} {$user->balance}\n";
                }
                break;
            case '0':
                return;
            default:
                echo "无效的选择\n";
        }
    }
}

main();
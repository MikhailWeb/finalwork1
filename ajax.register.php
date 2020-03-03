<?php
require_once('classes/class.db.php');
require_once('functions.php');

$row = DB::run("SELECT * FROM tbl_users WHERE lower(trim(email)) = ?", [strtolower(trim($_POST['email']))])->fetch();
if (!$row) {
    DB::run("INSERT INTO tbl_users (username, email, phone) values (?, ?, ?)", [trim($_POST['name']), trim($_POST['email']), trim($_POST['phone'])]);
    $userId = DB::lastInsertId();
} else {
    $userId = $row['id'];
}

$orderContent = [['name' => 'DarkBeefBurger', 'price' => 500, 'currency' => 'руб.', 'count' => 1, 'unit' => 'шт.']];
try {
    DB::run("INSERT INTO tbl_orders (user_id, address, items, notes, options) values (?, ?, ?, ?, ?)", [$userId, strAddress($_POST), strContent($orderContent), trim($_POST['comment']), strOptions($_POST)]);
    $orderId = DB::lastInsertId();
    $orderAdd = 1;
    $msg = 'Заказ успешно создан';
} catch (Exception $e) {
    $orderAdd = 0;
    $msg = 'При создании заказа возникла ошибка.';
}

$text = "Заказ № " . $orderId . chr(13) . chr(10) . chr(13) . chr(10);
$text .= "Ваш заказ будет доставлен по адресу: " . chr(13) . chr(10) . strAddress($_POST) . chr(13) . chr(10) . chr(13) . chr(10);
$text .= "Содержимое: " . chr(13) . chr(10) . chr(13) . chr(10) . strContent($orderContent) . chr(13) . chr(10) . chr(13) . chr(10);
$orderCount = DB::run("SELECT count(*) as cnt FROM tbl_orders WHERE user_id = ?", [$userId])->fetch();
if (!$orderCount) {
    $text .= 'Спасибо! Это Ваш первый заказ в "Mr. Burger".';
} else {
    $text .= 'Спасибо! Это Ваш ' . $orderCount['cnt'] . ' заказ в "Mr. Burger".';
}

file_put_contents("orders/order_" . $orderId . "_" . date("d.m.Y_h.i", time()).".txt", $text);

die(json_encode(['res' => $orderAdd, 'msg' => $msg]));

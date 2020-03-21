<?php
require_once('../base/init.php');

$loader = new \Twig\Loader\FilesystemLoader('tpl');
$twig = new \Twig\Environment($loader, array('cache' => false));

$list = !empty(trim($_REQUEST['list'])) ? trim($_REQUEST['list']) : 'clients';
switch ($list) {
    case 'orders':
        $stmt = Db::run("SELECT id, (select username from tbl_users where tbl_users.id = tbl_orders.user_id) as username, address, items, notes, options, dt FROM tbl_orders");
        $data['orders'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tpl = 'orders';
        break;
    case 'clients':
    default:
        $stmt = Db::run("SELECT id, username, email, phone FROM tbl_users");
        $data['clients'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tpl = 'clients';
        break;
}

echo $twig->render($tpl . '.twig', $data);

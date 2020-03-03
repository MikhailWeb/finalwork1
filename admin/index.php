<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Центр управления заказами</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <h3>Центр управления заказами</h3>

<?php
require_once('../classes/class.db.php');
require_once('../functions.php');
?>

    <h4>Клиенты</h4>
    <table border="1" cellspacing="0" cellpadding="3" style="width: 700px; margin-bottom: 50px;">
        <tr style="background-color: #efefef;">
            <th>Id</th>
            <th>Клиент</th>
            <th>Телефон</th>
            <th>Емэйл</th>
        </tr>
<?php
$stmt = DB::run("SELECT id, username, email, phone FROM tbl_users");
while ($row = $stmt->fetch(PDO::FETCH_LAZY))
{
    echo '<tr>
            <td style="text-align: center;">' . $row->id . '</td>
            <td>' . $row->username . '</td>
            <td style="text-align: center;">' . $row->phone . '</td>
            <td style="text-align: center;">' . $row->email . '</td>
          </tr>';
}

?>
    </table>

    <h4>Заказы</h4>
    <table border="1" cellspacing="0" cellpadding="3" style="width: 95%;">
        <tr style="background-color: #efefef;">
            <th>Id</th>
            <th>Дата и время заказа</th>
            <th>Клиент</th>
            <th>Содержимое</th>
            <th>Примечание</th>
            <th>Детали</th>
            <th>Адрес доставки</th>
        </tr>
        <?php
        $stmt = DB::run("SELECT id, (select username from tbl_users where tbl_users.id = tbl_orders.user_id) as username, address, items, notes, options, dt FROM tbl_orders");
        while ($row = $stmt->fetch(PDO::FETCH_LAZY))
        {
            echo '<tr>
                    <td style="text-align: center;">' . $row->id . '</td>
                    <td style="text-align: center;">' . $row->dt . '</td>
                    <td>' . $row->username . '</td>
                    <td>' . $row->items . '</td>
                    <td>' . $row->notes . '</td>
                    <td>' . $row->options . '</td>
                    <td>' . $row->address . '</td>
                  </tr>';
        }
        ?>
    </table>

</body>
</html>



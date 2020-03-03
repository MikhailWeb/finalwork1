<?php

/**
 * @param $arrData
 * @return string
 */
function strAddress($arrData)
{
    $address = '';
    foreach ($arrData as $key => $value) {
        switch ($key) {
            case 'street':
                $address .= (trim($value) <> '') ? 'ул. ' . trim($value) : '';
                break;
            case 'home':
                $address .= (trim($value) <> '') ? ', д. ' . trim($value) : '';
                break;
            case 'part':
                $address .= (trim($value) <> '') ? ', к. ' . trim($value) : '';
                break;
            case 'appt':
                $address .= (trim($value) <> '') ? ', кв. ' . trim($value) : '';
                break;
            case 'floor':
                $address .= (trim($value) <> '') ? ', этаж ' . trim($value) : '';
                break;
        }
    }
    return $address;
}


/**
 * @param $arrData
 * @return string
 */
function strOptions($arrData)
{
    $options = '';
    foreach ($arrData as $key => $value) {
        switch ($key) {
            case 'payment':
                $options .= ($value == 'odd_money') ? 'Оплата: требуется сдача' : 'Оплата: оплата картой';
                break;
            case 'callback':
                $options .= chr(13) . chr(10) . chr(13) . chr(10) . 'Обратная связь: не перезванивать';
                break;
        }
    }
    return $options;
}

/**
 * @param $arrContent
 * @return string
 */
function strContent($arrContent)
{
    $content = ''; $total = 0;
    foreach ($arrContent as $item) {
        $content .= $item['name'] . ' - ' . $item['count'] . ' ' . $item['unit'] . '; Сумма = ' . $item['price'] . ' * '. $item['count'] . ' = ' .$item['price'] * $item['count'] . ' ' . $item['currency'] . chr(13) . chr(10) ;
        $total += $item['price'] * $item['count'];
    }
    return $content . chr(13) . chr(10) . 'Итог: ' . $total . ' ' . $arrContent[0]['currency'];
}
<div class="modal-body">
    <h2>Заказ оформлен</h2>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
</div>
<?php
session_start();
include 'base.php';
include 'supplement.php';

if (count($_SESSION['basket']) > 0) {
    $price = 0;
    ob_start();
    foreach ($_SESSION['basket'] as $index => $val) {

        $exp = explode("^", $val);
        $val1 = explode("*", $exp[1]);
        $val1 = array_diff($val1, array(''));
        if (isset($val1[0])) {
            $it = str_replace("|", "", stristr($val1[0], '|'));
            $item_array = explode(':', $it);
            $item = $base[$item_array[0]]['set'][$item_array[1]];
            $price += $item['size'][$item_array[2]] * $exp[0];
            echo "------------------------------------------------------------------\n";
            echo "Катег.: " . $base[$item_array[0]]['title'] . "\n";
            echo "Назв.: " . $item['title'] . "\n";
            echo "<b>Кол: " . $exp[0] . " *  " . $item['size'][$item_array[2]] . " грн. = " . ($item['size'][$item_array[2]] * $exp[0]) . " грн.</b>\n";
            if (count($val1) > 1) {
                unset($val1[0]);
                foreach ($val1 as $sup) {
                    $sup = str_replace("|", "", stristr($sup, '|'));
                    $price += $supplement[$sup]['price'];
                    echo "   + " . $supplement[$sup]['name'] . " - <b>" . $supplement[$sup]['price'] . " грн.</b>\n";
                }
            }
            //echo "------------------------------------------------------------------\n\n";
        }
    }
    echo "------------------------------------------------------------------\n";
    echo "<b>Итого к оплате: " . $price . " грн.</b>";


    $output = ob_get_contents();

    ob_end_clean();
    $post = [
        'mess' => 'Имя: ' . $_POST['l1'] . "\n Тел.: " . $_POST['l2'] . "\n Адр.: " . $_POST['l3'] . "\n" . $output,
    ];

    /** Зменить ссылку на бота, бот находится на другом сайте */
    // $ch = curl_init();

    // curl_setopt($ch, CURLOPT_URL, "https://bot.fiesta.kr.ua");
    // curl_setopt($ch, CURLOPT_POST, 1);
    // curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // $server_output = curl_exec($ch);

    // curl_close($ch);
}
$_SESSION = array();

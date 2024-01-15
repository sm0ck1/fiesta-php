<?php
session_start();

include 'base.php';
include 'supplement.php';
if (count($_SESSION['basket']) > 0) {
    $price = 0;

    echo '<div class="modal-body">';
    
    ksort($_SESSION['basket']);
    foreach ($_SESSION['basket'] as $index => $val) {

        $exp = explode("^", $val);
        $val1 = explode("*", $exp[1]);
        $val1 = array_diff($val1, array(''));
        if (isset($val1[0])) {
            $it = str_replace("|", "", stristr($val1[0], '|'));
            $item_array = explode(':', $it);
            $item = $base[$item_array[0]]['set'][$item_array[1]];
            $price += $item['size'][$item_array[2]] * $exp[0];
            ?>
            <table class="table table-bordered">

                <tr class="position-relative">
                    <td style="width: 75px"><img class="img-fluid" src="<?= $item['image'] ?>" alt="">
                    </td>
                    <td class="align-middle border-0"><?= $item['title'] ?></td>
                    <td class="text-right align-middle border-0">
                        <span onclick="deleteItem(<?= $index ?>);" class="position-absolute" style="top: 0; right: 10px; cursor: pointer">&times;</span>
                        <b><?= $item['size'][$item_array[2]] * $exp[0] ?> грн.</b>
                    </td>

                </tr>
                <? if (count($val1) > 1) { ?>
                    <tr>
                        <td colspan="3">
                            <?
                            unset($val1[0]);
                            echo "<ul class='list-unstyled'>";
                            foreach ($val1 as $sup) {
                                $sup = str_replace("|", "", stristr($sup, '|'));
                                $price += $supplement[$sup]['price'];
                                ?>
                                <li>+ <?= $supplement[$sup]['name'] ?> - <b><?= $supplement[$sup]['price'] ?> грн.</b>
                                </li>
                                <?
                            }
                            echo "</ul>";
                            ?>
                        </td>
                    </tr>
                <? } ?>
                <tr>
                    <td colspan="3">
                        <div class="text-right">
                            <div class="btn-group btn-group-sm ml-3" role="group" aria-label="Basic example">
                                <button type="button" disabled class="btn text-dark "><?= $item['size'][$item_array[2]] ?> грн. *</button>
                                <button type="button" class="btn btn-success" onclick="$('#bCount').text((parseInt($('#bCount').text()) <= 1) ? 1 : parseInt($('#bCount').text()) - 1); goList(this, '<?= $exp[1] ?>', <?= $exp[0] ?>, '<?= $exp[1] ?>', 'minus');">-</button>
                                <button type="button" disabled class="btn text-dark bCount"><?= $exp[0] ?></button>
                                <button type="button" class="btn btn-success" onclick="$(this).parent().find('.bCount').text(parseInt($(this).parent().find('.bCount').text()) + 1); goList(this, '<?= $exp[1] ?>', <?= $exp[0] ?>, '<?= $exp[1] ?>', 'plus');">+</button>
                            </div>

                        </div>


                    </td>
                </tr>
            </table>

            <?


        }
        //$val2 = explode("|", )

    }
    echo '<div class="w-100 text-right priceTotal"><b>Итого к оплате: <span>' . $price . '</span> грн.</b></div>
    <div class="alert alert-warning text-center mt-3">Упаковка оплачивается отдельно</div>
    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Добавить еще</button>
                <button type="button" class="btn btn-primary" onclick="checkout();">Оформить заказ</button>
            </div>';
    ?>
    <script>
        function goList(self, info, count, i, curs) {
            $('.modal-body').find('button').prop('disabled', true);
            if (curs === 'plus') {
                count++;
            } else {
                count--;
            }
            $.get('/deleteItem.php?id=' + i, function (res) {
                if (count > 0) {
                    $.post("/setBasket.php", {new_pizza: count + '^' + info}, function () {
                        $.post('/getBasket.php', {}, function (res) {
                            $('#getBasketbody').html(res);
                        });
                    });
                } else {
                    updateBasket();
                    $.post('/getBasket.php', {}, function (res) {
                        $('#getBasketbody').html(res);
                    });
                }
            });

        }
    </script>
    <?
} else {
    echo "<div class=\"modal-body\">
    <h2>Корзина пустая</h2>
</div>";
}
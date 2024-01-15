<?php

include 'base.php';
include 'supplement.php';

if (isset($_REQUEST['id'])) {
    if (isset($base[$_REQUEST['id']]) && $base[$_REQUEST['id']]['set'][$_REQUEST['id_pizza']]) {
        $item = $base[$_REQUEST['id']]['set'][$_REQUEST['id_pizza']];
        ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <p class="lead text-muted" style="font-size: 14px"><?= $item['com'] ?></p>
                    <hr>
                </div>
                <div class="col-sm-4">
                    <img class="img-fluid d-none d-md-block" src="<?= $item['image'] ?>" alt="">
                </div>
                <div class="col-sm-8  flex-grow cc">
                    <? $i = 0; ?>

                    <? foreach ($item['size'] as $weight => $price) { ?>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pizza" id="radio<?= $weight ?><?= $price ?>" value="<?= $price ?>|<?= $_REQUEST['id'] ?>:<?= $_REQUEST['id_pizza'] ?>:<?= $weight ?>" <?= ($i == 0) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="radio<?= $weight ?><?= $price ?>">
                                <? if ($_REQUEST['id'] != 0 && $_REQUEST['id'] != 1 && $_REQUEST['id'] != 2) { ?>
                                    <?= (!empty($weight)) ? $weight . " г. -" : "" ?> <b><?= $price ?> грн.</b>
                                <? } else { ?>
                                    <?= (!empty($weight)) ? $weight . " см. -" : "" ?> <b><?= $price ?> грн.</b>

                                <? } ?>
                            </label>
                        </div>

                        <? $i++ ?>

                    <? } ?>
                </div>
                <? if ($_REQUEST['id'] == 0 || $_REQUEST['id'] == 1 || $_REQUEST['id'] == 2) { ?>
                    <div class="col-sm-12">
                        <hr class="pt-2">
                        <div class="row">
                            <? foreach ($supplement as $key => $price) {
                                ?>
                                <div class="col-sm-6 py-1" style="font-size: 14px">
                                    <div class="form-check">
                                        <input class="form-check-input" name="supplement" type="checkbox" value="<?= $price['price'] ?>|<?= $key ?>" id="defaultCheck<?= $key ?>">
                                        <label class="form-check-label w-100" for="defaultCheck<?= $key ?>">
                                            <span class="text-left"><?= $price['name'] ?></span> -
                                            <span class="text-center"><b><?= $price['price'] ?> грн.</b></span>
                                        </label>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="col-sm-12 text-right">
                <hr class="pt-2">
                <div class="btn-group mr-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-success" onclick="$('#bCount').text((parseInt($('#bCount').text()) <= 1) ? 1 : parseInt($('#bCount').text()) - 1); listCheck();">-</button>
                    <button type="button" disabled class="btn text-dark" id="bCount">1</button>
                    <button type="button" class="btn btn-success" onclick="$('#bCount').text(parseInt($('#bCount').text()) + 1); listCheck();">+</button>
                </div>
                <b>Цена: <span class="totalPrice">0</span> грн.</b>
            </div>
            <div class="d-none okcheck"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Закрыть</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="goBasketPizza();">Положить в корзину</button>
        </div>
        <script>

            function listCheck() {
                var sList = 0;
                let a = $('#bCount').text();
                var cList = a + "^";
                $('input').each(function () {
                    if ($(this).prop('checked')) {
                        var fc = $(this).val();
                        cList += fc + "*";
                        var price = fc.split("|");
                        sList += Number(price[0]);
                    }
                });

                $(".totalPrice").html(sList * parseInt(a));
                $(".okcheck").html(cList);
                console.log(cList);
            }

            listCheck();
            $('input').change(function () {
                listCheck();
            });

            function goBasketPizza() {
                var ok = $('.okcheck').html();
                $.post("/setBasket.php", {new_pizza: ok}, function (res) {
                    updateBasket();
                    getBasket();
                });
            }
        </script>
        <?
    }
}

<?
if (isset($_URL[1])) {
    if (!isset($base[$_URL[1]])) {
        redirect("/404");
        exit();
    }
    $item = $base[$_URL[1]];
?>
    [[h1|<?= $item['title'] ?> :: ]][[desc|<?= $item['desc'] ?> :: ]]
    <section class="b2 pb-5 position-relative flex-grow cc" id="b2">
        <!--        <div class="position-absolute pimg-0 d-none d-lg-block"><img src="/tpl/images/p.png" alt=""></div>-->
        <!--        <div class="position-absolute pimg-1 d-none d-lg-block"><img src="/tpl/images/p-1.png" alt=""></div>-->
        <div class="container">

            <h2 class="pt-5 display-4">- <?= $item['title'] ?> -</h2>

            <p class="lead pb-5"><?= $item['desc'] ?></p>

            <div class="row justify-content-md-center">
                <? if (count($item['menu']) > 0) { ?>

                    <? foreach ($item['menu'] as $menu) { ?>
                        <img class="img-fluid" src="<?= $menu ?>" alt="">
                    <? } ?>

                <? } elseif (count($item['set']) > 0) { ?>
                    <? foreach ($item['set'] as $key => $set_item) { ?>
                        <div class="col-sm-6 col-md-4 mb-5">
                            <div class="card mb-4 border-0 bg-transparent menu-item image-wrapper" style="height: 360px;">
                                <div class="image-darken-mask"></div>
                                <img class="card-img-top img-fluid shadow" src="<?= $set_item['image'] ?>" alt="Card image cap">

                                <div class="caption text-center">
                                    <?= $set_item['title'] ?>
                                </div>

                                <div class="desc">
                                    <div style="font-size: 14px">
                                        <?= $set_item['com'] ?>
                                    </div>
                                    <hr class="bg-white">
                                    <ul class="list-unstyled mt-2">
                                        <? foreach ($set_item['size'] as $weight => $price) { ?>

                                            <? if ($_URL[1] != 0 && $_URL[1] != 1 && $_URL[1] != 2) { ?>
                                                <li><?= (!empty($weight)) ? $weight . " г. -" : "" ?> <?= $price ?> грн.</li>
                                            <? } else { ?>
                                                <li><?= (!empty($weight)) ? $weight . " см. -" : "" ?> <?= $price ?> грн.</li>
                                            <? } ?>

                                        <? } ?>
                                    </ul>
                                    <button class="btn btn-success btn-block mt-1 buyPizza" data-id="<?= $_URL[1] ?>" data-pizza="<?= $key ?>" data-name="<?= $set_item['title'] ?>" data-toggle="modal" data-target="#changePizza">Заказать</button>
                                   
                                    </div>
                            </div>
                        </div>
                    <? } ?>
                    <script>
                        $('.buyPizza').click(function() {
                            $("#changePizzaBody").html("");
                            var name = $(this).data('name');
                            var id = $(this).data('id');
                            var id_pizza = $(this).data('pizza');
                            $("#changePizzaLabel").html($(this).data('name'));
                            $.post('/getBase.php', {
                                id: id,
                                name: name,
                                id_pizza: id_pizza
                            }, function(res) {
                                $("#changePizzaBody").html(res);
                            });
                        });
                    </script>

                <? } ?>

            </div>
            <? if ($_URL[1] == 0) { ?>

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="pt-5 display-4">- Добавки -</h2>
                        <table class="table table-hover w-100">
                            <? foreach ($supplement as $price) {
                            ?>
                                <tr>
                                    <td><?= $price['name'] ?></td>
                                    <td> <?= $price['weight'] ?></td>
                                    <td><?= $price['price'] ?> грн.</td>
                                </tr>
                            <? } ?>
                        </table>
                    </div>
                </div>
            <? } ?>
        </div>

    </section>
<? } else { ?>
    [[h1|Меню :: ]][[desc|Меню :: ]]
    <section class="b2 py-5 position-relative flex-grow cc" id="b2">
        <div class="container">
            <h2 class=" display-4" id="b5">- Меню -</h2>
            <div class="row">
                <? foreach ($base as $id => $item) { ?>
                    <div class="col-sm-6 col-md-4 mb-5">
                        <a href="/menu/<?= $id ?>" class="card mb-4 border-0 bg-transparent menu-item image-wrapper">
                            <div class="image-darken-mask"></div>
                            <img class="card-img-top img-fluid shadow" src="<?= $item['image'] ?>" alt="Card image cap">

                            <div class="caption text-center">
                                <?= $item['title'] ?>
                            </div>
                            <div class="desc">
                                <?= $item['desc'] ?>
                            </div>
                        </a>
                    </div>
                <? } ?>
            </div>
        </div>
    </section>
<? } ?>
<div class="text-center my-3 h5 font-weight-bold">
    * Изображения на сайте имеют ознакомительный характер и могут отличаться от блюд, фактически приготовленных нашими поварами
</div>
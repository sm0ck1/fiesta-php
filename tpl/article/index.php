<?
if (isset($_URL[1])) {
    $item = $article[$_URL[1]];
    ?>
    [[h1|<?= $item['title'] ?> :: ]][[desc|<?= $item['short'] ?> :: ]]
    <section class="b2 py-5 position-relative flex-grow cc" id="b2">


        <div class="container">
            <h2 class="pb-5 display-4">- <?= $item['title'] ?> -</h2>

            <div class="row justify-content-md-center">

                <?= $item['long'] ?>

            </div>
        </div>
<!--        <div class="position-absolute pimg-0 d-none d-lg-block"><img class="img-fluid" src="/tpl/images/p.png" alt=""></div>-->
<!--        <div class="position-absolute pimg-1 d-none d-lg-block"><img src="/tpl/images/p-1.png" alt=""></div>-->
    </section>
<? } else { ?>
[[h1| Статьи :: ]][[desc| Статьи :: ]]
<section class="b2 position-relative flex-grow cc" id="b2">
    <div class="container">
        <h2 class=" py-5 display-4" id="b4">- Статьи -</h2>

        <div class="row">
            <? foreach ($article as $id => $item) { ?>
                <div class="col-sm-6 col-md-4 mb-5">
                    <a href="/article/<?= $id ?>" class="card mb-4 border-0 bg-transparent menu-item image-wrapper">
                        <div class="image-darken-mask"></div>
                        <img class="card-img-top img-fluid shadow" src="<?= $item['image'] ?>" alt="Card image cap">

                        <div class="caption text-center">
                            <?= $item['title'] ?>
                        </div>
                        <div class="desc" style="font-size: 14px">
                            <?= $item['short'] ?>
                        </div>
                    </a>
                </div>
            <? } ?>
        </div>
    </div>
</section>
<? } ?>
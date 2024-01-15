<nav class="  py-1 navbar navbar-dark navbar-expand-lg bg-red text-white shadow">
    <div class="container">
        <a href="/" class="logos d-inline-block d-lg-none align-top navbar-brand"><img class="img-fluid" src="/tpl/images/logo1.png" alt="">
        </a>
        <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center nowrap" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item flex-grow cc mx-lg-2">
                    <a class="nav-link text-white display-6" href="/menu">Меню</a>
                </li>
                <li class="nav-item flex-grow cc mx-lg-2">
                    <a class="nav-link text-white display-6" href="/promotion">Акции</a>
                </li>
                <li class="nav-item flex-grow cc mx-lg-2">
                    <a class="nav-link  text-white display-6" href="/delivery">Доставка</a>
                </li>
                <li class="nav-item">
                    <a href="/" class="d-none d-lg-block align-top imglogo"><img class="img-fluid" src="/tpl/images/logo1.png" alt="">
                    </a>
                </li>
                <li class="nav-item flex-grow cc mx-lg-2">
                    <a class="nav-link text-white display-6" href="/about">О нас</a>
                </li>
                <li class="nav-item flex-grow cc mx-lg-2">
                    <a class="nav-link text-white display-6" href="/article">Статьи</a>
                </li>
                <li class="nav-item flex-grow cc mx-lg-2">
                    <a class="nav-link text-white display-6" href="/contacts">Контакты</a>
                </li>
                <li class="nav-item flex-grow cc mx-lg-2">
                    <a class="nav-link text-white display-6 getBusket" href="#" data-toggle="modal" data-target="#exampleModal" style="background:Tomato">
                        <span class="fa-layers fa-fw px-2">
                            <i class="fas fa-shopping-basket"></i>
                            <span class="fa-layers-counter basket_counter">0</span>
                          </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<? if (!isset($_URL[0])) { ?>
    <div class="bg-home  d-none d-md-block">
        <div class="slog flex-grow cc">
            <h2 class="display-4">
                FIESTA
                <div>СЛЕДУЙ ЗА ПИЦЦЕЙ</div>
                <hr>
            </h2>

        </div>
        <video id="video" width="100%" height="auto" autoplay loop="loop" preload="auto" poster="/tpl/images/banner.jpg" muted>
            <source src="/tpl/cover.mp4" />
        </video>
    </div>

<? } ?>

<? if (!isset($_URL[0])) { ?>
    <div class="address-line">
        <div class="container">
            <div class="row">
                <div class="col-md-6 display-5 text-white">
                    <span>г.Кривой Рог, ул.Героев АТО, 30 Г </span><br>РК UNION
                </div>
                <div class="col-md-6  display-5 py-3 text-white">
                    <a class="display-5 text-white btn" href="tel:380987187707" style="background-color: #5fbcf3;">
                        <i class="fas fa-phone display-5 text-white"></i>
                        (098) 718 77 07
                    </a>
                </div>
            </div>
        </div>
    </div>
<? } ?>
<script>

    function reHeight() {
        const height = $(window).height() - 155;
        $('.bg-home').css({
            'min-height': height,
            'height': height
        });
    }

    function updateBasket() {
        $.get('/getCounterBasket.php', function (res) {
            $(".basket_counter").html(res);
        });
    }

    function checkout() {
        $.get('/checkout.php', function (res) {
            $("#getBasketbody").html(res);
        });
    }

    function deleteItem(id) {
        $.get('/deleteItem.php?id=' + id, function (res) {
            $("#getBasketbody").html("");
            $.post('/getBasket.php', {}, function (res) {
                $("#getBasketbody").html(res);
                updateBasket();
            });
        });
    }

    function successCheckout() {
        var i1 = $("#exampleInputEmail1").val();
        var i2 = $("#exampleInputEmail2").val();
        var i3 = $("#exampleInputEmail3").val();
        $('#checkout .alert').remove();
        if (i1 == '' || i2 == '') {
            $('#checkout').append('<div class="alert alert-warning" role="alert">Не заполнено обязательное поле</div>');
        } else {
            $.post('/successCheckout.php', {l1: i1, l2: i2, l3: i3}, function (res) {
                $("#getBasketbody").html(res);
                updateBasket();
            });
        }
    }

    updateBasket();

    /*
        reHeight();
        $(window).resize(function () {
            reHeight();
        });*/

    function getBasket() {
        $('#changePizza').modal('hide');
        $("#getBasketbody").html("");
        $.post('/getBasket.php', {}, function (res) {
            $("#getBasketbody").html(res);
            $('#exampleModal').modal('show')
        });
    }

    $(document).ready(function () {
        $('.getBusket').click(function () {
            getBasket();
        });

        // Custom
        var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
            var stickyHeight = sticky.outerHeight();
            var stickyTop = stickyWrapper.offset().top;
            if (scrollElement.scrollTop() >= stickyTop) {
                stickyWrapper.height(stickyHeight);
                sticky.addClass("is-sticky");
            }
            else {
                sticky.removeClass("is-sticky");
                stickyWrapper.height('auto');
            }
        };

        // Find all data-toggle="sticky-onscroll" elements
        $('[data-toggle="sticky-onscroll"]').each(function () {
            var sticky = $(this);
            var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
            sticky.before(stickyWrapper);
            sticky.addClass('sticky');

            // Scroll & resize events
            $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
                stickyToggle(sticky, stickyWrapper, $(this));
            });

            // On page load
            stickyToggle(sticky, stickyWrapper, $(window));
        });
    });

</script>
<? if (isset($_URL[0])) { ?>
    <div class="address-line bg-red border-top border-dark">
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Корзина заказа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="getBasketbody"></div>

        </div>
    </div>
</div>
<div class="modal fade" id="changePizza" tabindex="-1" role="dialog" aria-labelledby="changePizzaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="changePizzaLabel"></h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="changePizzaBody"></div>
        </div>
    </div>
</div>
<div class="modal-body">
    <form id="checkout">
        <div class="form-group">
            <label for="exampleInputEmail1">Имя (Обязательно)</label>
            <input type="text" class="form-control" id="exampleInputEmail1" required placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail2">Номер телефона (Обязательно)</label>
            <input type="text" class="form-control" id="exampleInputEmail2" required placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Адрес доставки</label>
            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="">
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
    <button type="button" class="btn btn-primary" onclick="successCheckout();">Подтверждаю заказ</button>
</div>
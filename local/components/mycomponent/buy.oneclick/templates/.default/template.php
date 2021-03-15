<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script>
    var divName = document.getElementById('buy-one-click-insert');
    divName.insertAdjacentHTML('beforebegin', '<button class="btn-one-click">Купить в один клик</button>\n' +
        '<div class="one-click" style="display: none;" >\n' +
        '    <input class="phone" placeholder="Номер телефона">\n' +
        '    <a href="#" class="buy-one-click" data-id="<?=$arParams["PRODUCT_ID"]?>"\n' +
        '       data-params-object="<?=$arParams["ACTION"]?>">Оформить заказ</a>\n' +
        '</div>\n' +
        '<div class="status"></div>\n' +
        '<div class="error"></div>');
</script>





<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<button class="btn-one-click">Купить в один клик</button>
<div class="one-click" style="display: none;" >
    <input class="phone" placeholder="Номер телефона">
    <a href="#" class="buy-one-click" data-id="<?=$arParams["PRODUCT_ID"]?>"
            data-params-object="<?=$arParams["ACTION"]?>">Оформить заказ</a>
</div>
<div class="status"></div>
<div class="error"></div>


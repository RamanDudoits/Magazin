<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<button class="btn-one-click">Купить в один клик</button>
<div class="one-click" style="display:none;">
    <input class="phone" placeholder="Номер телефона">
    <button class="buy-one-click" data-id="<?=$arParams["PRODUCT_ID"]?>"
            data-params-object="<?if ($arParams["OBJECT_COMPONENT"] == "Каталог") {
               echo "catalog";
            } else echo "basket";?>">Оформить заказ</button>
</div>
<div class="status"></div>
<div class="error"></div>


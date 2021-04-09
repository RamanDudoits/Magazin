<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

?>
<section class="">
    <div class="carousel">
        <ul class="slides">
            <?foreach ($arResult["ITEMS"] as $arItem):?>
                <li style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>);  class="flex-active-slide"></li>
            <?endforeach;?>
        </ul>
    </div>
    <? $APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => SITE_DIR."include/donna/advertising.baner.php"),
        false
    );?>
</section>






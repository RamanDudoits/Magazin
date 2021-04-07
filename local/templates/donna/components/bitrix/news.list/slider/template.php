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

    <?$APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "sale.new.item",
        array(
            "ADD_SECTIONS_CHAIN" => "Y",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "Y",
            "CACHE_TIME" => "36000000",
            "CACHE_TYPE" => "A",
            "COUNT_ELEMENTS" => "N",
            "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
            "FILTER_NAME" => "sectionsFilter",
            "IBLOCK_ID" => "9",
            "IBLOCK_TYPE" => "donna",
            "SECTION_CODE" => "",
            "SECTION_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SECTION_ID" => $_REQUEST["SECTION_ID"],
            "SECTION_URL" => "#SITE_DIR#/catalog-donna/#CODE#/",
            "SECTION_USER_FIELDS" => array(
                0 => "",
                1 => "",
            ),
            "SHOW_PARENT_NAME" => "Y",
            "TOP_DEPTH" => "2",
            "VIEW_MODE" => "TILE",
            "COMPONENT_TEMPLATE" => "sale.new.item",
            "HIDE_SECTION_NAME" => "N",
            "LIST_COLUMNS_COUNT" => "6"
        ),
        false
    );?>

</section>






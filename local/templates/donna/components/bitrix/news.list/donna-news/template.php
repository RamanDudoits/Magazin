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
$this->setFrameMode(true);
?>
<div class="title-section">
   <? echo GetMessage("NEWS")?>
</div>

<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
    <div class="news-item">
        <div class="news-image">
            <a href="#"> <img class="preview_picture"
                              border="0"
                              src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                              width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                              height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                              alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                              title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
                              style="float:left"> </a>
        </div>

        <div class="news-description">
            <div class="date">
                <span class="news-date-time"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
            </div>
            <h3><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h3>
            <p>
                <?echo $arItem["PREVIEW_TEXT"];?>        </p>
            <a class="more" href="#"><? echo GetMessage("MORE_DETAILS")?></a>
        </div>
    </div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

<div class="button-section">
    <a class="see-all" href="http://bitrix/donna-news"><? echo GetMessage("ALL_NEWS")?></a>
</div>
</div>





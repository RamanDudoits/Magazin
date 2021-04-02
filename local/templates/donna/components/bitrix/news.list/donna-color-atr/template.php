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

$newWidth = 70;
$newHeight = 107;
$renderImage = CFile::ResizeImageGet($arResult["ITEMS"][0]["PREVIEW_PICTURE"], Array("width" => $newWidth, "height" => $newHeight));?>

<div class="images-color">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
            <span><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"
                     onmouseout="this.class=''"
                     onmouseover="this.class='active'">
                    <?= CFile::ShowImage($renderImage['src'], $newWidth, $newHeight, "border=0", "", true);?>
                </a>
            </span>
			<?else:?>
            <?= CFile::ShowImage($renderImage['src'], $newWidth, $newHeight, "border=0", "", true);?>
			<?endif;?>
		<?endif?>
<?endforeach;?>
</div>




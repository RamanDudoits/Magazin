<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
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

$arViewModeList = $arResult['VIEW_MODE_LIST'];
$arViewStyles = array(
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder().'/images/line-empty.png'
	),
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

$curPage = explode('/', $APPLICATION->GetCurPage());
    $sectionName = "";
    foreach ($curPage as $value)
    {
        if ($value != "")
        {
            $sectionName = $value;
        }
    }?>

    <div class="<? echo $arCurView['CONT']; ?>"><?
        if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID'])
        {
            $this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

            ?><h1
                class="<? echo $arCurView['TITLE']; ?>"
                id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"
            ><a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><?
                echo (
                    isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
                    ? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
                    : $arResult['SECTION']['NAME']
                );
            ?></a></h1><?
        }
        ?>
    </div>
    <div class="side-menu">
        <?for ($i = 1;$i <= 2; $i++)
            {?>
                <ul class="<? echo $arCurView['LIST']; ?>">
                        <?foreach ($arResult['SECTIONS'] as &$arSection)
                        {

                            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
                            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

                            if (false === $arSection['PICTURE'])
                                $arSection['PICTURE'] = array(
                                    'SRC' => $arCurView['EMPTY_IMG'],
                                    'ALT' => (
                                        '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                        ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
                                        : $arSection["NAME"]
                                    ),
                                    'TITLE' => (
                                        '' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                        ? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
                                        : $arSection["NAME"]
                                    )
                                );?>
                                <?if(($arSection["CODE"] != "novinki" && $arSection["CODE"] != "sale") && $i == 1){
                                    ?><li  id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                                        <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                        ><? echo $arSection['NAME']; ?></a>
                                    </li>
                                    <?}?>
                                <?if(($arSection["CODE"] == "novinki" || $arSection["CODE"] == "sale") && $i == 2){

                                    ?><li  id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
                                    <a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"
                                    ><? echo $arSection['NAME']; ?></a>
                                    </li>
                                <?}?>
                      <?}
                        unset($arSection);?>
                </ul>
            <?}?>
    </div>

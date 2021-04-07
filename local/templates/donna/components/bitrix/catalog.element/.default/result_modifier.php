<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

//MORE PHOTO
$arResult["MORE_PHOTO_ELEMENT"] = array();
$arResult["SNAP_ELEMENT_ID"] = array();
if(isset($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]) && is_array($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]))
{
    foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $FILE)
    {
        $FILE = CFile::GetFileArray($FILE);

        if(is_array($FILE))
            $arResult["MORE_PHOTO_ELEMENT"][]=$FILE;
    }
}


//SNAP ELEMENT
    foreach($arResult["PROPERTIES"]["SNAP_BY_COLOR"]["VALUE"] as $ID)
    {
            $arResult["SNAP_ELEMENT_ID"][]=$ID;
    }
$arSelect = array("DETAIL_PICTURE", "DETAIL_PAGE_URL", "CODE", "NAME");
$arFilter = array("ID" => $arResult["SNAP_ELEMENT_ID"],);
$res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
while ($ob = $res->GetNext())
{
    $arResult["SNAP_ELEMENT"]["URL"][$ob["CODE"]] = $ob["DETAIL_PAGE_URL"];
    $arResult["SNAP_ELEMENT"]["PIC"][$ob["CODE"]] = $ob["DETAIL_PICTURE"];
    $arResult["SNAP_ELEMENT"]["NAME"][$ob["CODE"]] = $ob["NAME"];
}
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();?>

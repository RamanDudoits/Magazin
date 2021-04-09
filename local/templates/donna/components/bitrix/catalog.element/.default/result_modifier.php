<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

//MORE PHOTO
$arResult["MORE_PHOTO_ELEMENT"] = array();

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
    if ($arResult["PROPERTIES"]["COLOR_ARTNUBER"]["VALUE"] >= 1)
    {
        $arSelect = array("DETAIL_PICTURE", "DETAIL_PAGE_URL", "CODE", "NAME");
        $arFilter = array("PROPERTY_COLOR_ARTNUBER" => $arResult["PROPERTIES"]["COLOR_ARTNUBER"]["VALUE"], "IBLOCK_ID" => $arParams["IBLOCK_ID"]);
        $res = CIBlockElement::GetList(array(), $arFilter, false, array(), $arSelect);
        while ($ob = $res->GetNext()) {
            if ($ob["CODE"] != $arResult["CODE"]) {
                $arResult["SNAP_ELEMENT"]["URL"][$ob["CODE"]] = $ob["DETAIL_PAGE_URL"];
                $arResult["SNAP_ELEMENT"]["PIC"][$ob["CODE"]] = $ob["DETAIL_PICTURE"];
                $arResult["SNAP_ELEMENT"]["NAME"][$ob["CODE"]] = $ob["NAME"];
            }
        }
    }
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

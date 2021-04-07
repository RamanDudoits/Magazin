<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
        return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$colorSchemes = array(
    "green" => "bx-green",
    "yellow" => "bx-yellow",
    "red" => "bx-red",
    "blue" => "bx-blue",
);
if(isset($colorSchemes[$arParams["TEMPLATE_THEME"]]))
{
    $colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
}
else
{
    $colorScheme = "";
}
?>
<div class="page-navigation">

    <?if($arResult["bDescPageNumbering"] === true):?>

        <?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
            <?if($arResult["bSavePage"]):?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><</a>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">1</a>
            <?else:?>
                <?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
                    <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><</a>
                <?else:?>
                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><</a>
                <?endif?>
                <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>1</span></a>
            <?endif?>
        <?else:?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><</a>
            <span>1</span>
        <?endif?>

        <?
        $arResult["nStartPage"]--;
        while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):
            ?>
            <?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
            <span><?=$NavRecordGroupPrint?></span>
        <?else:?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span><?=$NavRecordGroupPrint?></span></a>
        <?endif?>

            <?$arResult["nStartPage"]--?>
        <?endwhile?>

        <?if ($arResult["NavPageNomer"] > 1):?>
            <?if($arResult["NavPageCount"] > 1):?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span><?=$arResult["NavPageCount"]?></span></a>
            <?endif?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">></a>
        <?else:?>
            <?if($arResult["NavPageCount"] > 1):?>
                <span><?=$arResult["NavPageCount"]?></span>
            <?endif?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>">></a>
        <?endif?>


    <?else:?>

        <?if ($arResult["NavPageNomer"] > 1):?>
            <?if($arResult["bSavePage"]):?>

                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><</a>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><span>1</span></a>
            <?else:?>
                <?if ($arResult["NavPageNomer"] > 2):?>

                    <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><</a>
                <?else:?>

                    <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><</a>
                <?endif?>
                <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1</a>
            <?endif?>
        <?else:?>
            <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><</a>
            <span>1</span>
        <?endif?>

        <?
        $arResult["nStartPage"]++;
        while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
            ?>
            <?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>

            <span><?=$arResult["nStartPage"]?></span>
        <?else:?>

            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
        <?endif?>
            <?$arResult["nStartPage"]++?>
        <?endwhile?>

        <?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
            <?if($arResult["NavPageCount"] > 1):?>
                <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a>
            <?endif?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">></a>
        <?else:?>
            <?if($arResult["NavPageCount"] > 1):?>
                <span><?=$arResult["NavPageCount"]?></span>
            <?endif?>
            <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">></a>
        <?endif?>
    <?endif?>
</div>
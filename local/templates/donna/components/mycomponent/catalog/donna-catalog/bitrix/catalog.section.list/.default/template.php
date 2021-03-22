<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog">
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
?>

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
    if (0 < $arResult["SECTIONS_COUNT"])
    {
    ?>
    </div>
    <div class="sidebar-left">
    <div class="drop-wrap">
        <div class="side-menu">
    <?
    for ($i = 1;$i <= 2; $i++) {?>
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
        <?}
    }?>
    </ul>
</div>
        <div class="filter">
            <div class="filter-wrap">
                <ul>
                    <li><input type="checkbox" id="id-1" name="" value="Новая коллекция" ><label for="id-1">Новая коллекция</label></li>
                    <li><input type="checkbox" id="id-2" name="" value="Скидки" ><label for="id-2">Скидки</label></li>
                </ul>

            </div>

            <div class="filter-wrap">
                <div class="title-filter">Материал</div>

                <ul>
                    <li><input type="checkbox" id="id-3" name="" value="эластан" ><label for="id-3">эластан</label></li>
                    <li><input type="checkbox" id="id-4" name="" value="хлопок" ><label for="id-4">хлопок</label></li>
                    <li><input type="checkbox" id="id-5" name="" value="вискоза" ><label for="id-5">вискоза</label></li>
                    <li><input type="checkbox" id="id-6" name="" value="полиэстер" ><label for="id-6">полиэстер</label></li>
                </ul>

            </div>

            <div class="filter-wrap">
                <div class="title-filter">Цвет</div>
                <div class="result">Найдено: 49 товаров</div>
                <ul class="color-filter">
                    <li><span style="background-color: #94223b;"></span></li>
                    <li><span style="background-color: #020606;"></span></li>
                    <li><span style="background-color: #006fba;"></span></li>
                    <li class="active"><span style="background-color: #00aa9d;"></span></li>
                    <li><span style="background-color: #b57d4e;"></span></li>
                    <li><span style="background-color: #aa2293;"></span></li>
                    <li><span style="background-color: #ff9500;"></span></li>
                    <li><span style="background-color: #00b63e;"></span></li>
                </ul>

            </div>

            <div class="filter-wrap">
                <div class="title-filter">Размер <a href="#" class="info"></a></div>

                <ul class="filter-size">
                    <li><input type="checkbox" id="id-7" name="" value="40" ><label for="id-7">40</label></li>
                    <li><input type="checkbox" id="id-8" name="" value="42" ><label for="id-8">42</label></li>
                    <li><input type="checkbox" id="id-9" name="" value="44" ><label for="id-9">44</label></li>
                </ul>

                <ul class="filter-size last">
                    <li><input type="checkbox" id="id-10" name="" value="46" ><label for="id-10">46</label></li>
                    <li><input type="checkbox" id="id-11" name="" value="48" ><label for="id-11">48</label></li>
                    <li><input type="checkbox" id="id-12" name="" value="50" ><label for="id-12">50</label></li>
                </ul>
            </div>

            <div class="filter-wrap">
                <div class="title-filter">Сезон</div>

                <ul>
                    <li><input type="checkbox" id="id-13" name="" value="весна/лето 2016" ><label for="id-13">весна/лето 2016</label></li>
                    <li><input type="checkbox" id="id-14" name="" value="осень/зима 2017" ><label for="id-14">осень/зима 2017</label></li>
                </ul>

            </div>

            <div class="filter-wrap">
                <div class="title-filter">Стиль</div>

                <ul>
                    <li><input type="checkbox" id="id-15" name="" value="вечернее платье" ><label for="id-15">вечернее платье</label></li>
                    <li><input type="checkbox" id="id-16" name="" value="коктельное платье" ><label for="id-16">коктельное платье</label></li>
                </ul>

            </div>

            <div class="filter-wrap">
                <div class="title-filter">Цена, руб.</div>

                <div id="slider-range"></div>
                <div class="range-min"></div>
                <div class="range-max"></div>
                <a href="#" class="choose">Подобрать</a>
            </div>

        </div>
    </div>
    </div>



    <div class="catalog-content">
        <div class="catalog-top">
            <div class="catalog-top-text">
                <h1>Платья</h1>
                <p>Покупая женские платья оптом от производителя, владельцы магазинов хотят быть уверены, что этот товар будет
                    пользоваться спросом. Ведь большинство женщин в заботе о собственном комфорте давно предпочли платьям
                    и юбкам брючные костюмы и джинсы, не задумываясь при этом, что они добровольно отказываются
                    от преимуществ, которыми их наградила природа. Стоит напомнить им, что правильно подобранное платье способно
                    в мгновение ока вернуть дамам их природную привлекательность, сексуальность и желанность.</p>
            </div>

            <div class="offer">
                <a href="#"><img src="images/opt.jpg" alt="" /></a>
            </div>
        </div>

        <div class="sort">
            <div class="sort-left">
                Сортировать:   <a class="active s-top">по цене</a> <a>по новизне</a>
            </div>
            <div class="sort-right">
                <div class="page-navigation">
                    <a href="#"><</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <span>5</span>
                    <a href="#">></a>
                </div>
            </div>
        </div>


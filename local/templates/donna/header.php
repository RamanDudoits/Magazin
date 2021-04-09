<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php use Bitrix\Main\Page\Asset;?>
<!DOCTYPE html>
<head>
    <?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle();?></title>
<?
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.css");
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/styles.css");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/jquery.flexslider.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/slick.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/jquery.fancybox.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/jquery.zoom.min.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/jquery.fancybox-media.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/scripts/scripts.js");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/fix.js");
Asset::getInstance()->addJs('https://code.jquery.com/jquery-1.12.4.js');
Asset::getInstance()->addJs('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<![endif]-->
</head>
<body>
<section id="wrapper">
    <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

  <!-- start header -->
  <header id="header">
    <div class="inner">
        <div id="logo">
            <a href="<?=SITE_DIR;?>" title="Site name"><!-- logo should be used as background --></a>
        </div>
        <div class="search-section">
            <!-- start form -->
            <?$APPLICATION->IncludeComponent(
	"bitrix:search.form", 
	"donna-search-form", 
	array(
		"PAGE" => "#SITE_DIR#catalog-donna/",
		"USE_SUGGEST" => "N",
		"COMPONENT_TEMPLATE" => "donna-search-form"
	),
	false
);?>
            <!-- end of form -->
        </div>
        <div class="phones">
          <?$APPLICATION->IncludeComponent(
              "bitrix:main.include",
              "",
              array(
                  "AREA_FILE_SHOW" => "file",
                  "PATH" => SITE_DIR."include/donna/phone.php"),
              false
          );?>
        </div>
        <div class="acount-info">
                <div class="bag">
                    <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line", 
	".default", 
	array(
		"HIDE_ON_BASKET_PAGES" => "Y",
		"PATH_TO_AUTHORIZE" => "",
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"POSITION_FIXED" => "N",
		"SHOW_AUTHOR" => "Y",
		"SHOW_EMPTY_VALUES" => "Y",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_PRODUCTS" => "N",
		"SHOW_REGISTRATION" => "Y",
		"SHOW_TOTAL_PRICE" => "Y",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
                </div>
            </div>
    </div>
  </header>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"menu_donna", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "menu_donna",
		"MENU_THEME" => "red"
	),
	false
);?>


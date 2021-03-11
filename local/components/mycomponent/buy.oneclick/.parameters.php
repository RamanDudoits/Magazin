<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(!CModule::IncludeModule("iblock"))
    return;
$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "ID_CATALOG" => array(
            "PARENT" => "BASE",
            "NAME" => "ID инфоблока с каталогом товаров",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "",
        ),
        "CACHE_TIME"  =>  array("DEFAULT"=>36000000),
        "DETAIL_URL" => CIBlockParameters::GetPathTemplateParam(
            "DETAIL",
            "DETAIL_URL",
            "Шаблон ссылки на детальный просмотр товара",
            "",
            "URL_TEMPLATES"
        ),
        "OBJECT_COMPONENT" => array(
            "NAME" => "Объект вызова компонента",
            "TYPE" => "STRING",
        ),
    ),
);
?>

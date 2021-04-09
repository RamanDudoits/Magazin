<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<form action="" method="get">
    <fieldset>
        <div class="search">
            <? if ($arParams["USE_SUGGEST"] === "Y"):
                if (mb_strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"])) {
                    $arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
                    $obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
                    $obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
                }
                ?>
                <? $APPLICATION->IncludeComponent(
                "bitrix:search.suggest.input",
                "",
                array(
                    "NAME" => "q",
                    "VALUE" => $arResult["REQUEST"]["~QUERY"],
                    "INPUT_SIZE" => 40,
                    "DROPDOWN_SIZE" => 10,
                    "FILTER_MD5" => $arResult["FILTER_MD5"],
                ),
                $component, array("HIDE_ICONS" => "Y")
            ); ?>
            <? else: ?>
                <input type="text" name="q" value="<?= $arResult["REQUEST"]["QUERY"] ?>" size="40"
                       placeholder="Поиск по названию и номеру артикула"/>
            <? endif; ?>
            <input type="submit" name="submit" value="">
            <input type="hidden" name="how" value="<? echo $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>"/>
            <? if ($arParams["SHOW_WHEN"]): ?>
                <script>
                    var switch_search_params = function () {
                        var sp = document.getElementById('search_params');
                        var flag;

                        if (sp.style.display == 'none') {
                            flag = false;
                            sp.style.display = 'block'
                        } else {
                            flag = true;
                            sp.style.display = 'none';
                        }

                        var from = document.getElementsByName('from');
                        for (var i = 0; i < from.length; i++)
                            if (from[i].type.toLowerCase() == 'text')
                                from[i].disabled = flag

                        var to = document.getElementsByName('to');
                        for (var i = 0; i < to.length; i++)
                            if (to[i].type.toLowerCase() == 'text')
                                to[i].disabled = flag

                        return false;
                    }
                </script>
                <br/><a class="search-page-params" href="#"
                        onclick="return switch_search_params()"><? echo GetMessage('CT_BSP_ADDITIONAL_PARAMS') ?></a>
            <? endif ?>
        </div>
    </fieldset>
</form>



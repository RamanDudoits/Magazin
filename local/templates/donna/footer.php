<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<!-- start footer -->
	<footer id="footer">
    <div class="inner">
        <div class="footer-phones">
              <?$APPLICATION->IncludeComponent(
                  "bitrix:main.include",
                  "",
                  array(
                      "AREA_FILE_SHOW" => "file",
                      "PATH" => SITE_DIR."include/donna/phone_footer.php"),
                  false
              );?>
      </div>

        <div class="menu-footer-info">
        <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"menu_donna_footer", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "menu_donna_footer"
	),
	false
);?>
    </div>

        <div class="menu-footer-company">
            <?$APPLICATION->IncludeComponent(
                "bitrix:menu",
                "menu_donna_footer_company",
                array(
                    "ALLOW_MULTI_SELECT" => "N",
                    "CHILD_MENU_TYPE" => "left",
                    "DELAY" => "N",
                    "MAX_LEVEL" => "1",
                    "MENU_CACHE_GET_VARS" => array(
                    ),
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "ROOT_MENU_TYPE" => "bottom",
                    "USE_EXT" => "N",
                    "COMPONENT_TEMPLATE" => "menu_donna_footer_company"
                ),
                false
            );?>
        </div>
        <div class="social">
            <h3>Социальные сети</h3>
            <div class="icons">
                <?$APPLICATION->IncludeComponent(
                    "mycomponent:eshop.socnet.links",
                    "social",
                    array(
                        "FACEBOOK" => "https://www.facebook.com/1CBitrix",
                        "VKONTAKTE" => "https://vk.com/bitrix_1c",
                        "INSTAGRAM" => "https://instagram.com/1CBitrix/",
                        "COMPONENT_TEMPLATE" => "social",
                        "TWITTER" => "",
                        "GOOGLE" => ""
                    ),
                    false,
                    array(
                        "HIDE_ICONS" => "N"
                    )
                );?>
            </div>
            <div class="subscribe-section">
              <!-- start form -->
                <?$APPLICATION->IncludeComponent("bitrix:sender.subscribe", "donna-subscribe", Array(
                    "AJAX_MODE" => "N",	// Включить режим AJAX
                    "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
                    "CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    "CACHE_TYPE" => "A",	// Тип кеширования
                    "CONFIRMATION" => "N",	// Запрашивать подтверждение подписки по email
                    "HIDE_MAILINGS" => "Y",	// Скрыть список рассылок, и подписывать на все
                    "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                    "SHOW_HIDDEN" => "N",	// Показать скрытые рассылки для подписки
                    "USER_CONSENT" => "N",	// Запрашивать согласие
                    "USER_CONSENT_ID" => "0",	// Соглашение
                    "USER_CONSENT_IS_CHECKED" => "Y",	// Галка по умолчанию проставлена
                    "USER_CONSENT_IS_LOADED" => "N",	// Загружать текст сразу
                    "USE_PERSONALIZATION" => "Y",	// Определять подписку текущего пользователя
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                    false
                );?>
              <!-- end of form -->
            </div>
        </div>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "PATH" => SITE_DIR."include/donna/rights.php"),
                false
            );?>
    </div>
	</footer>
	<!-- end of footer -->
</section>
<!-- end of wrapper -->
</body>
</html>

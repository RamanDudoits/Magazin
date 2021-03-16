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

        <div class="subscribe-section">
          <!-- start form -->
          <form action="" method="post">
            <fieldset>
              <div class="subscribe">
<!--                <input type="text" name="subscribe-input" placeholder="Подпишитесь на новости" value="" />-->
<!--                <input type="submit" name="submit" value="" />-->
                  <?$APPLICATION->IncludeComponent(
	"bitrix:sender.subscribe", 
	"subscribe", 
	array(
		"SET_TITLE" => "N",
		"COMPONENT_TEMPLATE" => "subscribe",
		"USE_PERSONALIZATION" => "Y",
		"CONFIRMATION" => "N",
		"HIDE_MAILINGS" => "Y",
		"SHOW_HIDDEN" => "N",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	),
	false
);?>
              </div>
            </fieldset>
          </form>
          <!-- end of form -->
        </div>
      </div>

      </div>
        <div class="rights">
        <?$APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR."include/donna/rights.php"),
            false
        );?>
        </div>
    </div>
	</footer>
	<!-- end of footer -->

</section>
<!-- end of wrapper -->

</body>
</html>

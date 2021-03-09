<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");?>


  <!-- About Section -->
  <section class="page-section bg-primary" id="home">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">О прикорме</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Споры о том, на что ловить и чем лучше прикармливать, наверное, никогда не закончатся. Одни предпочи-тают новомодные прикор-мки, изготовленные фирма-ми, специализи-рующимися на их производ-стве; другие ни за что не променяют кастрюлю с душистым варевом, над которой они колдовали не один час, словно баба-яга над зельем. Но речь не об этом. Я не буду давать советы и рецепты, а выскажусь по поводу некоторых заблуждений. В большинстве статей пишут, что рыбу можно перекормить большим количеством прикормки. Но никто не пишет конкретных цифр - сколько "много", а сколько "мало" или "достаточно". Потому что никто не знает и никогда не узнает, сколько же это "много". Для одного и килограмм - уже много, а для другого и ведра кажется мало. Но причина не в этом. Давайте на проблему посмотрим с другой стороны.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section">
    <div class="container">
      <h2 class="text-center mt-0">Почему мы?</h2>
      <hr class="divider my-4">
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?=SITE_TEMPLATE_PATH?>/img/1.jpg">
            <img class="img-fluid" src="<?=SITE_TEMPLATE_PATH?>/img/1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-name">Прекраснвые пейзажи</div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?=SITE_TEMPLATE_PATH?>/img/2.jpg">
            <img class="img-fluid" src="<?=SITE_TEMPLATE_PATH?>/img/2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-name">Крупная рыба</div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?=SITE_TEMPLATE_PATH?>/img/3.jpg">
            <img class="img-fluid" src="<?=SITE_TEMPLATE_PATH?>/img/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-name">Тихие места</div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?=SITE_TEMPLATE_PATH?>/img/4.jpg">
            <img class="img-fluid" src="<?=SITE_TEMPLATE_PATH?>/img/4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-name">Дзен</div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?=SITE_TEMPLATE_PATH?>/img/5.jpg">
            <img class="img-fluid" src="<?=SITE_TEMPLATE_PATH?>/img/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-name">Оcнащение плавсредствами</div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="<?=SITE_TEMPLATE_PATH?>/img/6.jpg">
            <img class="img-fluid" src="<?=SITE_TEMPLATE_PATH?>/img/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-name">Хорошее настроение</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
<?$APPLICATION->IncludeComponent("bitrix:news.list", "template2", Array(
	"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "-",	// Тип информационного блока (используется только для проверки)
		"IBLOCK_ID" => $_REQUEST["ID"],	// Код информационного блока
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"FILTER_NAME" => "",	// Фильтр
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SHOW_404" => "N",	// Показ специальной страницы
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
	),
	false
);?>

<!--    <section class="page-section bg-dark text-white" id="news">-->
<!--    <div class="container text-center">-->
<!--        <h2 class="mb-0">Новости</h2>-->
<!--        <hr class="divider my-4">-->
<!--    </div>-->
<!--    <div class="container text-center">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-4 text-center">-->
<!--                <div class="card bg-secondary border border-dark">-->
<!--                    <img class="card-img-top" src="--><?//=SITE_TEMPLATE_PATH?><!--/img/1.jpg" alt="News image cap">-->
<!--                    <div class="card-body ">-->
<!--                        <h5 class="card-title">News title</h5>-->
<!--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                        <a href="#" class="btn btn-primary">Go somewhere</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 text-center">-->
<!--                <div class="card bg-secondary border border-dark">-->
<!--                    <img class="card-img-top" src="--><?//=SITE_TEMPLATE_PATH?><!--/img/2.jpg" alt="News image cap">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">News title</h5>-->
<!--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                        <a href="#" class="btn btn-primary">Go somewhere</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 text-center">-->
<!--                <div class="card bg-secondary border border-dark">-->
<!--                    <img class="card-img-top" src="--><?//=SITE_TEMPLATE_PATH?><!--/img/3.jpg" alt="News image cap">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">News title</h5>-->
<!--                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
<!--                        <a href="#" class="btn btn-primary">Go somewhere</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    </section>-->
  

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Связаться с нами</h2>
			<hr class="divider my-4">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+1 (202) 555-0149</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
        </div>
      </div>
    </div>
  </section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
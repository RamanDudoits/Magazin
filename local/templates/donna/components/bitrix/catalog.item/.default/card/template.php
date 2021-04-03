<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */



?>

<div class="goods">
    <? if ($item['LABEL'])
    {
        foreach ($item["PROPERTIES"]["LABEL"]["VALUE_XML_ID"] as $key => $value)
        {
            if ($value == "new")
            {
                $divSaleNew = '<div class="new"></div>';
            } elseif ($value == "limit")
            {
                $divSaleNew = '<div class="sale"></div>';
            }
        }

        echo $divSaleNew;
    }?>

    <div class="goods-inner">


        <div class="goods-slider">
           <?
            $LINE_ELEMENT_COUNT = 2;
            if(count($arResult["MORE_PHOTO"])>0):?>
            <ul class="slides">
            <?foreach($arResult["MORE_PHOTO"] as $PHOTO):?>
            <? $file = CFile::ResizeImageGet($PHOTO, array('width'=>228, 'height'=>'339'), BX_RESIZE_IMAGE_EXACT, true);
            ?>

                <li><a rel="example_group" href="<?=$PHOTO["SRC"]?>" name="more_photo"   title="<?=$arResult["ITEM"]["CODE"]?>">  <img border="0" src="<?=$file["src"]?>" width="<?=$file["width"]?>" height="<?=$file["height"]?>"
                             alt="<?=$arResult["ITEM"]["NAME"]?>" title="<?=$arResult["ITEM"]["NAME"]?>" /></li></a>

            <?endforeach?>

            </ul>
            <?endif?>
        </div>



    <div class="goods-description">
        <h3><a href="<?=$item['DETAIL_PAGE_URL']?>" title="<?=$productTitle?>"><?=$productTitle?></a></h3>
	<?
	if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
	{
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
		{
			switch ($blockName)
			{
				case 'price': ?>

                    <div class="cost">
						<span class="product-item-price-current" id="<?=$itemIds['PRICE']?>">
							<?
							if (!empty($price))
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
								{
									echo Loc::getMessage(
										'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
										array(
											'#PRICE#' => $price['PRINT_RATIO_PRICE'],
											'#VALUE#' => $measureRatio,
											'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
										)
									);
								}
								else
								{
									echo $price['RATIO_PRICE'] . " " . $price['CURRENCY'];
								}
							}
							?>
						</span>
                        <?
                        if ($arParams['SHOW_OLD_PRICE'] === 'Y')
                        {
//                            echo "<pre>"; print_r( $price); echo "</pre>";
                            ?>
                            <span class="product-item-price-old" id="<?=$itemIds['PRICE_OLD']?>"
								<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
								<?=$price['RATIO_BASE_PRICE'] . " " . $price['CURRENCY']?>
							</span>&nbsp;
                            <?
                        }
                        ?>

                    </div>
					<?
					break;

				case 'props':
                    $showProductProps = !empty($item['DISPLAY_PROPERTIES']);
                    $showOfferProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];

                    if ($showProductProps || $showOfferProps)
                    {
                        ?>
                        <?
                        if ($showProductProps)
                        {
                            foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
                            {

                                ?>

                                <div class="art">
                                    <?=$displayProperty['NAME']?>
                                    <?=$displayProperty['DISPLAY_VALUE']?>
                                </div>
                                <?
                            }
                        }
                    }
                    break;

				case 'sku':?>
				<?	if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
					{
							foreach ($arParams['SKU_PROPS'] as $skuProperty)
							{
								$propertyId = $skuProperty['ID'];
								$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
								if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
									continue;
								?>
                                            <div class="sizes">
                                                <div><?=$skuProperty['NAME']?></div>

                                                <ul>
                                                    <?foreach ($skuProperty['VALUES'] as $value)
                                                    {
                                                        if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
                                                            continue;

                                                        $value['NAME'] = htmlspecialcharsbx($value['NAME']);

                                                        ?>
                                                        <li title="<?=$value['NAME']?>"
                                                            data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
                                                            <?=$value['NAME']?>
                                                        </li>
                                                    <?}?>
                                                </ul>
                                            </div>
								<?
							}
							?>

						<?
						foreach ($arParams['SKU_PROPS'] as $skuProperty)
						{
							if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
								continue;

							$skuProps[] = array(
								'ID' => $skuProperty['ID'],
								'SHOW_MODE' => $skuProperty['SHOW_MODE'],
								'VALUES' => $skuProperty['VALUES'],
								'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
							);
						}

						unset($skuProperty, $value);

						if ($item['OFFERS_PROPS_DISPLAY'])
						{
							foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
							{
								$strProps = '';

								if (!empty($jsOffer['DISPLAY_PROPERTIES']))
								{
									foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
									{
										$strProps .= '<dt>'.$displayProperty['NAME'].'</dt><dd>'
											.(is_array($displayProperty['VALUE'])
												? implode(' / ', $displayProperty['VALUE'])
												: $displayProperty['VALUE'])
											.'</dd>';
									}
								}

								$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
							}
							unset($jsOffer, $strProps);
						}
					}

					break;
			}
		}
	}?>
    </div>
    </div>
</div>















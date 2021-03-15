<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?endif?>

<div class="company-menu">
    <h3>Компания</h3>
        <ul>
        <?php for ($j = 0; $j < count($arResult)/2; $j++):?>
            <?if($arResult[$j]["SELECTED"]):?>
                <li><a href="<?=$arResult[$j]["LINK"]?>" class="selected"><?=$arResult[$j]["TEXT"]?></a></li>
            <?else:?>
                <li><a href="<?=$arResult[$j]["LINK"]?>"><?=$arResult[$j]["TEXT"]?></a></li>
            <?endif?>
        <?endfor;?>
        </ul>

<ul>
    <?php for ($i = 3; $i < count($arResult); $i++):?>
        <?if($arResult[$i]["SELECTED"]):?>
            <li><a href="<?=$arResult[$i]["LINK"]?>" class="selected"><?=$arResult[$i]["TEXT"]?></a></li>
        <?else:?>
            <li><a href="<?=$arResult[$i]["LINK"]?>"><?=$arResult[$i]["TEXT"]?></a></li>
        <?endif?>
    <?endfor;?>
</ul>
</div>
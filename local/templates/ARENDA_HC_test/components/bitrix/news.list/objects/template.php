<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
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
?>
<div class="container objects">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>



        <div class="row objects__bc">
            <div class="col-12 objects__bc_title">
                <h2>Бизнес-центр</h2>
                <div class="red-line"></div>
            </div>
            <? foreach ($arResult["BC"] as $arItem): ?>
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                <div class="col-12">
                    <div class="objects__bc_image">
                        <img width="100%" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="">
                    </div>
                    <div class="objects__bc_image_desc">
                        <p>
                            <?=$arItem["NAME"]?><br>
                            <span><?=$arItem["PROPERTIES"]["ATT_ADDRESS"]["VALUE"]["TEXT"]?></span>
                        </p>
                    </div>
                </div>
            </a>
            <? endforeach; ?>
        </div>

        <div class="row objects__tc">
            <div class="hr-top"></div>
            <div class="col-12 objects__tc_title">
                <h2>Торговые центры</h2>
                <div class="red-line"></div>
            </div>
            <div class="col-12 carousel-container">
                <div class="owl-carousel owl-theme slider_objects">

                    <? foreach ($arResult["TC"] as $arItem): ?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <div style="width: 100%" class="owl-item">
                            <div class="objects__tc_image">
                                <img width="100%" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="">
                            </div>
                            <div class="objects__tc_image_desc">
                                <p>
                                    <?=$arItem["NAME"]?><br>
                                    <span><?=$arItem["PROPERTIES"]["ATT_ADDRESS"]["VALUE"]["TEXT"]?></span>
                                </p>
                            </div>
                        </div>
                    </a>

                    <? endforeach; ?>

                </div>
            </div>
        </div>

    <div class="row objects__tc">
        <div class="hr-top"></div>
        <div class="col-12 objects__tc_title">
            <h2>Street retail</h2>
            <div class="red-line"></div>
        </div>
        <div class="col-12 carousel-container">
            <div class="owl-carousel owl-theme slider_objects">

                <? foreach ($arResult["SR"] as $arItem): ?>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                        <div style="width: 100%" class="owl-item">
                            <div class="objects__tc_image">
                                <img width="100%" src="<?=$arItem["DETAIL_PICTURE"]["SRC"]?>" alt="">
                            </div>
                            <div class="objects__tc_image_desc">
                                <p>
                                    <?=$arItem["NAME"]?><br>
                                    <span><?=$arItem["PROPERTIES"]["ATT_ADDRESS"]["VALUE"]["TEXT"]?></span>
                                </p>
                            </div>
                        </div>
                    </a>

                <? endforeach; ?>

            </div>
        </div>
    </div>
    <div style="height: 45px"></div>





<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>

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
<?
//echo "<pre>";
//print_r($arResult);
//echo "</pre>";


?>
<div id="map-detail" class="bg-object">

</div>

<div class="object">
    <div class="container">
        <div class="row">
            <div class="col-12 offers-title">
                <h2><?=$arResult["NAME"]?></h2>
                <div class="red-line"></div>
            </div>
        </div>
        <div class="row object-content">
            <div class="col-lg-7 object-img">
                <div class="owl-carousel owl-theme slider_object">
                    <?
                    foreach ($arResult["PROPERTIES"]["ATT_SLIDER"]["VALUE"] as $sliderImage):?>

                        <?$imageSrc = CFile::GetPath($sliderImage)?>
                        <div class="owl-item">
                            <img class="slider_image" src="<?=$imageSrc?>" alt="<?=$arResult["NAME"]?>">
                        </div>

                    <?endforeach;?>

                </div>
            </div>
            <div class="col-lg-5">
                <?
                $count = 1;
                $line = "bb";
                ?>
                <? foreach ($arResult["PROPERTIES"] as $PROPERTY): ?>
                    <? if ($count === count($arResult["PROPERTIES"]) -1) $line = ""?>
                    <? if ($PROPERTY["NAME"] != "Слайдер"): ?>

                    <? if ($arResult["IBLOCK_SECTION_ID"] == 3): ?>
                        <? if ($PROPERTY["NAME"] == "Этажность" || $PROPERTY["NAME"] == "Паркинг"): ?>

                            <? else: ?>
                                <div class="row object-desc">
                                    <div class="col-12 <?=$line?> px-md-0">
                                        <div class="row object-row">
                                            <div class="col-6 align-self-center object-name">
                                                <p class="mb-0"><?=$PROPERTY["NAME"] ?></p>
                                            </div>
                                            <div class="col-6 align-self-center object-value">
                                                <? if (is_array($PROPERTY["VALUE"])): ?>
                                                    <p class="mb-0"><?=$PROPERTY["~VALUE"]["TEXT"] ?></p>
                                                <?else:?>
                                                    <p class="mb-0"><?=$PROPERTY["VALUE"] ?></p>
                                                <?endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <? endif; ?>
                        <? else: ?>
                            <div class="row object-desc">
                                <div class="col-12 <?=$line?> px-md-0">
                                    <div  class="row object-row">
                                        <div class="col-6 align-self-center object-name">
                                            <p class="mb-0"><?=$PROPERTY["NAME"] ?></p>
                                        </div>
                                        <div class="col-6 align-self-center object-value">
                                            <? if (is_array($PROPERTY["VALUE"])): ?>
                                                <p class="mb-0"><?=$PROPERTY["~VALUE"]["TEXT"] ?></p>
                                            <?else:?>
                                                <p class="mb-0"><?=$PROPERTY["VALUE"] ?></p>
                                            <?endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <? endif; ?>


                    <?endif;?>
                    <? $count++; ?>
                <? endforeach; ?>
            </div>

        </div>
        <div class="object-text">
            <p><?=$arResult["DETAIL_TEXT"]?></p>
        </div>

        <div class="object-item-detail">
            <!--<div class="row">
                <div class="col-auto d-flex">
                    <div class="font-regular">Сортировать по:</div>
                    <div class="pl-5">/</div>
                    <div style="cursor: pointer" class="pl-4">площади</div>
<!--                    <div class="pl-4">/</div>-->
            <!--                    <div style="cursor: pointer" class="pl-4">площади</div>-->
            <!--</div>
            <div class="col"></div>
            <div class="col-auto d-flex navigation">
                <div style="cursor: pointer" class="active-page">1</div>
                <div style="cursor: pointer" class="pl-3">2</div>
                <div style="cursor: pointer" class="pl-3">все</div>
            </div>
        </div>-->
            <div class="item-table row">
                <div class="col-lg col-1 item-table-header">Этаж</div>
                <div class="col-lg col-2 item-table-header">Площадь, м<sup>2</sup></div>
                <div class="col-lg col-2 item-table-header">Статус</div>
                <div class="col-lg col item-table-header">Описание</div>
                <div class="col-lg col-1 item-table-header">План</div>
                <div class="col-lg col-1 item-table-header">Фото</div>
                <div class="col-lg col-2 item-table-header">Связаться</div>
            </div>
            <? foreach ($arResult["THIS_PLACE"] as $item): ?>
                <div class="row item-body">

                    <div class="col-lg col-1 item-table-body item-floor"><?=$item["FLOOR"]?></div>
                    <div class="col-lg col-2 item-table-body item-square">
                        <? if (!is_int($item["SQUARE"])):
                            echo number_format($item["SQUARE"],1, ',', ' ');
                        else:
                            echo number_format($item["SQUARE"],0, ',', ' ');
                        endif;
                        ?>
                    </div>
                    <div class="col-lg col-2 item-table-body item-price"><?=$item["STATUS"]?></div>
                    <div class="col-lg col item-table-body item-desc">
                        <div style="display: none" id="<?=$item["ID"]?>">
                            <p><?=$item["DESC"]?></p>
                        </div>
                        <a data-fancybox="" data-src="#<?=$item["ID"]?>" href="javascript:;">
                            <i class="far fa-file-alt"></i>
                        </a>
                    </div>
                    <div class="col-lg col-1 item-table-body item-plan">
                        <?$cnt1 = 0 ?>
                        <? for($i = 0; $i < count($item["PLAN"]); $i++): ?>

                            <? if ($cnt1 == 0): ?>
                                <a data-fancybox="images_x_<?=$item["ID"]?>" href="<?=$item["PLAN"][$i]?>">
                                    <i class="far fa-file"></i>
                                </a>
                            <?else:?>
                                <a style="display: none" data-fancybox="images_x_<?=$item["ID"]?>" href="<?=$item["PLAN"][$i]?>">
                                    <i class="far fa-file"></i>
                                </a>
                            <?endif;?>

                            <? $cnt1++ ?>
                        <? endfor; ?>
                    </div>
                    <div class="col-lg col-1 item-table-body item-photo">
                        <?$cnt = 0 ?>
                        <? for($i = 0; $i < count($item["PHOTO"]); $i++): ?>

                            <? if ($cnt == 0): ?>
                                <a data-fancybox="images<?=$item["ID"]?>" href="<?=$item["PHOTO"][$i]?>">
                                    <i class="far fa-image"></i>
                                </a>
                            <?else:?>
                                <a style="display: none" data-fancybox="images<?=$item["ID"]?>" href="<?=$item["PHOTO"][$i]?>">
                                    <i class="far fa-image"></i>
                                </a>
                            <?endif;?>

                            <? $cnt++ ?>
                        <? endfor; ?>

                    </div>
                    <div class="col-lg col-2 item-table-body item-contact">
                        <div class="bg-form" style="display: none" id="form_<?=$item["ID"]?>">
<!--                            <div class="form-desc">-->
<!--                                <h4>--><?//=$item["TYPE"]?><!--</h4>-->
<!--                                <p>Статус: --><?//=$item["STATUS"]?><!--<br>-->
<!--                                    Площадь: --><?//=number_format($item["SQUARE"],0, ',', ' ')?><!-- м<sup>2</sup></p>-->
<!--                            </div>-->














                            <form class="object-form" method="post" action="" id="formMain">
                                <div id="messageResult" class="formHead getText"></div>
                                <div class="form-name">
                                    <label id="validName" for="name">Имя</label><br>
                                    <input type="text" name="name" id="name">
                                </div>
                                <div class="form-email">
                                    <label id="validEmail" for="email">E-mail</label><br>
                                    <input type="email" name="email" id="email">
                                </div>
                                <div class="form-phone">
                                    <label id="validPhone" for="phone">Телефон</label><br>
                                    <input type="tel" name="phone" id="phone">
                                </div>
                                <div  class="message">
                                    <label id="validCom" for="com">Комментарий</label><br>
                                    <textarea name="com" id="com" rows="4"></textarea>
                                </div>
                                <input class="sbm" id="button" type="button" value="Отправить" onclick="AjaxFormRequest('messageResult', 'formMain', '/form.php')">

                            </form>
                        </div>
                        <a data-fancybox="" data-src="#form_<?=$item["ID"]?>" href="javascript:;">
                            <i class="far fa-envelope"></i>
                        </a>
                    </div>
                </div>
            <?endforeach;?>


        </div>


    </div>
</div>
<script>
    let arMapDetail = <? echo json_encode($arResult["MAP_DETAIL"]) ?>;
    console.log('arMapDetail', arMapDetail);

    if($('#map-detail').length) {
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map-detail", {
                center: arMapDetail[0]['POINTS'],
                zoom: 14
            }, {
                searchControlProvider: 'yandex#search'
            });


            var myGeoObjects = [];

            for (var f = 0; f < arMapDetail.length; f++) {
                myGeoObjects[f] = new ymaps.GeoObject({
                        geometry: {
                            type: "Point",
                            coordinates: arMapDetail[f]['POINTS']
                        },
                        properties: {
                            hintContent: arMapDetail[f]['NAME'] + '<br>' + arMapDetail[f]['ADDRESS'],
                        }

                    }, {
                        preset: 'islands#greenCircleDotIcon'


                    }

                );
            }

            var myClusterer = new ymaps.Clusterer(
                {
                    clusterDisableClickZoom: true,
                    clusterIconLayout: 'default#pieChart',
                    groupByCoordinates: true
                }
            );



            myClusterer.add(myGeoObjects);
            myMap.geoObjects.add(myClusterer);
            //myMap.setBounds(myMap.geoObjects.getBounds());

            myMap.behaviors.disable('scrollZoom');

        }
    }
</script>
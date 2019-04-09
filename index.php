<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");

?>


<!--    <div class="owl-carousel owl-theme slider_main">-->
<!--        <div class="owl-item">-->
<!--            <img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/slideMain+1.jpg" alt="">-->
<!--        </div>-->
<!--        <div class="owl-item">-->
<!--            <img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/slideMain+2.jpg" alt="">-->
<!--        </div>-->
<!--    </div>-->
    <div class="container">
        <div class="row objects">

            <div class="col-md-4  object-item">
                <a href="/obekty/torgovye-tsentry/">
                    <div class="object-item-title">
                        <p>Торговые центры</p>
                        <div class="triangle-white"></div>
                        <div class="triangle-red"></div>
                    </div>
                    <div class="object-item-image">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/object-1.jpg" alt="">
                    </div>

                </a>
            </div>


            <div class="col-md-4 mt-md-0 mt-3 object-item">
                <a href="/obekty/biznes-tsentry/biznes-tsentr/">
                    <div class="object-item-title">
                        <p>Бизнес- центр</p>

                        <div class="triangle-white"></div>
                        <div class="triangle-red"></div>
                    </div>
                    <div class="object-item-image">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/object-2.jpg" alt="">
                    </div>

                </a>
            </div>


            <div class="col-md-4  mt-md-0 mt-3 object-item">
                <a href="/obekty/street-retail/">
                    <div class="object-item-title">
                        <p>Street Retail</p>

                        <div class="triangle-white"></div>
                        <div class="triangle-red"></div>
                    </div>
                    <div class="object-item-image">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/object-3.jpg" alt="">
                    </div>

                </a>
            </div>
        </div>
    </div>

<!--    <div class="special-offers">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-12 offers-title">-->
<!--                <h2>Специальные предложения</h2>-->
<!--                <div class="red-line"></div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-4 offer-item">-->
<!--                <div class="offer-image">-->
<!--                    <img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/offer-1.jpg" alt="">-->
<!--                    <div class="offer-price"><span>416 600</span> руб./мес.</div>-->
<!--                </div>-->
<!--                <div class="offer-desc">-->
<!--                    <h4>офис 303 кв.м</h4>-->
<!--                    <p>Бизнес-центр Лейпциг представит в аренду-->
<!--                        офисное помещение 303 кв.м, планировка-->
<!--                        смешанная, все готово к въезду.</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-4 offer-item">-->
<!--                <div class="offer-image">-->
<!--                    <img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/offer-2.jpg" alt="">-->
<!--                    <div class="offer-price"><span>446 900</span> руб./мес.</div>-->
<!--                </div>-->
<!--                <div class="offer-desc">-->
<!--                    <h4>офис 325 кв.м</h4>-->
<!--                    <p>Девятый этаж бизнес-центра Лейпциг занимает-->
<!--                        помещение 325 кв.м в аренду под офис по-->
<!--                        выгодной цене.</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-4 offer-item">-->
<!--                <div class="offer-image">-->
<!--                    <img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/offer-3.jpg" alt="">-->
<!--                    <div class="offer-price"><span>863 500</span> руб./мес.</div>-->
<!--                </div>-->
<!--                <div class="offer-desc">-->
<!--                    <h4>офис 628 кв.м</h4>-->
<!--                    <p>На 8 и 9 этажах БЦ Лейпциг расположен офис-->
<!--                        общей площадью 628 кв.м в аренду, показ в-->
<!--                        любое время.</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-4 offer-item">-->
<!--                <div class="offer-image">-->
<!--                    <img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/offer-4.jpg" alt="">-->
<!--                    <div class="offer-price"><span>1.34</span> млн руб./мес.</div>-->
<!--                </div>-->
<!--                <div class="offer-desc">-->
<!--                    <h4>офис 971 кв.м</h4>-->
<!--                    <p>В бизнес-центре Лейпциг представлена-->
<!--                        возможность аренды офисного помещения-->
<!--                        площадью 971 кв.м.</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-4 offer-item">-->
<!--                <div class="offer-image">-->
<!--                    <img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/offer-5.jpg" alt="">-->
<!--                    <div class="offer-price"><span>1.76</span> млн руб./мес.</div>-->
<!--                </div>-->
<!--                <div class="offer-desc">-->
<!--                    <h4>офис 1282 кв.м</h4>-->
<!--                    <p>Смешанная планировка, офис 1282 кв.м на 7 и 8-->
<!--                        этажах бизнес-центра Лейпциг, переезжайте-->
<!--                        сейчас.</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-4 offer-item">-->
<!--                <div class="offer-image">-->
<!--                    <img src="--><?//=SITE_TEMPLATE_PATH?><!--/images/offer-6.jpg" alt="">-->
<!--                    <div class="offer-price"><span>2.68</span> млн руб./мес.</div>-->
<!--                </div>-->
<!--                <div class="offer-desc">-->
<!--                    <h4>офис 1952 кв.м</h4>-->
<!--                    <p>В БЦ Лейпциг на 5 и 6 этажах находится-->
<!--                        помещение 1952 кв.м под офис в аренду,-->
<!--                        действует спецпредложение.</p>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

    <div class="our-skills">
        <div class="container">
            <div class="row">
                <div class="col-12 our-skills-title">
                    <h2>Наши преимущества</h2>
                    <div class="red-line"></div>
                </div>

                <div class="col-xl-4 col-md-6 skills-item">
                    <div class="row">
                        <div class="col-auto skills-image">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/skill-1.png" alt="">
                        </div>
                        <div class="col skills-desc align-self-center">
                            <p>Транспортная доступность</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 skills-item">
                    <div class="row">
                        <div class="col-auto skills-image">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/skill-2.png" alt="">
                        </div>
                        <div class="col skills-desc align-self-center">
                            <p>Современное оснащение</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 skills-item">
                    <div class="row">
                        <div class="col-auto skills-image">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/skill-3.png" alt="">
                        </div>
                        <div class="col skills-desc align-self-center">
                            <p>Развитая инфраструктура</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 skills-item">
                    <div class="row">
                        <div class="col-auto skills-image">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/skill-4.png" alt="">
                        </div>
                        <div class="col skills-desc align-self-center">
                            <p>Выгодные условия сотрудничества</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 skills-item">
                    <div class="row">
                        <div class="col-auto skills-image">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/skill-5.png" alt="">
                        </div>
                        <div class="col skills-desc align-self-center">
                            <p>Арендные каникулы</p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 skills-item">
                    <div class="row">
                        <div class="col-auto skills-image">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/skill-6.png" alt="">
                        </div>
                        <div class="col skills-desc align-self-center">
                            <p>Парковка</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?


CModule::IncludeModule("iblock");

function getCoords($address) {
    $params = array(
        'geocode' => $address, // адрес
        'format'  => 'json',                          // формат ответа
        'results' => 1,                               // количество выводимых результатов
        'key'     => '...',                           // ваш api key
    );
    $response = json_decode(file_get_contents('http://geocode-maps.yandex.ru/1.x/?' . http_build_query($params, '', '&')));
    if ($response->response->GeoObjectCollection->metaDataProperty->GeocoderResponseMetaData->found > 0)
    {
        $pieces = explode(" ", $response->response->GeoObjectCollection->featureMember[0]->GeoObject->Point->pos);
        $coords = $pieces[1].', '.$pieces[0];
        return $coords;
    }
    else
    {
        return 'Ничего не найдено';
    }
}

//echo "<pre>";
$count = 0;
$arMap = array();
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_ATT_ADDRESS");
$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>5000), $arSelect);
while($ob = $res->GetNextElement()){
    $arFields = $ob->GetFields();
    //print_r($arFields);
    $arProps = $ob->GetProperties();
    //print_r($arProps);
    $arMap[$count]["NAME"] = $arFields["NAME"];
    $arMap[$count]["ADDRESS"] = $arProps["ATT_ADDRESS"]["VALUE"]["TEXT"];
    $coords = getCoords("Москва, " . $arProps["ATT_ADDRESS"]["VALUE"]["TEXT"]);
    $coord = explode(", ", $coords);
    $arMap[$count]["MAP"][0] = doubleval($coord[0]);
    $arMap[$count]["MAP"][1] = doubleval($coord[1]);
    $count++;
}



//var_dump ($arMap);
//echo "</pre>";




?>

<div id="map-main"></div>


<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
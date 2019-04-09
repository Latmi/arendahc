<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
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
    $coords = getCoords("Москва, " . $arProps["ATT_ADDRESS"]["VALUE"]["TEXT"]);
    $coord = explode(", ", $coords);
    $arMap[$count]["MAP"][0] = doubleval($coord[0]);
    $arMap[$count]["MAP"][1] = doubleval($coord[1]);
    $count++;
}



//var_dump ($arMap);
//echo "</pre>";
?>
    <div style="background: url('<?=SITE_TEMPLATE_PATH?>/images/bg-1.jpg') 50% 50%/auto 100% no-repeat" class="bg-object"></div>

<div class="container about">
    <div class="row about__desc">
        <div class="col-12 our-skills-title mb-3rem">
            <h2><?=$APPLICATION->GetTitle()?></h2>
            <div class="red-line"></div>
        </div>
        <div class="col-12 about__desc_text">
            <p>ПАО «ТД «Холдинг Центр» - публичное акционерное общество, имеет более чем 20-летний опыт торговой деятельности на российском рынке.<br><br> 

На протяжении многих лет ПАО «ТД ХЦ» управляет собственными объектами коммерческой недвижимости, ориентируясь на принципы оперативности, качества и эффективности.
<br><br>
 АРЕНДА ХЦ – специализированный сайт ПАО «ТД ХЦ» по управлению и эксплуатации коммерческой недвижимости. Мы выстраиваем долгосрочные отношения с нашими Партнерами на принципах открытости и гибкого индивидуального подхода к каждому Клиенту.
<br><br>
В настоящий момент компания владеет и управляет офисным центром, а также несколькими торговыми комплексами в Москве: 
<br><br>
· <a href="http://arendahc.ru/obekty/biznes-tsentry/biznes-tsentr/" target="_blank">Бизнес-центром «Лейпциг»</a><br>
· <a href="http://89.223.95.67/o-kompanii/set-univermagov-khts/" target="_blank">Сетью универмагов ХЦ</a><br>
· <a href="http://89.223.95.67/o-kompanii/set-monomagazinov-khts/" target="_blank">Сетью мономагазинов PRET-A-PORTER</a><br>
· <a href="http://89.223.95.67/o-kompanii/set-magazinov-khts/" target="_blank">Сетью магазинов ХЦ</a><br>
· <a href="http://89.223.95.67/o-kompanii/set-supermarketov/" target="_blank">Сетью супермаркетов</a><br>
<br>
 Приглашаем Вас более подробно ознакомиться с нашими объектами и услугами.
            </p>
        </div>
    </div>
</div>
<div class="about__skill">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12 about__skill_item">
                <div class="about__skill_item_arrow">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/arrow-red.svg" alt="">
                </div>
                <p class="about__skill_item_count"> 140 000 M<sup>2</sup></p>
                <p class="about__skill_item_name">Площадь объектов</p>
                <div class="red-line"></div>
                <p class="about__skill_item_desc">
                   Более 140 000 кв.м в отношении которых компанией
                    оказываются услуги по
                    управлению и эксплуатации
                    коммерческой недвижимости
                </p>
            </div>
            <div class="col-md-4 col-12  about__skill_item">
                <div class="about__skill_item_arrow">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/arrow-red.svg" alt="">
                </div>
                <p class="about__skill_item_count">200</p>
                <p class="about__skill_item_name">Арендаторов</p>
                <div class="red-line"></div>
                <p class="about__skill_item_desc">
                    около 200
                    арендаторов на объектах,
                    управляемых компанией
                </p>
            </div>
            <div class="col-md-4 col-12  about__skill_item">
                <div class="about__skill_item_arrow">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/arrow-red.svg" alt="">
                </div>
                <p class="about__skill_item_count">15</p>
                <p class="about__skill_item_name">Объектов</p>
                <div class="red-line"></div>
                <p class="about__skill_item_desc">
                    Более 15 объектов 
Общее количество объектов, управляемых компанией
                </p>
            </div>
        </div>
    </div>
</div>
    <div id="map-about"></div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
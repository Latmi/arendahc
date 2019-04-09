<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
</div>
<div class="container-fluid foot">
    <div class="row footer">
        <div class="col-md-auto col-6 footer-la">
            <div class="footer-logo">
                <a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo-footer.png" alt=""></a>
            </div>
            <div class="footer-address">
                <p>г. Москва, ул. Академика Варги, д. 8, корп. 1<br>
                    <a href="tel:+74959700848">+7 (495) 970-08-48</a><br>
                    <a href="mailto:arenda@hcdom.ru">arenda@hcdom.ru</a></p>
            </div>
        </div>
        <div class="col-md-auto col-6 footer-menu">

            <?$APPLICATION->IncludeComponent("bitrix:menu", "menu-bottom", Array(
                "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                "DELAY" => "N",	// Откладывать выполнение шаблона меню
                "MAX_LEVEL" => "1",	// Уровень вложенности меню
                "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                    0 => "",
                ),
                "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
            ),
                false
            );?>




            <p><a href="#">Политика конфиденциальности</a></p>
        </div>
        <div class="col"></div>
<!--        <div class="col social d-inline-flex">-->
<!--            <div class="fb"><a href="#"><i class="fab fa-facebook-f"></i></a></div>-->
<!--            <div class="in"><a href="#"><i class="fab fa-instagram"></i></a></div>-->
<!--            <div class="vk"><a href="#"><i class="fab fa-vk"></i></a></div>-->
<!---->
<!--        </div>-->
        <hr>
    </div>
    <div class="row copy">
        <div class="col-12 px-0">
            <div class="row copy-in mx-3 pt-4">
                <div class="col-md-auto col-6 cr px-0 align-self-center">
                    <p>2018 © arendahc</p>
                </div>
                <div class="col-md col div-space"></div>
                <div class="col-md-auto col-6 by px-0 align-self-center">
                    <a href="http://npfgroup.com/" target="_blank"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo-npf.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(function () {
        var arMap = <? echo json_encode($arMap) ?>;
        console.log('arMap', arMap);

        if($('#map-main').length) {
            ymaps.ready(init);

            function init() {
                var myMap = new ymaps.Map("map-main", {
                    center: [55.755, 37.64],
                    zoom: 11
                }, {
                    searchControlProvider: 'yandex#search'
                });
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
                
                myMap.behaviors.disable('drag');
                }


                var myGeoObjects = [];

                for (var f = 0; f < arMap.length; f++) {
                    myGeoObjects[f] = new ymaps.GeoObject({
                            geometry: {
                                type: "Point",
                                coordinates: arMap[f]['MAP']
                            },
                            properties: {
                                hintContent: arMap[f]['NAME'] + '<br>' + arMap[f]['ADDRESS'],
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

        if($('#map-about').length) {
            ymaps.ready(init);

            function init() {
                var myMap = new ymaps.Map("map-about", {
                    center: [55.76, 37.64],
                    zoom: 10
                }, {
                    searchControlProvider: 'yandex#search'
                });


                var myGeoObjects = [];

                for (var f = 0; f < arMap.length; f++) {
                    myGeoObjects[f] = new ymaps.GeoObject({
                            geometry: {
                                type: "Point",
                                coordinates: arMap[f]['MAP']
                            },
                            properties: {
                                hintContent: arMap[f]['NAME'],
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

        function AjaxFormRequest(result_id,formMain,url) {
            $('.warn').remove();
            if($('#name').val() != '' && $('#name').val().length > 2) {
                var noBlankName = true;
                $('#name').css({
                    // border : 'none',
                    // borderBottom: '1px #ccc9c9 solid',
                });
                //$('#validName').text('Ваше имя');
            } else {
                $('#name').css({'border' : '2px solid red'});
                $('#validName').append('<p class="warn">заполните поле</p>');
            }
            if($('#email').val() != '' && $('#email').val().length > 2) {
                var noBlankName = true;
                $('#email').css({
                    // border : 'none',
                    // borderBottom: '1px #ccc9c9 solid',
                });
                //$('#validName').text('Ваше имя');
            } else {
                $('#email').css({'border' : '2px solid red'});
                $('#validEmail').append('<p class="warn">заполните поле</p>');
            }
            if($('#com').val() != '' && $('#com').val().length > 2) {
                var noBlankName = true;
                $('#com').css({
                    // border : 'none',
                    // borderBottom: '1px #ccc9c9 solid',
                });
                //$('#validName').text('Ваше имя');
            } else {
                $('#com').css({'border' : '2px solid red'});
                $('#validCom').append('<p class="warn">заполните поле</p>');
            }
            if($('#phone').val() != '' && $('#phone').val().length > 9) {
                var noBlankPhone = true;
                $('#phone').css({
                    // border : 'none',
                    // borderBottom: '1px #ccc9c9 solid',
                });
                //$('#validPhone').text('Телефон');
            } else {
                $('#phone').css({'border' : '2px solid red'});
                $('#validPhone').append('<p class="warn">заполните поле</p>');
            }
            if (noBlankName == true && noBlankPhone == true) {
                $('#messageResult').css({display: 'block'});
                jQuery.ajax({
                    url: url,
                    type: "POST",
                    dataType: "html",
                    data: jQuery("#"+formMain).serialize(),
                    success: function(response) {
                        document.getElementById(result_id).innerHTML = response;
                    },
                    error: function(response) {
                        document.getElementById(result_id).innerHTML = "Возникла ошибка при отправке формы. Попробуйте еще раз";
                    }
                });

                $(':input','#formMain')
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                    .removeAttr('checked')
                    .removeAttr('selected');
                $('#name').css({'display' : 'none'});
                $('#validName').css({'display' : 'none'});
                $('#phone').css({'display' : 'none'});
                $('#validPhone').css({'display' : 'none'});
                $('#email').css({'display' : 'none'});
                $('#validEmail').css({'display' : 'none'});
                $('#com').css({'display' : 'none'});
                $('#validCom').css({'display' : 'none'});
                $('#button').attr('value', 'Отправлено');

                function showInput () {
                    $('#name').css({'display' : 'block'});
                    $('#validName').css({'display' : 'block'});
                    $('#phone').css({'display' : 'block'});
                    $('#validPhone').css({'display' : 'block'});
                    $('#email').css({'display' : 'block'});
                    $('#validEmail').css({'display' : 'block'});
                    $('#com').css({'display' : 'block'});
                    $('#validCom').css({'display' : 'block'});
                    $('#button').attr('value', 'Отправить');
                    $('#messageResult').css({display: 'none'})
                }
                setTimeout(showInput, 5000);


            }
        }
        $('#phone').on('click',function () {
            $(this).css({'border' : '1px solid #ee344d'});
            $('#validPhone')
                .find('.warn').remove();
        });
        $('#name').on('click',function () {
            $(this).css({'border' : '1px solid #ee344d'});
            $('#validName')
                .find('.warn').remove();
        });
        $('#email').on('click',function () {
            $(this).css({'border' : '1px solid #ee344d'});
            $('#validEmail')
                .find('.warn').remove();
        });
        $('#com').on('click',function () {
            $(this).css({'border' : '1px solid #ee344d'});
            $('#validCom')
                .find('.warn').remove();
        })
    })
</script>

</body>
</html>
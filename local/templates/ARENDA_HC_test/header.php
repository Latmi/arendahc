<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!doctype html>
<html>
<head>
    <!— Yandex.Metrika counter —>
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(51518324, "init", {
            id:51518324,
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/51518324" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!— /Yandex.Metrika counter —>
    <!— Google Tag Manager —>
    <script> (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.paren..;
    })(window,document,'script','dataLayer','GTM-P4X32VW');</script>
    <!— End Google Tag Manager —>
    <!— Google Tag Manager (noscript) —>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P4X32VW"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!— End Google Tag Manager (noscript) —>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=6958a302-4ed3-41b6-82ca-3061af2d35db&lang=ru_RU&mode=debug" type="text/javascript"></script>

	<?
    $APPLICATION->ShowHead();
    use Bitrix\Main\Page\Asset;
    // CSS
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/libs/bootstrap/scss/bootstrap-reboot.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/libs/bootstrap/scss/bootstrap-grid.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/libs/bootstrap/scss/bootstrap.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/node_modules/owl.carousel2/dist/assets/owl.carousel.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/libs/owl.theme.default.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/node_modules/@fortawesome/fontawesome-free/css/all.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/libs/jquery-ui.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/libs/hamburgers/dist/hamburgers.css');
    // JS
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/node_modules/jquery/dist/jquery.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/node_modules/bootstrap/dist/js/bootstrap.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/node_modules/owl.carousel2/dist/owl.carousel.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/libs/jquery-ui.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/libs/jquery.ui.touch-punch.min.js');


    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/scripts.js');
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/js/mobile.js');
    //STRING
    Asset::getInstance()->addString("<meta name='viewport' content='width=device-width, initial-scale=1'>");
    Asset::getInstance()->addString("<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>");
    Asset::getInstance()->addString("<meta name='msapplication-TileColor' content='#4c4c4c'>");
    Asset::getInstance()->addString("<meta name='theme-color' content='#ffffff'>");
    Asset::getInstance()->addString("<meta name='format-detection' content='telephone=no'>");
    Asset::getInstance()->addString("<link rel='apple-touch-icon' sizes='180x180' href='/apple-touch-icon.png'>");
    Asset::getInstance()->addString("<link rel='icon' type='image/png' sizes='32x32' href='/favicon-32x32.png'>");
    Asset::getInstance()->addString("<link rel='icon' type='image/png' sizes='16x16' href='/favicon-16x16.png'>");
    Asset::getInstance()->addString("<link rel='manifest' href='/site.webmanifest'>");
    Asset::getInstance()->addString("<link rel='mask-icon' href='/safari-pinned-tab.svg' color='#5bbad5'>");
    ?>
	<title>Аренда ХЦ</title>
</head>
<body>
<?$APPLICATION->ShowPanel();?>

<div class="container">
    <div class="row header">
        <div class="col-2 mobile-menu align-self-center">
            <div class="hamburger hamburger--collapse ">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </div>
        </div>
        <div class="col-lg-auto col-md-6 col-8 align-self-center logo">
            <a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt=""></a>
        </div>
        <div class="col-lg-auto col-md-auto main-menu align-self-center">
            <?$APPLICATION->IncludeComponent("bitrix:menu", "menu-main", Array(
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

        </div>
        <div class="col-lg col-md-6 col-2 align-self-center header_phone">
            <span class="desktop"><a href="tel:+74959700848">+7 (495) 970-08-48</a></span>
            <a href="tel:+74959700848"><i class="fas fa-phone mobile"></i></a>
        </div>
    </div>
</div>
<div id="main">
<div class="mobile mobile-menu-container">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "menu-main", Array(
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
            </div>
        </div>
    </div>
</div>


	
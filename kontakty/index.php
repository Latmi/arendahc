<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

    <div style="background: url('<?=SITE_TEMPLATE_PATH?>/images/bg-2.jpg') 50% 50%/auto 100% no-repeat" class="bg-object"></div>

    <div class="container kontakty">
        <div class="row kontakty__desc">
            <div class="col-12 our-skills-title mb-3rem">
                <h2><?=$APPLICATION->GetTitle()?></h2>
                <div class="red-line"></div>
            </div>
            <div class="col-12 kontakty__desc_text">
                <p>Если вы решили снять торговую площадь или заинтересованы в аренде офиса в Москве, свяжитесь с нами по телефону или заполните заявку на сайте.
                    Наши специалисты помогут недорого снять коммерческую недвижимость, соответствующую потребностям вашего бизнеса.
                </p>
                <p class="pt-4">
                    г. Москва, ул. Академика Варги, д. 8, корп. 1<br>
                    +7 (495) 970-08-48<br>
                    arenda@hcdom.ru
                </p>
            </div>
        </div>
        <form action="" method="post">
            <div class="row kontakty__form">
                <div class="col-auto ">
                    <div  style="height: 40px" class="row ">
                        <div class="col kontakty__form_arrow align-self-center">
                            <img src="<?=SITE_TEMPLATE_PATH?>/images/arrow-red.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row ">
                        <div class="col">
                            <label class="placeinput">
                                <input required="1" type="text"  />
                                <div class="place_holder">Имя<span>*</span></div>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="placeinput">
                                <input required="1" type="text" />
                                <div class="place_holder  lh-45">Телефон</div>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="placeinput">
                                <input required="1" type="text" />
                                <div class="place_holder">E-mail<span>*</span></div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md col-12">
                    <label class="placeinput">
                        <textarea required="1" name="message" id=""></textarea>
                        <div class="place_holder">Сообщение<span>*</span></div>
                    </label>
                    <div class="button">
                        <button type="submit">Отправить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("test");
?>

<div style="background: url('<?=SITE_TEMPLATE_PATH?>/images/bg-1.jpg') 50% 50%/auto 100% no-repeat" class="bg-object"></div>

<div class="container selection">
    <div class="row selection__head">
        <div class="col-12 objects__tc_title">
            <h2>Подбор объекта</h2>
            <div class="red-line"></div>
        </div>
        <div class="col-md-6 selection__container_data">
            <div class="row">
                <div class="col-12">
                    <h5>тип помещения:</h5>
                </div>
                <div class="col-md-3 selection__container_data_input">
                    Офис
                    <input class="check_data" data-name="Офис" type="checkbox" name="office" id="office" checked>
                    <label for="office"></label>
                </div>
                <div class="col-md-5 selection__container_data_input">
                    Торговая площадь
                    <input class="check_data" data-name="Торговая площадь" type="checkbox" name="square" id="square" checked>
                    <label for="square"></label>
                </div>
                <div class="col-md-4 selection__container_data_input">
                    Street retail
                    <input class="check_data" data-name="Street retail" type="checkbox" name="retail" id="retail" checked>
                    <label for="retail"></label>
                </div>
            </div>
        </div>
        <div class="col-md-6 selection__container_data">
            <div class="row">
                <div class="col-12">
                    <h5>площадь, м<sup>2</sup></h5>
                </div>
                <div class="col-12 selection__container_data_range">
                    <p>
                        <label for="amount"></label>
                        <input class="range_input" type="number" id="minNum" disabled> <span class="mdash">&mdash;</span>
                        <input class="range_input" type="number" id="maxNum" disabled>
                        <input style="display: none" type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                    <div id="slider-range"></div>
                </div>
            </div>
<!--            <div class="row mt-5 ">-->
<!--                <div class="col"> </div>-->
<!--                <div class="col-auto">-->
<!--                    <div class="button_reset">-->
<!--                        <i class="fas fa-times"></i> Сбросить фильтр-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-auto">-->
<!--                    <div class="button_selection">-->
<!--                        Подобрать-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>


    </div>
    <div class="row selection__body my-5">
        <div class="col-12">
            <div class="object_item_detail_selection">
                <div class="row">
                    <div class="col-auto d-flex">
                        <div class="font-regular">Сортировать по:</div>
                        <div class="pl-5">/</div>
                        <div id="nameSort" style="cursor: pointer" class="pl-4">названию</div>
                        <div class="pl-4">/</div>
                        <div id="squareSort" style="cursor: pointer" class="pl-4">площади</div>
                    </div>
                    <div class="col"></div>
<!--                    <div class="col-auto d-flex navigation">-->
<!--                        <div style="cursor: pointer" class="active-page">1</div>-->
<!--                        <div style="cursor: pointer" class="pl-3">2</div>-->
<!--                        <div style="cursor: pointer" class="pl-3">все</div>-->
<!--                    </div>-->
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="row head-item">

                            <div class="col item-table-header">Название</div>
                            <div class="col item-table-header">Тип</div>
                            <div class="col item-table-header">Площадь, м<sup>2</sup></div>
                            <div class="col item-table-header">Метро</div>
                            <div class="col item-table-header">Описание</div>
                            <div class="col item-table-header">План</div>
                            <div class="col item-table-header">Фото</div>
                        </div>

                        <div style="min-height: 500px" class="row">
                            <div class="col-12">
                                <div id="item-container"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<script>

    $(function () {

        function createDom (url, plan, photo, name, type, square, metro, id, text) {



            var elRow = '';
            var arPlan = '';
            for (var i = 0; i < plan.length; i++) {
                if (i > 0) {
                    arPlan += '<a style="display: none" data-fancybox="plan" href="'+ plan[i] +'"><i class="far fa-file"></i></a>';
                } else {
                    arPlan += '<a data-fancybox="plan" href="'+ plan[i] +'"><i class="far fa-file"></i></a>';
                }
            }
            var arPhoto = '';
            for (var k = 0; k < photo.length; k++) {
                if (k > 0) {
                    arPhoto += '<a style="display: none" data-fancybox="image" href="'+ photo[k] +'"><i class="far fa-image"></i></a>';
                } else {
                    arPhoto += '<a data-fancybox="image" href="'+ photo[k] +'"><i class="far fa-image"></i></a>';
                }
            }
            elRow += '<div id="'+ id +'" class="row py-1 body-item">';
            elRow += '<div class="col align-self-center item-name"><a href="'+ url +'">'+ name +'</a></div>';
            elRow += '<div class="col align-self-center item-type">'+ type +'</div>';
            elRow += '<div class="col align-self-center item-square">'+ square +'</div>';
            elRow += '<div class="col align-self-center item-metro">'+ metro +'</div>';
            elRow += '<div class="col align-self-center item-desc"><a data-fancybox="" data-src="#'+ id +'" href="javascript:;"><i class="far fa-file-alt"></i></a><div style="display: none" id="'+ id +'">'+ text +'</div></div>';
            elRow += '<div class="col align-self-center item-plan">'+ arPlan +'</div>';
            elRow += '<div class="col align-self-center item-image">'+ arPhoto +'</div>';
            elRow += '</div>';
            $('#item-container').append(elRow);

        }

        $.ajax({
            type: "POST",
            url: "query.php",
            dataType: "json",
            data: "objects=all",
            error: function () {
                alert( "При выполнении запроса произошла ошибка :(" );
            },
            success: function ( data ) {

                //console.log(data);
                var arSquare = [];

                $('.body-item').remove();
                data.map(function (el, index) {
                    //console.log(el);
                    arSquare.push(el.square);
                    createDom (el.url, el.plan, el.photo, el.name, el.type, el.square, el.metro, el.id, el.text)
                });

                //console.log(arSquare);

                var minSquare = Math.floor(Math.min.apply(null, arSquare));
                var maxSquare = Math.round(Math.max.apply(null, arSquare));

                //console.log('minSquare', minSquare);
                //console.log('maxSquare', maxSquare);

                $( "#slider-range" ).slider({
                    range: true,
                    min: minSquare,
                    max: maxSquare,
                    values: [ minSquare, maxSquare ],
                    slide: function( event, ui ) {
                        //значение при изменении
                        //$( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                        $( "#minNum" ).val(ui.values[ 0 ]);
                        $( "#maxNum" ).val(ui.values[ 1 ]);
                        $('.item-square').each(function () {
                            //console.log(Number($(this).html()));
                            if (Number($(this).html()) < ui.values[ 0 ] || Number($(this).html()) > ui.values[ 1 ]) {
                                $(this).parent().hide();
                            } else {
                                $(this).parent().show();
                            }
                        });
                    }
                });
                //значение при загрузки
                $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
                    " - " + $( "#slider-range" ).slider( "values", 1 ) );
                $( "#minNum" ).val($( "#slider-range" ).slider( "values", 0 ));
                $( "#maxNum" ).val($( "#slider-range" ).slider( "values", 1 ));

                //SORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORTSORT

                var arNum = [];
                var arName = [];

                $('.body-item').each(function () {
                    console.log($(this).attr('id'));
                    arNum.push([$(this).attr('id'), parseInt($(this).find('.item-square').text())]);
                    arName.push([$(this).attr('id'), $(this).find('.item-name').text().toUpperCase().split(' ').join('').split(',').join('')]);
                });

                //console.log('arNum', arNum);
                //console.log('arName', arName);

                var sortSquare = 1;
                $('#squareSort').on('click', function () {

                    sortSquare = sortSquare * (-1);

                    if (sortSquare > 0) {
                        $('#nameSort').find('.fas').remove();
                        $(this).find('.fas').remove();
                        $(this).append('<i class="fas fa-sort-amount-down"></i>')
                    }
                    else {
                        $('#nameSort').find('.fas').remove();
                        $(this).find('.fas').remove();
                        $(this).append('<i class="fas fa-sort-amount-up"></i>')
                    }

                    function sName(a,b) {

                        if(a[1] < b[1]) {
                            return (-1) * sortSquare;
                        } else if (a[1] > b[1]) {
                            return sortSquare;
                        } else {
                            return 0;
                        }
                    }

                    arNum.sort(sName);

                    for (var i = 0; i < arNum.length; i++) {
                        $('#'+arNum[i][0]).appendTo($("#item-container"));
                    }
                });

                var sortName = 1;
                $('#nameSort').on('click', function () {

                    sortName = sortName * (-1);

                    if (sortName > 0) {
                        $('#squareSort').find('.fas').remove();
                        $(this).find('.fas').remove();
                        $(this).append('<i class="fas fa-sort-amount-down"></i>')
                    }
                    else {
                        $('#squareSort').find('.fas').remove();
                        $(this).find('.fas').remove();
                        $(this).append('<i class="fas fa-sort-amount-up"></i>')
                    }

                    function sName(a,b) {
                        if(a[1] < b[1]) {
                            return (-1) * sortName;
                        } else if (a[1] > b[1]) {
                            return sortName;
                        } else {
                            return 0;
                        }
                    }

                    arName.sort(sName);

                    for (var i = 0; i < arName.length; i++) {
                        $('#'+arName[i][0]).appendTo($("#item-container"));
                    }
                })


            }
        });

        var checkObj = {
            office: 'Офис',
            square: 'Торговая площадь',
            retail: 'Street retail',
        };

        $('.selection__container_data').on('change', '.check_data', function() {

            if(this.checked) {

                checkObj[$(this).attr('id')] = $(this).attr('data-name');
                //console.log('checkObj', checkObj);

                $.ajax({
                    type: "POST",
                    url: "query.php",
                    dataType: "json",
                    data: "office=" + checkObj.office + "&square=" + checkObj.square + "&retail=" + checkObj.retail,
                    error: function () {
                        alert( "При выполнении запроса произошла ошибка :(" );
                    },
                    success: function ( data ) {

                        //console.log(data);
                        var arSquare = [];

                        $('.body-item').remove();

                        data.map(function (el, index) {
                            //console.log(el);
                            arSquare.push(el.square);
                            createDom (el.url, el.plan, el.photo, el.name, el.type, el.square, el.metro, el.id, el.text)
                        });

                        //console.log(arSquare);

                        var minSquare = Math.floor(Math.min.apply(null, arSquare));
                        var maxSquare = Math.round(Math.max.apply(null, arSquare));

                        //console.log('minSquare', minSquare);
                        //console.log('maxSquare', maxSquare);

                        $( "#slider-range" ).slider({
                            range: true,
                            min: minSquare,
                            max: maxSquare,
                            values: [ minSquare, maxSquare ],
                            slide: function( event, ui ) {
                                //значение при изменении
                                //$( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                                $( "#minNum" ).val(ui.values[ 0 ]);
                                $( "#maxNum" ).val(ui.values[ 1 ]);
                                $('.item-square').each(function () {
                                    //console.log(Number($(this).html()));
                                    if (Number($(this).html()) < ui.values[ 0 ] || Number($(this).html()) > ui.values[ 1 ]) {
                                        $(this).parent().hide();
                                    } else {
                                        $(this).parent().show();
                                    }
                                });
                            }
                        });
                        //значение при загрузки
                        $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
                            " - " + $( "#slider-range" ).slider( "values", 1 ) );
                        $( "#minNum" ).val($( "#slider-range" ).slider( "values", 0 ));
                        $( "#maxNum" ).val($( "#slider-range" ).slider( "values", 1 ));

                    }
                });

            } else {

                checkObj[$(this).attr('id')] = 'no';
                //console.log('checkObj', checkObj);

                $.ajax({
                    type: "POST",
                    url: "query.php",
                    dataType: "json",
                    data: "office=" + checkObj.office + "&square=" + checkObj.square + "&retail=" + checkObj.retail,
                    error: function () {
                        alert( "При выполнении запроса произошла ошибка :(" );
                    },
                    success: function ( data ) {

                        //console.log(data);
                        var arSquare = [];

                        $('.body-item').remove();
                        data.map(function (el, index) {
                            //console.log(el);
                            arSquare.push(el.square);
                            createDom (el.url, el.plan, el.photo, el.name, el.type, el.square, el.metro, el.id, el.text)
                        });

                        //console.log(arSquare);

                        var minSquare = Math.floor(Math.min.apply(null, arSquare));
                        var maxSquare = Math.round(Math.max.apply(null, arSquare));

                        //console.log('minSquare', minSquare);
                        //console.log('maxSquare', maxSquare);

                        $( "#slider-range" ).slider({
                            range: true,
                            min: minSquare,
                            max: maxSquare,
                            values: [ minSquare, maxSquare ],
                            slide: function( event, ui ) {
                                //значение при изменении
                                //$( "#amount" ).val(ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                                $( "#minNum" ).val(ui.values[ 0 ]);
                                $( "#maxNum" ).val(ui.values[ 1 ]);
                                $('.item-square').each(function () {
                                    //console.log(Number($(this).html()));
                                    if (Number($(this).html()) < ui.values[ 0 ] || Number($(this).html()) > ui.values[ 1 ]) {
                                        $(this).parent().hide();
                                    } else {
                                        $(this).parent().show();
                                    }
                                });
                            }
                        });
                        //значение при загрузки
                        $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) +
                            " - " + $( "#slider-range" ).slider( "values", 1 ) );
                        $( "#minNum" ).val($( "#slider-range" ).slider( "values", 0 ));
                        $( "#maxNum" ).val($( "#slider-range" ).slider( "values", 1 ));

                    }
                });
            }
        });





    })
</script>


<?require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php'); ?>

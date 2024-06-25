<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>ArtConstruct</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../images/logo2.png" type="image/icon type" style="float:right;">

</head>

<body>
    <header>

        <div class="logo">
            <a href="../">
                <img src="../images/image.png" alt="">
            </a>
        </div>

        <nav>
            <ul>
                <li><a href="../">Գլխավոր</a></li>
                <li><a href="../pages/Tesakani.php">Տեսականի</a>
                    <ul>
                        <li id="keramika"> <a href="../pages/Tesakani.php?Group=Կերամիկա"> Կերամիկա </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Պատի սալիկներ">Պատի սալիկներ</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Հատակի սալիկներ">Հատակի սալիկներ</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Լվացարան">Լվացարան</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Զուգարանակոնք">Զուգարանակոնք</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Բիդե">Բիդե</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Լոգարանի աքսեսուարներ">Լոգարանի
                                        աքսեսուարներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Մեխանիզմ">Մեխանիզմ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ցնցուղներ">Ցնցուղներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Հայելի">Հայելի</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ծորակներ">Ծորակներ</a></li>
                            </ul>
                        </li>
                        <li id="gorciqner"> <a href="../pages/Tesakani.php?Group=Գործիքներ"> Գործիքներ </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ներկագլան">Ներկագլան</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Վրձին">Վրձին</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Մալա">Մալա</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Կտրիչ">Կտրիչ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ներարկիչ">Ներարկիչ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Հարիչ">Հարիչ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ներկի տարա">Ներկի տարա</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Թաղանթներ">Թաղանթներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ձողեր">Ձողեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Կտրող սկավառակ">Կտրող սկավառակ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Հղկաթուղթ">Հղկաթուղթ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Հղկող սկավառակ">Հղկող սկավառակ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ժապավեն">Ժապավեն</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Էլեկտրական գործիքներ">Էլեկտրական
                                        գործիքներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Գործիքներ պաստառների համար">Գործիքներ
                                        պաստառների համար</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Պաշտպանիչ գործիքներ">Պաշտպանիչ
                                        գործիքներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Խոզանակ-վրձին">Խոզանակ-վրձին</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Հղկման գործիք">Հղկման գործիք</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Հղկող սպունգ">Հղկող սպունգ</a></li>
                            </ul>
                        </li>
                        <li id="pastarner"> <a href="../pages/Tesakani.php?Group=Պաստառներ"> Պաստառներ </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Լվացվող պաստառներ">Լվացվող պաստառներ</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ֆոտոպաստառներ">Ֆոտոպաստառներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Պաստառներ ներկելու համար">Պաստառներ
                                        ներկելու համար</a> </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Տեքստիլ պաստառներ">Տեքստիլ պաստառներ</a>
                                </li>
                                <li id=""><a
                                        href="../pages/Tesakani.php?Tesak=Թաղանթներ ( ինքնակպչուն պաստառներ )">Թաղանթներ
                                        ( ինքնակպչուն պաստառներ )</a>
                                </li>
                            </ul>
                        </li>
                        <li id="nerker"> <a href="../pages/Tesakani.php?Group=Ներկեր"> Ներկեր </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Դեկորատիվ ներկեր">Դեկորատիվ ներկեր</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ջրային ներկեր">Ջրային ներկեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Յուղային ներկեր">Յուղային ներկեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Նիտրո ներկեր">Նիտրո ներկեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ակրիլային ներկեր">Ակրիլային ներկեր</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Դեկորատիվ ներկեր">Դեկորատիվ ներկեր</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Գունանյութեր">Գունանյութեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Աէրոզոլային ներկեր">Աէրոզոլային
                                        ներկեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Պոլիուրեթանային ներկեր">Պոլիուրեթանային
                                        ներկեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Փոշեներկեր">Փոշեներկեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Էմալե ներկ">Էմալե ներկ</a></li>
                            </ul>
                        </li>
                        <li id="laqer"> <a href="../pages/Tesakani.php?Group=Լաքեր"> Լաքեր </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ջրային լաքեր">Ջրային լաքեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Յուղային լաքեր">Յուղային լաքեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Նիտրո լաքեր">Նիտրո լաքեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Պոլիուրեթանային լաքեր">Պոլիուրեթանային
                                        լաքեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Ակրիլային լաքեր">Ակրիլային լաքեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Աէրոզոլային լաքեր">Աէրոզոլային լաքեր</a>
                                </li>
                            </ul>
                        </li>
                        <li id="qiver"> <a href="../pages/Tesakani.php?Group=Քիվեր"> Քիվեր </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Պոլիուրեթանային քիվեր">Պոլիուրեթանային
                                        քիվեր</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Պոլիստիրոլե քիվեր">Պոլիստիրոլե քիվեր</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Փրփրապլաստե քիվեր">Փրփրապլաստե քիվեր</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Շրջանակ, նախշ, սյուն">Շրջանակ, նախշ,
                                        սյուն</a></li>
                            </ul>
                        </li>
                        <li id="ayl_apranqner"> <a href="../pages/Tesakani.php?Group=Այլ ապրանքներ"> Այլ ապրանքներ
                            </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Սոսինձներ">Սոսինձներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Լուծիչներ">Լուծիչներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Մածիկներ">Մածիկներ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Penoplex և Decostar">Penoplex և
                                        Decostar</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Սանտեխնիկա">Սանտեխնիկա</a></li>
                            </ul>
                        </li>
                        <li id="laminat"> <a href="../pages/Tesakani.php?Group=Լամինատ"> Լամինատ </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Հատակի լամինատ">Հատակի լամինատ</a></li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Շրիշակ (պլինտուս)">Շրիշակ (պլինտուս)</a>
                                </li>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Տակացուներ">Տակացուներ</a></li>
                            </ul>
                        </li>
                        <li id="elektrika"> <a href="../pages/Tesakani.php?Group=Էլեկտրիկա"> Էլեկտրիկա </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Mono Electric">Mono Electric</a></li>
                            </ul>
                        </li>
                        <li id="elektrika"> <a href="../pages/Tesakani.php?Group=Ջեռուցման համակարգեր"> Ջեռուցման
                                համակարգեր </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Կաթսաներ">Կաթսաներ</a></li>
                            </ul>
                        </li>
                        <li id="elektrika"> <a href="../pages/Tesakani.php?Group=Դռներ"> Դռներ </a>
                            <ul>
                                <li id=""><a href="../pages/Tesakani.php?Tesak=Միջսենյակային դռներ">Միջսենյակային
                                        դռներ</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="../pages/MerXanutnery.php">Մեր խանութները</a></li>
                <li><a href="../pages/Araqum.php">Առաքում</a></li>
                <li><a href="../pages/Ashxatanq.php">Աշխատանք</a></li>
            </ul>

        </nav>

        <div class="icons">

            <?php
            if (!isset($_SESSION['user_id'])) {
            ?>
            <a href="../pages/registration.php">
                <?php
            } else { ?>
                <a href="../pages/profile.php">
                    <?php } ?>
                    <i class="fa-regular fa-circle-user"></i>
                </a>
                <?php
            if (!isset($_SESSION['user_id'])) {
            ?>
                <a href="../pages/registration.php">
                    <?php
            } else { ?>
                    <a href="../pages/basket.php">
                        <?php } ?>
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <?php 
            if (!isset($_SESSION['user_id'])) {
            ?>
                    <a href="../pages/registration.php">
                        <i class="fa-solid fa-bookmark"></i>
                    </a>
                    <?php
            } else { ?>
                    <a href="../pages/savedProducts.php">
                        <i class="fa-solid fa-bookmark"></i>
                    </a>
                    <?php } ?>

        </div>
    </header>
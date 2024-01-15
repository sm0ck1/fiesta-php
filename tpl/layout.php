<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" Content="Егоров Сергей Олегович">
    <meta name="description" Content="[[desc]]ФИЕСТА - пиццерия - попробуйте всё разнообразие настоящей итальянской пиццы в Кривом Роге.">
    <meta name="keywords" Content="Фиеста, Кривой Рог, Кривбасс, пиццерия, пицца, кухня, отдых, еда, ресторан, бар, уютно">
    <meta name="google-site-verification" content="vWEknxrpAiKcooE1xN2ioNjd0pLfKxJk9uRywRXfSg8" />

    <link rel="apple-touch-icon" sizes="180x180" href="/tpl/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/tpl/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/tpl/favicon/favicon-16x16.png">
    <link rel="manifest" href="/tpl/favicon/site.webmanifest">
    <link rel="mask-icon" href="/tpl/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>[[h1]] FIESTA - Кофейня-Пиццерия, Бар, г.Кривой Рог. Быстрая доставка из Fiesta</title>
    <link rel="stylesheet" type="text/css" href="/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <style>
        @font-face {
            font-family: 'Intro_Inline-webfont';
            src: url('/front/fonts/Intro_Inline-webfont.otf');
            font-weight: normal;
            font-style: normal;

        }

        html {
            height: 100%;
        }

        body {
            min-height: 100%;
            font-family: 'Open Sans', sans-serif;
        }

        .bg-red {
            background-color: #CF000F;
        }

        .text-red {
            color: #CF000F;
        }

        .pimg-0 {
            top: 0;
        }

        .pimg-1 {
            bottom: 0;
            right: 0;
        }

        .pimg-2 {
            bottom: -73px;
            left: -50px;
        }

        .logos {
            width: 130px;
        }

        .sticky.is-sticky {
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            z-index: 1000;
            width: 100%;
        }

        .slog {
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 4;
        }

        .slog h2 {
            color: #FFD800;
            font-family: 'Intro_Inline-webfont';
            text-align: center;
            font-size: 70px;

        }

        .slog hr {
            background: url("/tpl/images/line.png") no-repeat;
            width: 700px;
            height: 10px;
            text-align: center;
            margin: 0 auto;
        }

        .b1,
        .b2 {
            background: url("/tpl/images/grey-texture.jpg") repeat;
        }

        .b4 {
            background: url("/tpl/images/5.jpg") repeat-y 0px 0px;
            background-size: 100%;
            width: 100%;
            min-height: 700px;
        }

        .b1 h2,
        .b2 h2,
        .b3 h2,
        .b4 h2,
        .caption {
            font-family: 'Intro_Inline-webfont';
            text-align: center;

        }

        .caption {
            position: absolute;
            top: 40%;
            left: 0;
            width: 100%;
            color: #fff;
            font-size: 30px;
            text-align: center;
            text-transform: uppercase;
            text-shadow: 2px 2px 2px rgb(2, 2, 2);
            -webkit-transition-property: top, bottom;
            -webkit-transition-duration: 0.5s;
            -moz-transition-property: top, bottom;
            -moz-transition-duration: 0.5s;
            -o-transition-property: top, bottom;
            -o-transition-duration: 0.5s;
            transition-property: top, bottom;
            transition-duration: 0.5s;
        }

        .image-wrapper .desc {
            display: none;
        }

        .image-wrapper:hover .desc {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            color: #fff;
            font-size: 20px;
            text-align: center;
            display: block;
            padding: 10px 0;
            background-color: rgba(0, 0, 0, 0.5)
        }

        .image-wrapper:hover .caption {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            color: #fff;
            font-size: 30px;
            text-align: center;
            text-transform: uppercase;
            text-shadow: 2px 2px 2px rgb(2, 2, 2);
            -webkit-transition-property: top, bottom;
            -webkit-transition-duration: 0.5s;
            -moz-transition-property: top, bottom;
            -moz-transition-duration: 0.5s;
            -o-transition-property: top, bottom;
            -o-transition-duration: 0.5s;
            transition-property: top, bottom;
            transition-duration: 0.5s;
        }

        .image-wrapper {
            position: relative;
            display: block;
            background-color: #555;
            overflow: hidden;
            width: 100%;
            border: 0;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            transition: all 0.5s;
        }

        .image-wrapper .image-darken-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: background-color 0.5s ease-in-out;
            -moz-transition: background-color 0.5s ease-in-out;
            -o-transition: background-color 0.5s ease-in-out;
            transition: background-color 0.5s ease-in-out;
            background-color: rgba(0, 0, 0, 0.3)
        }

        .image-wrapper:hover .image-darken-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: background-color 0.5s ease-in-out;
            -moz-transition: background-color 0.5s ease-in-out;
            -o-transition: background-color 0.5s ease-in-out;
            transition: background-color 0.5s ease-in-out;
            background-color: rgba(255, 255, 255, 0);
        }

        .image-wrapper:hover {
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, .175) !important
        }

        .menu-item h5 {
            height: 50px;
        }

        .b3 {
            min-height: 400px;
        }

        .cc {
            display: flex;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .flex-grow {
            flex: 1;
        }

        .display-5 {
            font-size: 30px;
        }

        .display-6 {
            font-size: 24px;
        }

        .imglogo {
            max-width: 120px;
        }

        .contacts-line {
            padding: 1em 0;
            background: rgba(77, 124, 134, 0.68);
            text-align: center;
        }

        .address-line {
            background: rgba(77, 124, 134, 0.68);
            text-align: center;
        }

        .bg-ital {
            background: url("/tpl/images/5.jpg") repeat-y 0px 0px;
            background-size: 100%;
            width: 100%;
        }

        .bg-home {
            overflow: hidden;
            z-index: -100;
            position: relative;
            height: 100%;
            width: 100%;
            padding-top: 45%;
        }

        .bg-home>video {
            position: absolute;
            top: -100px;
            left: 0;
            width: 100%;
        }

        .nowrap {
            white-space: nowrap;
        }

        /* Important part */
        .modal-dialog {
            overflow-y: initial !important
        }
    </style>
</head>

<body class="d-flex flex-column">
    <? include(__DIR__ . '/_inc.topmenu.php'); ?>
    <!-- <div class="bg-primary text-white py-5" style="display: block;  width: 100%; height: 100%; text-align: center;">
        <h1>Уважаемые гости!</h1>
        <p class="h2 text-danger">Пиццерия Фиеста закрыта в связи с карантином.</p>
        <p class="h3">Приносим свои извинения за возможные неудобства!</p>
    </div> -->
    <? include($INCLUDE['content']); ?><? include(__DIR__ . '/_inc.footer.php'); ?>
</body>

</html>
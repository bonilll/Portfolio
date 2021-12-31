<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hourglasses Project</title>
    <meta name="description" content>
    <meta name="robots" content="index, follow">
    <link href="/dist/app.css" rel="stylesheet">


    <!--analytics-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PQD8WY6KDT"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-PQD8WY6KDT');
    </script>
    <!--favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


</head>
<style>
    @font-face {
        font-family: 'gt';
        src: url(/fonts/GTSuperDisplay-Light.otf);
        font-style: normal;
        font-weight: 100;
    }

    @font-face {
        font-family: 'basis';
        src: url(/fonts/BasisGrotesque-Regular.otf);
        font-style: normal;
        font-weight: 100;
    }
</style>
<body>


<?php include '../components/hamburger.php' ?>
<?php include '../components/cursor.php' ?>


<!--titolo-->

<div class="w-full">
    <div class="row">
        <div class=" w-12/12 col c-project-page__title md:mt-150 md:mb-30 mt-100 mb-5"
        ">
        <h1>Hourglasses</h1>
    </div>
</div>

<div class="row">
    <div class="md:w-3/12 w-0/12"></div>
    <div class="md:w-6/12 w-12/12 col c-project-page__paragraph md:mt-30 md:mb-30 mt-50 mb-10">
        <p>
            Series of three hourglasses that mark different times. A different interpretation of the passage of time.
        </p>
    </div>
    <div class="md:w-3/12 w-0/12"></div>
</div>
<!--video-->

<div class=" mt-50 row col">
    <div class="md:w-2/12 w-0/12 col"></div>
    <div style="padding-top:calc(100% / 3 + 20%);position:relative; z-index:-1 !important;" class="w-full  col">
        <iframe src="https://player.vimeo.com/video/555092207?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Hourglass - One Minute"></iframe>
    </div>
    <div class="md:w-2/12 w-0/12 col"></div>
</div>


<div class=" mt-50 row col">
    <div class="md:w-2/12 w-0/12 col"></div>
    <div style="padding-top:calc(100% / 3 + 20%);position:relative; z-index:-1 !important;" class="w-full  col">
        <iframe src="https://player.vimeo.com/video/555081498?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Hourglass - Two Seconds"></iframe>
    </div>
    <div class="md:w-2/12 w-0/12 col"></div>
</div>


<div class=" mt-50 row col">
    <div class="md:w-2/12 w-0/12 col"></div>
    <div style="padding-top:calc(100% / 3 + 20%);position:relative; z-index:-1 !important;" class="w-full  col">
        <iframe src="https://player.vimeo.com/video/555089267?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479"
                frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen
                style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Hourglass - Six Seconds"></iframe>
    </div>
    <div class="md:w-2/12 w-0/12 col"></div>
    <script src="https://player.vimeo.com/api/player.js"></script>
</div>


<!--immagini-->


<div class="w-full mt-50">
    <div class="row">
        <div class="md:w-6/12 w-full col mt-16">
            <div class="c-project-container">
                <img src="../images/newhome/02hourglass.jpg" alt="Horglass">
            </div>
        </div>
        <div class="md:w-6/12 w-full col mt-16">
            <div class="c-project-container">
                <div class="c-project-container">
                    <img src="../images/newhome/03hourglass.jpg" alt="Metamorphosis">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="w-full">
    <div class="row">
        <div class="md:w-12/12 w-full col mt-16">
            <div class="c-project-container">
                <img src="../images/newhome/04hourglass.jpg" alt="Metamorphosis">
            </div>
        </div>
    </div>
</div>

<div class="w-full">
    <div class="row">
        <div class="md:w-6/12 w-full col mt-16">
            <div class="c-project-container">
                <img src="../images/newhome/05hourglass.jpg" alt="Metamorphosis">
            </div>
        </div>
        <div class="md:w-6/12 w-full col mt-16">
            <div class="c-project-container">
                <div class="c-project-container">
                    <img src="../images/newhome/06hourglass.jpg" alt="Metamorphosis">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="w-full">
    <div class="row">
        <div class="md:w-12/12 w-full col mt-16">
            <div class="c-project-container">
                <img src="../images/newhome/07hourglass.jpg" alt="Metamorphosis">
            </div>
        </div>
    </div>
</div>

<div class="w-full">
    <div class="row">
        <div class="md:w-6/12 w-full col mt-16">
            <div class="c-project-container">
                <img src="../images/newhome/08hourglass.jpg" alt="Metamorphosis">
            </div>
        </div>
        <div class="md:w-6/12 w-full col mt-16">
            <div class="c-project-container">
                <div class="c-project-container">
                    <img src="../images/newhome/09hourglass.jpg" alt="Metamorphosis">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="w-full">
    <div class="row">
        <div class="md:w-12/12 w-full col mt-16">
            <div class="c-project-container">
                <img src="../images/newhome/10hourglass.jpg" alt="Metamorphosis">
            </div>
        </div>
    </div>
</div>

<?php include '../components/footer.php' ?>


<script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace("HOST", location.hostname));
    //]]></script>

</body>
<script src="/dist/app.js"></script>
</html>
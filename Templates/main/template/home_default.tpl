<!DOCTYPE html>
<html dir="ltr">
<head>
    <title>{$title}</title>
    <meta charset="iso-8859-1">
    <link rel="stylesheet" href="{$appPath}/Templates/main/template/css/template_layout.css" type="text/css">
    <link rel="stylesheet" href="{$appPath}/Templates/main/template/css/layout.css" type="text/css">
    <script type="text/javascript" src="{$appPath}/lib/jquery/jquery-3.2.1.min.js"></script>
    <script src="{$appPath}/Templates/main/template/scripts/functions.js"></script>
    <!--[if lt IE 9]><script src="{$appPath}/Templates/main/template/scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
    <header id="header" class="clear">
        <div id="hgroup">
            <h1><a href="{$appPath}">{$title}</a></h1>
            <h2>Per i tuoi studi universitari</h2>
        </div>
        <nav>
            <ul>
                <li style="color:red">{$content_title}</li>
                {if $tasti_in_cima!=false}
                    {section name=i loop=$tasti_in_cima}
                        <li><a href="{$tasti_in_cima[i].link}">{$tasti_in_cima[i].testo}</a></li>
                    {/section}
                {/if}
                <li class="last"><a id="chisiamo" href="#">?</a></li>
            </ul>
        </nav>
    </header>
</div>
<!-- content -->
<div class="wrapper row2">
    <div id="container" class="clear">
        <!-- main content -->
        <div id="homepage">
            {$main_content}
        </div>
        <!-- / content body -->
    </div>
</div>
<!-- Footer -->
<div class="wrapper row3">
    <div id="footer" class="clear">
        <!-- Section One -->
        <section class="one_quarter">
            <h2 class="title">Menu Principale</h2>
            <nav>
                <ul>
                    <li style="color:red">{$content_title}</li>
                    {if $tasti_in_cima!=false}
                        {section name=i loop=$tasti_in_cima}
                            <li><a href="{$tasti_in_cima[i].link}">{$tasti_in_cima[i].testo}</a></li>
                        {/section}
                    {/if}
                    <li class="last"><a href="#">About Us</a></li>
                </ul>
            </nav>
        </section>
        <!-- Section Two -->
        <section class="one_quarter">
            <h2 class="title">Strumenti</h2>
            <nav>
                <ul>
                    <li><a href="#">Mappa del sito</a></li>
                    <li class="last"><a href="#">Contattaci</a></li>
                </ul>
            </nav>
        </section>
        <!-- Section Three -->
        <section class="one_quarter">
            <h2 class="title">Social</h2>
            <nav>
                <ul>
                    <li><a href="#">Consiglia questa pagina ai tuoi amici</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li class="last"><a href="#">Twitter</a></li>
                </ul>
            </nav>
        </section>
        <!-- Section Four -->
        <section class="one_quarter lastbox">
            <h2 class="title">UBS</h2>
            <nav>
                <ul>
                    <li><a href="#">Il nostro team</a></li>
                    <li class="last"><a href="#">Lavora con noi</a></li>
                </ul>
            </nav>
        </section>
        <!-- / Section -->
    </div>
</div>
<!-- Copyright -->
<div class="wrapper row4">
    <footer id="copyright" class="clear">
        <p class="fl_left"><a href="#">{$title}</a></p>
        <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    </footer>
</div>
</body>
</html>
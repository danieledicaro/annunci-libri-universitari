{php}$pathPROVVISORIA = "/WebProg/annunci-libri-universitari";{/php}
<!DOCTYPE html>
<html dir="ltr">
<head>
    <title>{$title}</title>
    <meta charset="iso-8859-1">
    <link rel="stylesheet" href="http://{$smarty.server.HTTP_HOST}{php}echo $pathPROVVISORIA;{/php}/Templates/main/template/css/layout.css" type="text/css">
    <!--[if lt IE 9]><script src="http://{$smarty.server.HTTP_HOST}{php}echo $pathPROVVISORIA;{/php}/Templates/main/template/scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
    <header id="header" class="clear">
        <div id="hgroup">
            <h1><a href="http://{$smarty.server.HTTP_HOST}{php}echo $pathPROVVISORIA;{/php}">{$title}</a></h1>
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
                <li class="last"><a href="#">Chi Siamo</a></li>
            </ul>
        </nav>
    </header>
</div>
<!-- content -->
<div class="wrapper row2">
    <div id="container" class="clear">
        <!-- Slider -->
        <section id="slider">immagine di ingresso</section>
        <!-- main content -->
        <div id="homepage">
            <div style="border: 1px solid red">TOP CONTENT da poter mettere lateralmente $top_content </div>
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
            <h2 class="title">Pannello di controllo</h2>
            <nav>
                <ul>
                    <li style="color:red">{$content_title}</li>
                    {if $tasti_in_cima!=false}
                        {section name=i loop=$tasti_in_cima}
                            <li><a href="{$tasti_in_cima[i].link}">{$tasti_in_cima[i].testo}</a></li>
                        {/section}
                    {/if}
                    <li class="last"><a href="#">Chi Siamo</a></li>
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
        <p class="fl_left"><a href="#">UBS - UniBookStore</a></p>
        <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    </footer>
</div>
</body>
</html>
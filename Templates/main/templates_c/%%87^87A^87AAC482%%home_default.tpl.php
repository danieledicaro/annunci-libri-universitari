<?php /* Smarty version 2.6.26, created on 2017-10-15 23:55:10
         compiled from home_default.tpl */ ?>
<?php $pathPROVVISORIA = "/WebProg/annunci-libri-universitari"; ?>
<!DOCTYPE html>
<html dir="ltr">
<head>
    <title><?php echo $this->_tpl_vars['title']; ?>
</title>
    <meta charset="iso-8859-1">
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $pathPROVVISORIA; ?>/Templates/main/template/css/layout.css" type="text/css">
    <!--[if lt IE 9]><script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $pathPROVVISORIA; ?>/Templates/main/template/scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div class="wrapper row1">
    <header id="header" class="clear">
        <div id="hgroup">
            <h1><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>
<?php echo $pathPROVVISORIA; ?>"><?php echo $this->_tpl_vars['title']; ?>
</a></h1>
            <h2>Per i tuoi studi universitari</h2>
        </div>
        <nav>
            <ul>
                <li style="color:red"><?php echo $this->_tpl_vars['content_title']; ?>
</li>
                <?php if ($this->_tpl_vars['tasti_in_cima'] != false): ?>
                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['tasti_in_cima']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                        <li><a href="<?php echo $this->_tpl_vars['tasti_in_cima'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['tasti_in_cima'][$this->_sections['i']['index']]['testo']; ?>
</a></li>
                    <?php endfor; endif; ?>
                <?php endif; ?>
                <li class="last"><a href="#">Chi Siamo</a></li>
            </ul>
        </nav>
    </header>
</div>
<!-- content -->
<div class="wrapper row2">
    <div id="container" class="clear">
        <!-- main content -->
        <div id="homepage">
            <?php echo $this->_tpl_vars['main_content']; ?>

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
                    <li style="color:red"><?php echo $this->_tpl_vars['content_title']; ?>
</li>
                    <?php if ($this->_tpl_vars['tasti_in_cima'] != false): ?>
                        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['tasti_in_cima']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                            <li><a href="<?php echo $this->_tpl_vars['tasti_in_cima'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['tasti_in_cima'][$this->_sections['i']['index']]['testo']; ?>
</a></li>
                        <?php endfor; endif; ?>
                    <?php endif; ?>
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
        <p class="fl_left"><a href="#"><?php echo $this->_tpl_vars['title']; ?>
</a></p>
        <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    </footer>
</div>
</body>
</html>
<?php /* Smarty version 2.6.26, created on 2017-10-15 23:55:12
         compiled from ricerca_lista.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'ricerca_lista.tpl', 13, false),)), $this); ?>
    RISULTATO:

    <?php if ($this->_tpl_vars['dati'] != false): ?>
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <?php if ($this->_sections['i']['iteration'] % 2 == 1): ?>
                <br/>----------------------------------------------
                <br/> titolo <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getLibro(); ?>

                <br/> <a href="?controller=ricerca&task=dettagli&id_annuncio=<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getIdAnnuncio(); ?>
">dettagli</a>
                <br/>venditore <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getVenditore(); ?>

                <br/>foto                 <br/>foto_tipo <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getFotoTipo(); ?>

                <br/>corso <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getCorso(); ?>

                <br/>prezzo <?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]->getPrezzo())) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

                <br/> citta consegna <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getCittaConsegna(); ?>

                <br/> se spedisce <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getSeSpedisce(); ?>

                <br/> descrizione <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getDescrizione(); ?>

                <br/> condizione <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getCondizione(); ?>

            <?php endif; ?>
        <?php endfor; endif; ?>
    <?php endif; ?>
        <?php if ($this->_tpl_vars['dati'] != false): ?>
    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <?php if ($this->_sections['i']['iteration'] % 2 == 0): ?>
        <br/>----------------------------------------------
        <br/> titolo <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getLibro(); ?>

        <br/> <a href="?controller=ricerca&task=dettagli&id_annuncio=<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getIdAnnuncio(); ?>
">dettagli</a>
        <br/>venditore <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getVenditore(); ?>

        <br/>foto         <br/>foto_tipo <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getFotoTipo(); ?>

        <br/>corso <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getCorso(); ?>

        <br/>prezzo <?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]->getPrezzo())) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>

        <br/> citta consegna <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getCittaConsegna(); ?>

        <br/> se spedisce <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getSeSpedisce(); ?>

        <br/> descrizione <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getDescrizione(); ?>

        <br/> condizione <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]->getCondizione(); ?>

    <?php endif; ?>
    <?php endfor; endif; ?>
    <?php endif; ?>

<?php if ($this->_tpl_vars['pagine'] != ''): ?>
    <br/>----------------------------------------------
    <br/>naviga le pagine
            <?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['pagine']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['step'] = 1;
$this->_sections['pages']['start'] = $this->_sections['pages']['step'] > 0 ? 0 : $this->_sections['pages']['loop']-1;
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = $this->_sections['pages']['loop'];
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
                <a href="index.php?controller=ricerca&task=<?php echo $this->_tpl_vars['task']; ?>
<?php if ($this->_tpl_vars['parametri'] != ''): ?>&<?php echo $this->_tpl_vars['parametri']; ?>
<?php endif; ?>&page=<?php echo $this->_sections['pages']['iteration']-1; ?>
"><?php echo $this->_sections['pages']['iteration']; ?>
</a>
            <?php endfor; endif; ?>
<?php endif; ?>

<div<?php print $attributes; ?>>
  <header class="l-header" role="banner">
    <div class="l-branding">
      <?php print render($page['branding']); ?>
    </div>
 
    <?php print render($page['header']); ?>

    <div id="off-canvas" class="l-off-canvas">
      <a id="off-canvas-show" href="#off-canvas" class="l-off-canvas-show"><?php print t('Show Navigation'); ?></a>
      <a id="off-canvas-hide" href="#" class="l-off-canvas-hide"><?php print t('Hide Navigation'); ?></a>
      <?php print render($page['navigation']); ?>
    </div>
  </header>

  <div class="l-main clearfix">
    <div class="l-content" role="main">
      <?php print render($page['highlighted']); ?>
      <?php print $breadcrumb; ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title): ?>
        <h1><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>

    <?php print render($page['sidebar_second']); ?>
  </div>
  
  <script type="text/javascript">
  jQuery( document ).ready(function() {
jQuery(".field__item h3").next('div').hide();
  jQuery(".field__item h3").click(function(e)  {
   jQuery(this).toggleClass("expanded");
jQuery(this).next('div').slideToggle(500);
        e.preventDefault();
});
    
});
</script>



  <footer class="l-footer" role="contentinfo">
    <?php print render($page['footer']); ?>
  </footer>

</div>

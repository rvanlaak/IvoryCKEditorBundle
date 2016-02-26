<?php foreach ($form as $child) : ?>
    <?php echo $view['ivory_ckeditor_javascript']->renderJavascript($child, true); ?>
<?php endforeach; ?>

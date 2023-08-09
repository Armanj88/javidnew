<?php

$footer_row1_columns = get_theme_mod('footer_widgets_row1_columns', 4);
$footer_row2_columns = get_theme_mod('footer_widgets_row2_columns', 2);

$widgets_row1 = wp_get_sidebars_widgets()['footer-widgets-1'];
$widgets_row2 = wp_get_sidebars_widgets()['footer-widgets-2'];


if ($footer_row1_columns > count($widgets_row1)) {
    $footer_row1_columns = count($widgets_row1);
}

if ($footer_row2_columns > count($widgets_row2)) {
    $footer_row2_columns = count($widgets_row2);
}

?>

<div class="grid-<?php echo $footer_row1_columns; ?> widgets-row1">
    <?php dynamic_sidebar('footer-widgets-1'); ?>
</div>
<div class="grid-<?php echo $footer_row2_columns; ?> widgets-row2">
    <?php dynamic_sidebar('footer-widgets-2'); ?>
</div>
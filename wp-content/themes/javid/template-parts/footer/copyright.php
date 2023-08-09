<?php
/**
 * Copyright part in footer
 *
 * @package Javid
 */

$copyright_right = get_theme_mod('footer_copyright_right', '© ' . date('Y') . '. ' . __('All Rights Reserved', 'javid') . '.');
$copyright_left = get_theme_mod('footer_copyright_left','© ' . date('Y') . '. ' . __('All Rights Reserved', 'javid') . '.');

$copyright = "";
$copyright_classes = "centered";
$copyright_centered = true;

if (empty($copyright_right) && empty($copyright_left)) {
    return null;
} else if (empty($copyright_right)) {
    $copyright = $copyright_left;
} else if (empty($copyright_left)) {
    $copyright = $copyright_right;
} else {
    $copyright_classes = "not-centered";
    $copyright_centered = false;
}

?>

<div class="footer-copyright <?php echo $copyright_classes; ?>">
    <?php if ($copyright_centered): ?>
    <p><?php echo $copyright; ?></p>
    <?php else: ?>

    <p><?php echo $copyright_left; ?></p>
    <p><?php echo $copyright_right; ?></p>

    <?php endif; ?>
</div>
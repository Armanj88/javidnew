<?php
/**
 * Header Navigation template
 *
 * @package Javid
 */

$head_cta_link = get_theme_mod('head_cta_link', '#');
$head_cta_text = get_theme_mod('head_cta_text', 'Click Me');
$show_login = get_theme_mod('show_header_login', true);
$show_cta = get_theme_mod('show_header_cta', true);
$show_search = get_theme_mod('show_header_search', true);
?>

<nav class="header-nav clearfix">
    <div class="container">
        <div class="logo">
            <?php
            if (function_exists('the_custom_logo')) {
                the_custom_logo();
            }
            ?>
        </div>
        <div class="navbar">
            <?php wp_nav_menu(array('theme_location' => 'javid-header-menu')); ?>
        </div>
        <div class="header-buttons">
            <?php if ($show_cta): ?>
            <a href="<?php echo esc_url($head_cta_link); ?>" class="headbtn btn px-4 py-2 border-box head-cta"><?php echo esc_html($head_cta_text) ?></a>
            <?php endif; ?>

            <?php if ($show_search): ?>
            <a href="javascript:void(0)" class="headbtn btn px-4 py-2 headbtn-icon" id="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
            <?php endif; ?>

            <?php if ($show_login): ?>
            <a href="<?php echo esc_url(wp_login_url()); ?>" class="headbtn btn px-4 py-2 headbtn-icon" id="user-btn">
                <i class="fa-solid fa-user"></i>
            </a>
            <?php endif; ?>
            <a href="javascript:void(0)" class="headbtn btn px-4 py-2 headbtn-icon responsive-menu-icon">
                <i class="fa-solid fa-bars" id="responsive-menu-icon"></i>
            </a>
        </div>
        <div class="responsive-menu" id="responsive-menu">
	        <?php wp_nav_menu(array('theme_location' => 'javid-header-menu')); ?>
        </div>
    </div>
</nav>
<?php
/**
 * Header Navigation template
 *
 * @package Javid
 */
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
            <?php wp_nav_menu(array('menu' => 'javid-header-menu')); ?>
        </div>
        <div class="header-buttons">
            <a href="#" class="headbtn btn btn-danger px-4 py-2">Hello</a>
            <a href="javascript:void(0)" class="headbtn btn px-4 py-2 headbtn-icon" id="search-btn">
                <i class="fa-solid fa-magnifying-glass"></i>
            </a>
        </div>
    </div>
</nav>
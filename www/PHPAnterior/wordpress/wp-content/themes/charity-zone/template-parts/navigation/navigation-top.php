<?php
/**
 * Displays top navigation
 *
 * @package Charity Zone
 */
?>

<div class="container">
    <div class="row">
        <div class="offset-lg-2 col-lg-8 col-md-8 col-4 self-align">
            <div class="toggle-nav mobile-menu">
                <button onclick="charity_zone_openNav()"><i class="fas fa-th"></i></button>
            </div>
            <div id="mySidenav" class="nav sidenav">
                <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'charity-zone' ); ?>">
                    <?php {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_class'     => 'menu', 
                                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'fallback_cb' => 'wp_page_menu',
                            )
                        );
                    } ?>
                </nav>
                <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="charity_zone_closeNav()"><i class="fas fa-times"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-md-4 col-8 donate-btn self-alignr">
            <?php if(get_theme_mod('charity_zone_donate_button') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('charity_zone_donate_button','')); ?>"><?php esc_html_e('Donate Now','charity-zone'); ?></a>
            <?php }?>
        </div>
    </div>
</div>

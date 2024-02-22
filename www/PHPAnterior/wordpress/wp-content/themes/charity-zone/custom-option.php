<?php

    $charity_zone_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $charity_zone_scroll_position = get_theme_mod( 'charity_zone_scroll_top_position','Right');
    if($charity_zone_scroll_position == 'Right'){
        $charity_zone_theme_css .='#button{';
            $charity_zone_theme_css .='right: 20px;';
        $charity_zone_theme_css .='}';
    }else if($charity_zone_scroll_position == 'Left'){
        $charity_zone_theme_css .='#button{';
            $charity_zone_theme_css .='left: 20px;';
        $charity_zone_theme_css .='}';
    }else if($charity_zone_scroll_position == 'Center'){
        $charity_zone_theme_css .='#button{';
            $charity_zone_theme_css .='right: 50%;left: 50%;';
        $charity_zone_theme_css .='}';
    }

    /*--------------------------- Slider Opacity -------------------*/

    $charity_zone_theme_lay = get_theme_mod( 'charity_zone_slider_opacity_color','');
    if($charity_zone_theme_lay == '0'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.1'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.1';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.2'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.2';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.3'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.3';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.4'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.4';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.5'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.5';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.6'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.6';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.7'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.7';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.8'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.8';
        $charity_zone_theme_css .='}';
        }else if($charity_zone_theme_lay == '0.9'){
        $charity_zone_theme_css .='#top-slider .owl-carousel .owl-item img{';
            $charity_zone_theme_css .='opacity:0.9';
        $charity_zone_theme_css .='}';
        }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $charity_zone_product_sale = get_theme_mod( 'charity_zone_woocommerce_product_sale','Right');
    if($charity_zone_product_sale == 'Right'){
        $charity_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $charity_zone_theme_css .='left: auto; right: 15px;';
        $charity_zone_theme_css .='}';
    }else if($charity_zone_product_sale == 'Left'){
        $charity_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $charity_zone_theme_css .='left: 15px; right: auto;';
        $charity_zone_theme_css .='}';
    }else if($charity_zone_product_sale == 'Center'){
        $charity_zone_theme_css .='.woocommerce ul.products li.product .onsale{';
            $charity_zone_theme_css .='right: 50%; left: 50%; letter-spacing: 1px; padding: 2px 0px; ';
        $charity_zone_theme_css .='}';
    }
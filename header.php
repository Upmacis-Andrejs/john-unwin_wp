<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <meta name="format-detection" content="telephone=no">
        <link href="//www.google-analytics.com" rel="dns-prefetch">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i" rel="stylesheet">

        <!--<meta name="google-site-verification" content="5GV3htbGte-ZaZ8Mp5ubMy2wfShvNOdhl1yn9VQ2cmo" />-->

        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?>>

    <!--[if lte IE 9]>
    <div id="update_browser_fake_body">
        <div id="update_browser_container">
            <div id="update_browser">
                <div id="update_browser_inner">
                    <h1>Please update your browser!</h1>
                    <p>You are using old browser version, which is not technically supported. That way some functions maybe are not available or aren't working right. Using information below please update or use another browser. </p>
                    <p>Free browsers - all browsers provide the same base functions and are easy to use. Choose which browser do you want to download:</p>
                    <div id="browser_icon_wrap" class="clear">
                        <a href="http://www.mozilla.org/en-US/firefox/new/" id="firefox" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Mozilla Firefox</span>
                        </a>
                        <a href="https://www.google.com/intl/en/chrome/browser/" id="chrome" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Google Chrome</span>
                        </a>
                        <a href="http://www.opera.com/" id="opera" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Opera</span>
                        </a>
                        <a href="https://safari.en.softonic.com/" id="safari" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Safari</span>
                        </a>
                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge" id="edge" class="browser_link">
                            <span class="browser_icon">&nbsp;</span>
                            <span class="browser_name">Microsoft Edge</span>
                        </a>
                    </div>
                    <div id="close_announcement_wrap">
                        <a href="#" id="close_announcement">Aizvērt</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <![endif]-->

        <!-- wrapper -->
        <div id="body-wrapper">

            <!-- header -->
            <header class="z-666" id="site-header">
                <div class="container">
                    <div class="row flex-vert-c">
                        <a id="mobile-menu-icon" href="#">
                            <div class="inner">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="wrapper-for-mobile-menu">
                    <div class="inner">
                        <div class="header-contacts-wrapper flex-vert-c w-100">
                            <div class="container">
                                <div class="row flex-vert-c">
                                    <?php if( get_field('phone', 'option') ): ?>
                                    <a class="phone-wrapper flex-vert-c" href="tel:<?php $phone = get_field('phone', 'option'); echo str_replace(' ', '', $phone); ?>">
                                        <span class="icon icon-phone"></span>
                                        <div class="phone-contents-wrapper flex-vert-c">
                                            <?php if( have_rows('emergency_phone_text', 'option') ): ?>
                                            <h4 class="text flex-vert-c">
                                                <?php while( have_rows('emergency_phone_text', 'option') ) : the_row(); ?>
                                                <span class="bold"><?php the_sub_field('bold_text', 'option'); ?></span>
                                                <span class="normal"><?php the_sub_field('normal_text', 'option'); ?></span>
                                                <?php endwhile;?>
                                            </h4>
                                            <?php endif; ?>
                                            <h4 class="phone bold"><?php echo $phone; ?></h4>
                                        </div>
                                    </a>
                                    <?php endif; ?>

                                    <?php if( get_field('email', 'option') ): ?>
                                    <a class="email-wrapper flex-vert-c" href="mailto:<?php the_field('email', 'option'); ?>">
                                        <span class="icon icon-mail"></span>
                                        <h4 class="email normal"><?php the_field('email', 'option'); ?></h4>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="header-menu-wrapper w-100">
                            <div class="container">
                                <div class="row">
                                    <nav class="nav flex-vert-c">
                                        <?php johnunwin_header_nav(); ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- /header -->

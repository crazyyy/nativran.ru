<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <?php wp_head(); ?>
  <?php $current_lang = pll_current_language(); ?>
</head>
<body <?php body_class(); ?>>
<!-- wrapper -->
<div class="wrapper">
<?php if( have_rows('header_sales') ) { ?>
  <style>
    header {
      height: 130px;
    }
  </style>
<?php } else {  ?>
  <style>
    header {
      height: 90px;
    }
  </style>
<?php } ?>
  <header>
    <?php if( have_rows('header_sales') ) { ?>
      <div class="present-line">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <?php while ( have_rows('header_sales') ) : the_row(); ?>
                <?php $image = get_sub_field('icon'); ?>
                <?php echo '<marquee>'; ?>
                  <?php if ( !empty($image)) { ?>
                    <img src="<?php echo $image['url']; ?>" style="height: 26px; margin-right: 10px;" />
                  <?php } ?>
                  <?php the_sub_field('text'); ?>
                <?php echo '</marquee>'; ?>
              <?php  endwhile; ?>

            </div>
          </div>
        </div><!-- /.container -->
      </div><!-- /.present-line -->
    <?php }  ?>

    <div class="header-line">
      <div class="container">

          <div class="logo">
              <a href="#top">
                <img src="<?php echo get_template_directory_uri(); ?>/img/big-logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
              </a>
          </div><!-- /logo -->
          <div class="slogan">
            <p><?php if (get_field('header_slogan')) { the_field('header_slogan'); } else { echo '<b class="blue-txt hidden-sm">НАТИВ</b> - 100% натуральный продукт'; }?></p>
          </div>
          <div class="lang-nav"><?php wpeHeadNav(); ?></div>
          <div class="head-contacts">
            <a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_field('head_main_phone')); ?>" class="main-phone"><?php the_field('head_main_phone'); ?></a>
            <div class="contacts">
              <a href="skype:<?php the_field('head_skype'); ?>?call" class="head-skype"><?php the_field('head_skype'); ?></a>
              <div class="tel_wrap">
                <a href="viber://chat?number=<?php echo preg_replace("/[^0-9]/", '', get_field('head_phone')); ?>" class="head-viber"></a>
                <a href="whatsapp://send?phone=<?php echo preg_replace("/[^0-9]/", '', get_field('head_phone')); ?>" class="head-watsup"></a>
                <a href="tel:+<?php echo preg_replace("/[^0-9]/", '', get_field('head_phone')); ?>" class="head-phone"><?php the_field('head_phone'); ?></a>
              </div>
            </div>
          </div>
          <div class="head-cart">
            <a src="#my-cart-modal" data-toggle="modal" class="glyphicon glyphicon-shopping-cart my-cart-icon">
              <span class="badge badge-notify my-cart-badge"></span>
            </a>
          </div>

      </div><!-- /.container -->
    </div>
    <nav class="nav" role="navigation">
    </nav><!-- /nav -->
  </header><!-- /header -->

<html>
<head>
    <title><?php wp_title('｜', true, 'right'); ?></title>
    <meta name="robots" content="index, follow">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
</head>

<body>

<header>
<h1 class="site_title">
<a href="<?php echo get_home_url();?>"><?php echo get_bloginfo('name');?></a>
</h1>

<!-- functions.phpで設定したメニューの読み込み -->
<nav id="menu-header">
<?php wp_nav_menu(
      array (
        'theme_location' => 'global'
      )
); ?>
</nav>
</header>

<main>
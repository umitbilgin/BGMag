<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title><?php if ( is_home() ) { bloginfo('name');  echo ' - ';  bloginfo('description'); } else {wp_title(''); echo' - '; bloginfo('name'); }?></title>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700,500' rel='stylesheet' type='text/css' async>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" async>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" async>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css" async>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<?php if(is_home()){ ?>
	<meta name="description" content="<?php echo of_get_option('bgm_ds'); ?>" />
<?php } ?>
<?php if(is_single()){ ?>
	<meta property="og:site_name" content="<?php if ( is_home() ) { bloginfo('name');  echo ' - ';  bloginfo('description'); } else {wp_title(''); echo' - '; bloginfo('name'); }?>">
	<meta property="og:title" content="<?php if ( is_home() ) { bloginfo('name');  echo ' - ';  bloginfo('description'); } else {wp_title(''); echo' - '; bloginfo('name'); }?>">
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php the_permalink() ?>">
	<meta property="og:image" content="<?php the_post_thumbnail_url(); ?>">
<?php } ?>
	<meta name="robots" content="index, follow" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php if (of_get_option('bgm_favicon') == "" ) { ?>
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico" /><?php } else { ?>
<link rel="shortcut icon" href="<?php echo of_get_option('bgm_favicon'); ?>" /><?php } ?>
	<?php wp_head(); ?>
</head>
<body>
	<div class="container" id="icerik">
		<div class="navbar navbar-default" id="menu">
			<div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>
					<a class="navbar-brand visible-xs" href="#"><?php bloginfo('name'); ?></a>
				</div>
				<div class="navbar-collapse collapse" id="menu-c">
					  <?php wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'container' => 'ul', 		
							'menu_class' => 'nav navbar-nav', 							
						)); ?>
				</div>
			</div>
		</div>
		<div class="container visible-lg" id="header">
		<div class="pull-left">
		<a href="<?php bloginfo('url'); ?>">
		<?php if (of_get_option('bgm_logo') == "" ) { ?>
		<img src="<?php bloginfo('template_url'); ?>/logo.png" title="<?php bloginfo('name'); ?>"alt="<?php bloginfo('names'); ?>" width="100%" height="100%"/>
		<?php } else { ?>
		<img src="<?php echo of_get_option('bgm_logo'); ?>" title="<?php bloginfo('name'); ?>"alt="<?php bloginfo('names'); ?>" width="100%" height="100%"/>
		<?php } ?>
		</a>
		</div>
		<div class="pull-right" id="reklamalani">
		<?php echo of_get_option('bgm_hr728x90'); ?>
		</div>
		<div style="clear:both;"></div>
		</div>
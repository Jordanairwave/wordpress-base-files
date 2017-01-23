<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<title><?php get_header(); ?></title>
	<meta charset="utf-8">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link href="css/style.css?v=1.0" rel="stylesheet" type="text/css" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> 
	
	<! -- Geo Location - http://www.geo-tag.de/generator/en.html-->
	<meta name="geo.region" content="GB-OXF" />
	<meta name="geo.placename" content="oxford" />
	<meta name="geo.position" content="55.378051;-3.435973" />
	<meta name="ICBM" content="55.378051, -3.435973" />

	<!-- Facebook -->
	<meta property=”og:title” content=<?php echo $pageTitle; ?>>
	<meta property=”og:type” content=”website”>
	<meta property=”og:image” content=<?php echo bloginfo( 'wpurl' ) . "/social.png"; ?>>
	<meta property=”og:url” content=<?php echo get_permalink( $post->ID ); ?>>
	<meta property=”og:description” content=<?php echo $pageDescription; ?>>
	
	<!-- Twitter -->
	<meta name="twitter:card" content="summary">
	<meta name="twitter:title" content=<?php echo $pageTitle; ?>>
	<meta name="twitter:description" content=<?php echo $pageDescription; ?>>
	<meta name="twitter:image:src" content=<?php echo bloginfo( 'wpurl' ) . "/social.png"; ?>>	
	<meta name="twitter:url" content=<?php echo get_permalink( $post->ID ); ?>>
	
	<script>
	  var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
	  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	  g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	  s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
</head>
<body>
	<div id="page-wrap">
		<header id="header">
			<nav id="main-nav">
			
			</nav>
		</header>
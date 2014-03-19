<?php
/**
 * @package WordPress
 * @subpackage Bijouxs
 */

/*
Template Name: Recipe Card
*/

$rid = $_REQUEST['rid'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<title>Bijouxs Recipe | <?php echo get_the_title($rid); ?></title>
<style type="text/css" media="screen">
	.Gothic720BT-LightB { 
		font-family: Gothic720BT-LightB, sans-serif;
		font-weight: normal;
		font-style: normal;
	}
	
	@font-face {
		font-family: DidotLPRegularWeb;
		src: url("<?php echo bloginfo('template_directory'); ?>/webfonts/DIDOT-RGWeb.eot");
		font-weight: 100;
	}
	
	@font-face {
		font-family: DidotLPRegularWeb;
		src: url("<?php echo bloginfo('template_directory'); ?>/webfonts/DIDOT-RGWeb.woff") format("woff");
		font-weight: 100;
	}
	
	@font-face {font-family: 'Gothic720BT-LightB';src: url('<?php echo bloginfo('template_directory'); ?>/webfonts/23D911_0_0.eot');src: url('webfonts/23D911_0_0.eot?#iefix') format('embedded-opentype'),url('<?php echo bloginfo('template_directory'); ?>/webfonts/23D911_0_0.woff') format('woff'),url('<?php echo bloginfo('template_directory'); ?>/webfonts/23D911_0_0.ttf') format('truetype');} 
	
	.DidotRegular { 
		font-family: DidotLPRegularWeb, sans-serif;
		font-weight: 100;
	}

	* {
		padding: 0;
		margin: 0;
	}
	
	body {
		padding: 0 32px;
	}
	
	div#container {
	}
	
	img#recipe_logo {
		display: block;
		margin: 0 auto;
	}
	
	div#recipe_header {
		border-bottom: 3px solid #ECEBE9;
	}
	
	h2.recipe_title {
		font: normal 24px/26px Gothic720BT-LightB, sans-serif;
		color: #FF6600;
		margin: 36px 0 31px 0;
	}
	
	div#recipe_body {
		font: 14px/22px Gothic720BT-LightB, sans-serif;
		color: #21211D;
		background: white url('<?php echo bloginfo('template_directory') ?>/images/recipe_card_bottom.jpg') 0 100% no-repeat;
		padding-bottom: 52px;
	}
	
	p#print_recipe {
		float: right;
		margin: 14px 0 36px 0;
	}
	
	p#print_recipe a:link, p#print_recipe a:visited {
		background: transparent url('<?php echo bloginfo('template_directory'); ?>/images/print_recipe.jpg') 0 0 no-repeat;
		width: 148px;
		height: 39px;
		text-indent: -9999em;
		display: block;
		outline: none;
	}
	
	p#print_recipe a:hover {
		background: transparent url('<?php echo bloginfo('template_directory') ?>/images/print_recipe_over.jpg') 0 0 no-repeat;
	}
	
</style>
<style type="text/css" media="print">
	p#print_recipe, p#print_recipe a {
		display: none;
	}
	
	.Gothic720BT-LightB { 
		font-family: Gothic720BT-LightB, sans-serif;
		font-weight: normal;
		font-style: normal;
	}
	
	@font-face {
		font-family: DidotLPRegularWeb;
		src: url("<?php echo bloginfo('template_directory'); ?>/webfonts/DIDOT-RGWeb.eot");
		font-weight: 100;
	}
	
	@font-face {
		font-family: DidotLPRegularWeb;
		src: url("<?php echo bloginfo('template_directory'); ?>/webfonts/DIDOT-RGWeb.woff") format("woff");
		font-weight: 100;
	}
	
	@font-face {font-family: 'Gothic720BT-LightB';src: url('<?php echo bloginfo('template_directory'); ?>/webfonts/23D911_0_0.eot');src: url('webfonts/23D911_0_0.eot?#iefix') format('embedded-opentype'),url('<?php echo bloginfo('template_directory'); ?>/webfonts/23D911_0_0.woff') format('woff'),url('<?php echo bloginfo('template_directory'); ?>/webfonts/23D911_0_0.ttf') format('truetype');} 
	
	.DidotRegular { 
		font-family: DidotLPRegularWeb, sans-serif;
		font-weight: 100;
	}

	* {
		padding: 0;
		margin: 0;
	}
	
	body {
		padding: 0 32px;
	}
	
	div#container {
	}
	
	img#recipe_logo {
		display: block;
		margin: 0 auto;
	}
	
	div#recipe_header {
		border-bottom: 3px solid #ECEBE9;
	}
	
	h2.recipe_title {
		font: normal 24px/26px Gothic720BT-LightB, sans-serif;
		color: #FF6600;
		margin: 36px 0 31px 0;
	}
	
	div#recipe_body {
		font: 14px/22px Gothic720BT-LightB, sans-serif;
		color: #21211D;
		background: white url('<?php echo bloginfo('template_directory') ?>/images/recipe_card_bottom.jpg') 0 100% no-repeat;
		padding-bottom: 52px;
	}
</style>
</head>

<body>

<div id="container">
	<div id="recipe_header">
		<img src="<?php echo bloginfo('template_directory'); ?>/images/recipe_logo.jpg" width="234" height="139" id="recipe_logo" alt="" />
	</div>
	<div id="recipe_body">
		<h2 class="recipe_title"><?php echo get_the_title($rid); ?></h2>
		<?php
			$recipe = get_post_meta( $rid, 'recipe', TRUE );
			echo nl2br( $recipe );
		?>
	</div>
	<p id="print_recipe"><a href="javascript:window.print(false);">print recipe</a></p>
</div>

</body>
</html>

<?php


function collapsed() {
	if($topCollapsed) {
		echo "topCollapsed";
	}
}


/* SHORTCODES */


/* Fang Chia randomness */

function getLetters($word) {
	$letters = "";
	for($i = 0; $i < strlen($word); $i++) {
		$left = rand(10,12);
		$top = rand(20,40);
		$href = get_bloginfo('url') . "/websites/fang-chia";
		$letter = $word[$i];
		$letters .= "<div class='fcLetter' style='left: $left%; top: $top" . "px;'>
			<a href='$href'>$letter</a>
		</div>";
	}
	return $letters;
}

function fangChiaPortf() {
	$imgsURL = "http://fangchia.com/wp/wp-content/themes/Everybody-for-Something/images";
	$text = array( "fang", "chia" );
	$codes = array("&#8756;","&#8776;","&#937;","@","&#8747;","%","&&","*","+","&#8734;","~?", "&#9786;", "&#9824;", "&#9827;", "&#9829;", "&#9830;");
	$numExtras = rand(5,12);
	$numArrows = rand(3,10);

	$arrowFileNums = array("01","02","03","04","05");

	$height = 200;
	$lineHeight = $height/count($text) . "px";
	
	$fc = "<div class='portf fcLinx' style='height: $height" . "px;'>";

	foreach($text as $t) {
		$fc .= "<div class='fcLine' style='height: $lineHeight;'>" . getLetters( strtoupper($t) ) . "</div>";
	}

	for($i = 0; $i < $numExtras; $i++) {
		$code = $codes[array_rand($codes)];
		$left = rand(10,90) . "%";
		$top = rand(30,160) . "px";
		$fcURL = get_bloginfo('url') . "/websites/fang-chia";
		$fc .= "<div class='fcExtra' style='left: $left; top: $top;'>
			<a href='$fcURL'>$code</a>
		</div>";
	}

	for($i = 0; $i < $numArrows; $i++) {
		$code = $codes[array_rand($codes)];
		$left = rand(10,90) . "%";
		$top = rand(30,160) . "px";
		$fc .= "<img class='fcArrow' src='$imgsURL/arrow".$arrowFileNums[array_rand($arrowFileNums)].".png' style='top:$top; left: $left;' />";
	}

	$fc .= "</div><!-- .fcLinx -->";
	

	return $fc;
}

function fangChia( $atts ) {
	extract( shortcode_atts( array(
		"version" => "portfolio"
	), $atts ) );

	switch($version) {
		case "portfolio":
			return fangChiaPortf();
			break;
		case "display";
			return fangChiaDisplay();
			break;
	}
}

add_shortcode( "fangchia", "fangChia" );







/* Load scripts, e.g. jQuery */

if ( !function_exists( 'get_scripts' ) ) {
	function get_scripts() {
		wp_enqueue_script( 'jquery' );
	}
}

add_action( 'init', 'get_scripts' );


/* Register navigation menus */

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'pluginbuddy_mobile' => 'PluginBuddy Mobile Navigation Menu',
		  'foot_menu' => 'My Custom Footer Menu'
		)
	);
}



/* Support custom menus */

add_theme_support( 'menus' );


/* Register Custom types */

function create_post_type() {
	register_post_type( 'website',
		array(
			'labels' => array(
				'name' => __( 'Websites' ),
				'singular_name' => __( 'Website' )
			),
		'supports' => array('title','editor','thumbnail','excerpt','custom-fields'),
		'public' => true,
		'has_archive' => true,
		)
	);
}

add_action( 'init', 'create_post_type' );

/* Get rid of admin menu items */

function remove_menus () {
global $menu;
	$restricted = array(__('Tools'), __('Users'), __('Comments'));
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
//add_action('admin_menu', 'remove_menus');

/* Get rid of header stuff we don't need */

remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'index_rel_link' );




/*** META BOXES ***/

include_once 'WPAlchemy/MetaBox.php';
 
// include css to help style our custom meta boxes
if (is_admin()) {
	wp_enqueue_style( 'custom_meta_css' , TEMPLATEPATH . '/WPAlchemy/meta.css');
}
 
$custom_metabox = new WPAlchemy_MetaBox(array
(
	'id' => 'custom_meta', // underscore prefix hides fields from the custom fields area
	'title' => 'My Custom Meta',
	'template' => TEMPLATEPATH . '/WPAlchemy/meta.php'
));


?>
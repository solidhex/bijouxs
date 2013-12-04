<?PHP
/*
Plugin Name: FeedBlitz Member Mail
Plugin URI: http://www.feedblitz.com
Description: Adds a checkbox to the user registration dialog and comment forms enabling users to register for or comment on both a WordPress site and create a <a href="http://www.feedblitz.com">FeedBlitz</a> newsletter subscription from a single screen 
Version: 0.92
Author: FeedBlitz, LLC & ComLuv
Author URI: http://www.feedblitz.com
*/

/**
 * WP PLUGIN CONFIGURATION
 **/

$fbz_data = array(
	'feedblitz_feedid'		=> '',
	'feedblitz_text'		=> 'Keep me up to date with new posts via email'
);

add_option('feedblitz_settings',$fbz_data,'FeedBlitz Newsletter Options');

$feedblitz_settings = get_option('feedblitz_settings');

function fbz_is_hash_valid($form_hash) {
	$ret = false;
	$saved_hash = fbz_retrieve_hash();
	if ($form_hash === $saved_hash) {
		$ret = true;
	}
	return $ret;
}

function fbz_generate_hash() {
	return md5(uniqid(rand(), TRUE));
}

function fbz_store_hash($generated_hash) {
	return update_option('feedblitz_token',$generated_hash,'FeedBlitz Security Hash');
}

function fbz_retrieve_hash() {
	$ret = get_option('feedblitz_token');
	return $ret;
}

/* Heavily borrowed auth code from the FeedBurner FeedSmith plugin */
function fbz_ol_is_authorized() {
	global $user_level;
	if (function_exists("current_user_can")) {
		return current_user_can('activate_plugins');
	} else {
		return $user_level > 5;
	}
}

function fbz_ol_add_feedblitz_options_page() {
	if (function_exists('add_options_page')) {
		add_options_page('FeedBlitz', 'FeedBlitz', 8, basename(__FILE__), 'fbz_ol_feedblitz_options_subpanel');
	}
}

function fbz_ol_feedblitz_options_subpanel() {
	global $fbz_ol_flash, $feedblitz_settings, $_POST, $wp_rewrite;
	if (fbz_ol_is_authorized()) {
		// Easiest test to see if we have been submitted to
		if(isset($_POST['feedblitz_feedid']) || isset($_POST['feedblitz_text'])) {
			// Now we check the hash, to make sure we are not getting CSRF
			if(fbz_is_hash_valid($_POST['token'])) {
				if (isset($_POST['feedblitz_feedid'])) { 
					$feedblitz_settings['feedblitz_feedid'] = $_POST['feedblitz_feedid'];
					update_option('feedblitz_settings',$feedblitz_settings);
					$fbz_ol_flash = "Your settings have been saved.";
				}
				if (isset($_POST['feedblitz_text'])) { 
					$feedblitz_settings['feedblitz_text'] = $_POST['feedblitz_text'];
					update_option('feedblitz_settings',$feedblitz_settings);
					$fbz_ol_flash = "Your settings have been saved.";
				} 
			} else {
				// Invalid form hash, possible CSRF attempt
				$fbz_ol_flash = "Security hash missing.";
			} // endif fb_is_hash_valid
		} // endif isset(feedblitz_xxx)
	} else {
		$fbz_ol_flash = "You don't have enough access rights.";
	}
	
	if ($fbz_ol_flash != '') echo '<div id="message" class="updated fade"><p>' . $fbz_ol_flash . '</p></div>';
	
	if (fbz_ol_is_authorized()) {
		$temp_hash = fbz_generate_hash();
		fbz_store_hash($temp_hash);
		echo '<div class="wrap">';
		echo '<h2>FeedBlitz Newsletter Settings</h2>';
		echo '<p>This plugin makes it easy keep visitors up to date with your FeedBlitz newsletter by integrating newsletter sign up with the end user registration process and by adding a checkbox to the comment form on posts and pages to allow visitors to subscribe when they comment.</p>
		<form action="" method="post">
		<input type="hidden" name="redirect" value="true" />
		<input type="hidden" name="token" value="' . fbz_retrieve_hash() . '" />
		<ol>
		<li>To get started, <a href="http://www.feedblitz.com/f/f.fbz?NewsSource&url=' . get_bloginfo('url') . '" target="_blank">create a FeedBlitz Newsletter for ' . get_bloginfo('name') . '</a> if you have not done so already.</li>
		<li>Once you have created your Newsletter, enter its ID into the field below (the Newsletter ID can be found at <a href="http://www.feedblitz.com/f/f.fbz?Lists">http://www.feedblitz.com/f/f.fbz?Lists</a>):<br/><input type="text" name="feedblitz_feedid" value="' . htmlentities($feedblitz_settings['feedblitz_feedid']) . '" size="10" /></li>
		<li>Optional: Set the text that will appear next to the opt in check box on the registration form: <br/><input type="text" name="feedblitz_text" value="' . htmlentities($feedblitz_settings['feedblitz_text']) . '" size="45" />
		</ol>
		<p><input type="submit" value="Save" /></p></form>';
		echo '</div>';
	} else {
		echo '<div class="wrap"><p>Sorry, you are not allowed to access this page.</p></div>';
	}

}


/**
 * WP HOOKS
 **/
add_action('register_post','fb_plugin_post',10,3);
add_action('register_form','fb_plugin_form');
add_action('comment_form','abfb_comment_form'); // checkbox for comment form
add_action('wp_insert_comment','abfb_comment_post',10,2); // comment was posted.

/**
 * END WP HOOKS
 **/

/* Because I'm no PHP expert, copied from example at http://nadeausoftware.com/articles/2007/06/php_tip_how_get_web_page_using_curl */
function fbz_get_web_page( $url ){
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "feedblitz", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects    
	);    
	$ch      = curl_init( $url );    
	curl_setopt_array( $ch, $options );    
	$content = curl_exec( $ch );    
	$err     = curl_errno( $ch );    
	$errmsg  = curl_error( $ch );    
	$header  = curl_getinfo( $ch );    
	curl_close( $ch );    
	$header['errno']   = $err;    
	$header['errmsg']  = $errmsg;    
	$header['content'] = $content;    
	return $header;
}

/* Process the checkbox added and call FeedBlitz to start the dual opt in newsletter process */
function fb_plugin_post($login,$email,$errors){

 global $feedblitz_settings;

/* ask feedblitz to send the registrant an activation email to confirm their subscirption (dual opt in).
   When the user clicks the link they will have to complete a captcha to prove they're human */

   $feedid=$feedblitz_settings['feedblitz_feedid'];

   if(trim($feedid)=='')
   {
	$errors->add('newsletter_error',__('Newsletter ID not specified. Please log in to the admin user interface and update the FeedBlitz settings'));
   }

   if($_POST['fbz_checkbox']==__('on'))
   {
       $page='http://www.feedblitz.com/f?newsubscriber='.$email.'&feedid='.$feedblitz_settings['feedblitz_feedid'];
       fbz_get_web_page($page);

	   if ( $result['errno'] != 0 || $result['http_code'] != 200 ) 
	   {
	/* commented out because not getting a newsletter isn't fatal  - let registration continue*/
	/*	$errors->add('newsletter error',__'Unable to initiate newsletter subscription'));	*/ 
	   }
   }
}

/* Add the subscription checkbox to the screen */
function fb_plugin_form(){
   global $feedblitz_settings;
   $feedid=$feedblitz_settings['feedblitz_feedid'];
   if(trim($feedid)!='')
   {
 $html = '
	<div width="100%">	
		<p>
 			<label style="display: block; margin-bottom: 5px;">
 				<input type="checkbox" checked name="fbz_checkbox" id="fbz_checkbox" class="input" /> '.$feedblitz_settings['feedblitz_text'].'
 			</label>
 			<input type="hidden" name="feedid" id="feedid" value="'.$feedblitz_settings['feedblitz_feedid'].'" />
 		</p>
	</div>
';
   } else {
  $html='<div width="100%"><p>FeedBlitz plugin error. No feed id specified. Integrated newsletter registration is disabled.</p></div>';
   }
echo $html;
}

/* add the container for the comment form checkbox */
function abfb_comment_form(){
	global $feedblitz_settings;
	if($feedblitz_settings['feedblitz_feedid']){
		//only add if feedid exists
		echo '<p id="abfb_p" style="clear:both;"></p>';
		echo '<script type="text/javascript">
		var abfb_p = document.getElementById("abfb_p");
		var abfb_cb = document.createElement("input");
		var abfb_text = document.createTextNode("'.$feedblitz_settings['feedblitz_text'].'");
		abfb_cb.type = "checkbox";
		abfb_cb.id = "fbz_checkbox";
		abfb_cb.name = "fbz_checkbox";
		abfb_cb.style.width = "25px";
		abfb_p.appendChild(abfb_cb);
		abfb_p.appendChild(abfb_text);
		</script>';
	}
}

/* call the subscribe function for a comment if it was posted with the checkbox on */
function abfb_comment_post($id,$commentdata){
	$email = $commentdata->comment_author_email;
	fb_plugin_post('',$email,'');
}
add_action('admin_menu', 'fbz_ol_add_feedblitz_options_page');

?>

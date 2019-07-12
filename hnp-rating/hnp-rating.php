<?php  
/*
*	Plugin Name: HNP-Rating
*	Plugin URI: #
*	Description: Grabs Profile ratings from google,azazon,facebook,ebay,tripadvisor,anwalt,jameda and aerzte.
*	Version: 1.0
*	Author: HNP-Rating
*	Author URI: #
*	License: HNP-Rating
*
*/

$plugin_url = WP_PLUGIN_URL . '/hnp-rating';

$options = array();
	function hnp_rating_menu(){
		add_menu_page(
			'HNP-Rating Plugin',
			'HNP-RATING',
			'manage_options',
			'hnp_rating_options',
			'hnp_rating_display'
		);
	}
	add_action('admin_menu', 'hnp_rating_menu');

	register_activation_hook( __FILE__, 'myplugin_activate' );
    function myplugin_activate() {
   //create a variable to specify the details of page

    	  $page = get_page_by_path( "hnp-rating" , OBJECT );

     if (!isset($page) ){
     	  $post = array(     
                 'post_content'   => '[hnp-rating]', //content of page
                 'post_title'     =>'HNP-Rating', //title of page
                 'post_status'    =>  'publish' , //status of page - publish or draft
                 'post_type'      =>  'page'  // type of post
		);
       wp_insert_post( $post ); // creates page
     }
     
    }

	function hnp_rating_display(){
		if (!current_user_can('manage_options' )){
			wp_die('You do not have enough permission to view this page');
		}

		global $plugin_url;
		global $options;

		if (isset($_POST['form_submit_facebook'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name = esc_html($_POST['name'] );
		$phone = esc_html($_POST['phone'] );
		$address = esc_html($_POST['address'] );
		$country = esc_html($_POST['country'] );
		$image_link = esc_html($_POST['image_link'] );
		$postal_code = esc_html($_POST['postal_code'] );
		$street_address = esc_html($_POST['street_address'] );
		$profile_link = esc_html($_POST['profile_link'] );
		$profile_link=rtrim($profile_link,"/ ");
		$clean_link = explode('?', $profile_link);
		$profile_link = $clean_link[0];
		$options['name'] = $name;
		$options['phone'] = $phone;
		$options['address'] = $address;
		$options['country'] = $country;
		$options['image_link'] = $image_link;
		$options['postal_code'] = $postal_code;
		$options['street_address'] = $street_address;
		$options['profile_link'] = $profile_link;
		$options['last_updated'] = time();
		update_option('hnp_rating_facebook', $options);
		
		}

		if (isset($_POST['form_submit_google'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name1 = esc_html($_POST['name1'] );
		$google_address1 = esc_html($_POST['google_address1'] );
		$phone1 = esc_html($_POST['phone1'] );
		$address1 = esc_html($_POST['address1'] );
		$country1 = esc_html($_POST['country1'] );
		$image_link1 = esc_html($_POST['image_link1'] );
		$postal_code1 = esc_html($_POST['postal_code1'] );
		$street_address1 = esc_html($_POST['street_address1'] );
		$options['name1'] = $name1;
		$options['google_address1'] = $google_address1;
		$options['phone1'] = $phone1;
		$options['address1'] = $address1;
		$options['country1'] = $country1;
		$options['image_link1'] = $image_link1;
		$options['postal_code1'] = $postal_code1;
		$options['street_address1'] = $street_address1;
		$options['last_updated'] = time();
		update_option('hnp_rating_google', $options);

		}

		if (isset($_POST['form_submit_amazon'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name2 = esc_html($_POST['name2'] );
		$phone2 = esc_html($_POST['phone2'] );
		$address2 = esc_html($_POST['address2'] );
		$country2 = esc_html($_POST['country2'] );
		$image_link2 = esc_html($_POST['image_link2'] );
		$postal_code2 = esc_html($_POST['postal_code2'] );
		$street_address2 = esc_html($_POST['street_address2'] );
		$profile_link2 = $_POST['profile_link2'];
		//$profile_link2=rtrim($profile_link2,"/ ");
		$options['name2'] = $name2;
		$options['phone2'] = $phone2;
		$options['address2'] = $address2;
		$options['country2'] = $country2;
		$options['image_link2'] = $image_link2;
		$options['postal_code2'] = $postal_code2;
		$options['street_address2'] = $street_address2;
		$options['profile_link2'] = $profile_link2;
		$options['last_updated'] = time();
		update_option('hnp_rating_amazon', $options);

		}

		if (isset($_POST['form_submit_ebay'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name3 = esc_html($_POST['name3'] );
		$phone3 = esc_html($_POST['phone3'] );
		$address3 = esc_html($_POST['address3'] );
		$country3 = esc_html($_POST['country3'] );
		$image_link3 = esc_html($_POST['image_link3'] );
		$postal_code3 = esc_html($_POST['postal_code3'] );
		$street_address3 = esc_html($_POST['street_address3'] );
		$profile_link3 = $_POST['profile_link3'];
		//$profile_link3=rtrim($profile_link3,"/ ");
		$options['name3'] = $name3;
		$options['phone3'] = $phone3;
		$options['address3'] = $address3;
		$options['country3'] = $country3;
		$options['image_link3'] = $image_link3;
		$options['postal_code3'] = $postal_code3;
		$options['street_address3'] = $street_address3;
		$options['profile_link3'] = $profile_link3;
		$options['last_updated'] = time();
		update_option('hnp_rating_ebay', $options);

		}


		if (isset($_POST['form_submit_anwalt'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name4 = esc_html($_POST['name4'] );
		$phone4 = esc_html($_POST['phone4'] );
		$address4 = esc_html($_POST['address4'] );
		$country4 = esc_html($_POST['country4'] );
		$image_link4 = esc_html($_POST['image_link4'] );
		$postal_code4 = esc_html($_POST['postal_code4'] );
		$street_address4 = esc_html($_POST['street_address4'] );
		$profile_link4 = $_POST['profile_link4'];
		//$profile_link4=rtrim($profile_link4,"/ ");
		$options['name4'] = $name4;
		$options['phone4'] = $phone4;
		$options['address4'] = $address4;
		$options['country4'] = $country4;
		$options['image_link4'] = $image_link4;
		$options['postal_code4'] = $postal_code4;
		$options['street_address4'] = $street_address4;
		$options['profile_link4'] = $profile_link4;
		$options['last_updated'] = time();
		update_option('hnp_rating_anwalt', $options);

		}


		if (isset($_POST['form_submit_aertz'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name5 = esc_html($_POST['name5'] );
		$phone5 = esc_html($_POST['phone5'] );
		$address5 = esc_html($_POST['address5'] );
		$country5 = esc_html($_POST['country5'] );
		$image_link5 = esc_html($_POST['image_link5'] );
		$postal_code5 = esc_html($_POST['postal_code5'] );
		$street_address5 = esc_html($_POST['street_address5'] );
		$profile_link5 = $_POST['profile_link5'];
		//$profile_link5=rtrim($profile_link5,"/ ");
		$options['name5'] = $name5;
		$options['phone5'] = $phone5;
		$options['address5'] = $address5;
		$options['country5'] = $country5;
		$options['image_link5'] = $image_link5;
		$options['postal_code5'] = $postal_code5;
		$options['street_address5'] = $street_address5;
		$options['profile_link5'] = $profile_link5;
		$options['last_updated'] = time();
		update_option('hnp_rating_aertz', $options);

		}


		if (isset($_POST['form_submit_jameda'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name6 = esc_html($_POST['name6'] );
		$phone6 = esc_html($_POST['phone6'] );
		$address6 = esc_html($_POST['address6'] );
		$country6 = esc_html($_POST['country6'] );
		$image_link6 = esc_html($_POST['image_link6'] );
		$postal_code6 = esc_html($_POST['postal_code6'] );
		$street_address6 = esc_html($_POST['street_address6'] );
		$profile_link6 = $_POST['profile_link6'];
		//$profile_link6=rtrim($profile_link6,"/ ");
		$options['name6'] = $name6;
		$options['phone6'] = $phone6;
		$options['address6'] = $address6;
		$options['country6'] = $country6;
		$options['image_link6'] = $image_link6;
		$options['postal_code6'] = $postal_code6;
		$options['street_address6'] = $street_address6;
		$options['profile_link6'] = $profile_link6;
		$options['last_updated'] = time();
		update_option('hnp_rating_jameda', $options);

		}


		if (isset($_POST['form_submit_all'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name7 = esc_html($_POST['name7'] );
		$phone7 = esc_html($_POST['phone7'] );
		$address7 = esc_html($_POST['address7'] );
		$country7 = esc_html($_POST['country7'] );
		$image_link7 = esc_html($_POST['image_link7'] );
		$postal_code7 = esc_html($_POST['postal_code7'] );
		$street_address7 = esc_html($_POST['street_address7'] );
		$profile_link7 = $_POST['profile_link7'];
		//$profile_link7=rtrim($profile_link7,"/ ");
		$options['name7'] = $name7;
		$options['phone7'] = $phone7;
		$options['address7'] = $address7;
		$options['country7'] = $country7;
		$options['image_link7'] = $image_link7;
		$options['postal_code7'] = $postal_code7;
		$options['street_address7'] = $street_address7;
		$options['profile_link7'] = $profile_link7;
		$options['last_updated'] = time();
		update_option('hnp_rating_all', $options);

		}


		if (isset($_POST['form_submit_tripadvisor'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

			
		$name8 = esc_html($_POST['name8'] );
		$phone8 = esc_html($_POST['phone8'] );
		$address8 = esc_html($_POST['address8'] );
		$country8 = esc_html($_POST['country8'] );
		$image_link8 = esc_html($_POST['image_link8'] );
		$postal_code8 = esc_html($_POST['postal_code8'] );
		$street_address8 = esc_html($_POST['street_address8'] );
		$profile_link8 = $_POST['profile_link8'];
		//$profile_link8=rtrim($profile_link8,"/ ");
		$options['name8'] = $name8;
		$options['phone8'] = $phone8;
		$options['address8'] = $address8;
		$options['country8'] = $country8;
		$options['image_link8'] = $image_link8;
		$options['postal_code8'] = $postal_code8;
		$options['street_address8'] = $street_address8;
		$options['profile_link8'] = $profile_link8;
		$options['last_updated'] = time();
		update_option('hnp_rating_tripadvisor', $options);

		}


	if (isset($_POST['form_submit_hnp_rating_css'])){
		// These files need to be included as dependencies when on the front end.
		require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );

		echo '<br><br><h2 style="color:green">Updated Successfully</h2>';

		$css1 = $_POST['css1'] ;						
		$options['css1'] = $css1;
		update_option('css1_db_hnp_rating', $options);
	}

	$options = get_option('hnp_rating_facebook');
		if ($options != ''){
			$name = $options['name'];
			$phone = $options['phone'];
			$address = $options['address'];
			$country = $options['country'];
			$image_link = $options['image_link'];
			$postal_code = $options['postal_code'];
			$street_address = $options['street_address'];
			$profile_link = $options['profile_link'];
		}

	$options = get_option('hnp_rating_google');
		if ($options != ''){
			$name1 = $options['name1'];
			$google_address1 = $options['google_address1'];
			$phone1 = $options['phone1'];
			$address1 = $options['address1'];
			$country1 = $options['country1'];
			$image_link1 = $options['image_link1'];
			$postal_code1 = $options['postal_code1'];
			$street_address1 = $options['street_address1'];
		}

	$options = get_option('hnp_rating_amazon');
		if ($options != ''){
			$name2 = $options['name2'];
			$phone2 = $options['phone2'];
			$address2 = $options['address2'];
			$country2 = $options['country2'];
			$image_link2 = $options['image_link2'];
			$postal_code2 = $options['postal_code2'];
			$street_address2 = $options['street_address2'];
			$profile_link2 = $options['profile_link2'];
		}


	$options = get_option('hnp_rating_ebay');
		if ($options != ''){
			$name3 = $options['name3'];
			$phone3 = $options['phone3'];
			$address3 = $options['address3'];
			$country3 = $options['country3'];
			$image_link3 = $options['image_link3'];
			$postal_code3 = $options['postal_code3'];
			$street_address3 = $options['street_address3'];
			$profile_link3 = $options['profile_link3'];
		}


	$options = get_option('hnp_rating_anwalt');
		if ($options != ''){
			$name4 = $options['name4'];
			$phone4 = $options['phone4'];
			$address4 = $options['address4'];
			$country4 = $options['country4'];
			$image_link4 = $options['image_link4'];
			$postal_code4 = $options['postal_code4'];
			$street_address4 = $options['street_address4'];
			$profile_link4 = $options['profile_link4'];
		}



	$options = get_option('hnp_rating_aertz');
		if ($options != ''){
			$name5 = $options['name5'];
			$phone5 = $options['phone5'];
			$address5 = $options['address5'];
			$country5 = $options['country5'];
			$image_link5 = $options['image_link5'];
			$postal_code5 = $options['postal_code5'];
			$street_address5 = $options['street_address5'];
			$profile_link5 = $options['profile_link5'];
		}



	$options = get_option('hnp_rating_jameda');
		if ($options != ''){
			$name6 = $options['name6'];
			$phone6 = $options['phone6'];
			$address6 = $options['address6'];
			$country6 = $options['country6'];
			$image_link6 = $options['image_link6'];
			$postal_code6 = $options['postal_code6'];
			$street_address6 = $options['street_address6'];
			$profile_link6 = $options['profile_link6'];
		}



	$options = get_option('hnp_rating_all');
		if ($options != ''){
			$name7 = $options['name7'];
			$phone7 = $options['phone7'];
			$address7 = $options['address7'];
			$country7 = $options['country7'];
			$image_link7 = $options['image_link7'];
			$postal_code7 = $options['postal_code7'];
			$street_address7 = $options['street_address7'];
			$profile_link7 = $options['profile_link7'];
		}




	$options = get_option('hnp_rating_tripadvisor');
		if ($options != ''){
			$name8 = $options['name8'];
			$phone8 = $options['phone8'];
			$address8 = $options['address8'];
			$country8 = $options['country8'];
			$image_link8 = $options['image_link8'];
			$postal_code8 = $options['postal_code8'];
			$street_address8 = $options['street_address8'];
			$profile_link8 = $options['profile_link8'];
		}



	$options = get_option('css1_db_hnp_rating');
		if ($options != ''){
			$css1 = $options['css1'];
		}

	require('inc/options-page-wrapper.php');
	}


	


?>
<?php

function hnp_rating_header_script(){?> 

<style type="text/css">
<?php
$options = get_option('css1_db_hnp_rating');
		if ($options != ''){
			$css1 = $options['css1'];
		}
		ob_start();
if($options != '') {



echo $css1;
 }else{ ?>
	.prof_reviews{color:black;}   
.prof_reviews a{color:black;}
.prof_ratings{color:black;}
<?php	} 
		
?>
</style>
<?php }


add_action('wp_head','hnp_rating_header_script');



ob_start();
	function hnp_rating_facebook_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_facebook');
		if ($options != ''){
			$name = $options['name'];
			$phone = $options['phone'];
			$address = $options['address'];
			$country = $options['country'];
			$image_link = $options['image_link'];
			$street_address = $options['street_address'];
			$postal_code = $options['postal_code'];
			$profile_link = $options['profile_link'];
		}
		ob_start();
		if($profile_link!=''){
			require ('inc/front-end-facebook.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-facebook-bewertung', 'hnp_rating_facebook_shortcode' );


ob_start();
	function hnp_rating_google_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_google');
		if ($options != ''){
			$name1 = $options['name1'];
			$google_address1 = $options['google_address1'];
			$phone1 = $options['phone1'];
			$address1 = $options['address1'];
			$country1 = $options['country1'];
			$image_link1 = $options['image_link1'];
			$postal_code1 = $options['postal_code1'];
			$street_address1 = $options['street_address1'];
		}
		ob_start();
		if($address1!=''){
			require ('inc/front-end-google.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-google-bewertung', 'hnp_rating_google_shortcode' );


ob_start();
	function hnp_rating_amazon_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_amazon');
		if ($options != ''){
			$name2 = $options['name2'];
			$phone2 = $options['phone2'];
			$address2 = $options['address2'];
			$country2 = $options['country2'];
			$image_link2 = $options['image_link2'];
			$postal_code2 = $options['postal_code2'];
			$street_address2 = $options['street_address2'];
			$profile_link2 = $options['profile_link2'];
		}
		ob_start();
		if($profile_link2!=''){
			require ('inc/front-end-amazon.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-amazon-bewertung', 'hnp_rating_amazon_shortcode' );


ob_start();
	function hnp_rating_ebay_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_ebay');
		if ($options != ''){
			$name3 = $options['name3'];
			$phone3 = $options['phone3'];
			$address3 = $options['address3'];
			$country3 = $options['country3'];
			$image_link3 = $options['image_link3'];
			$postal_code3 = $options['postal_code3'];
			$street_address3 = $options['street_address3'];
			$profile_link3 = $options['profile_link3'];
		}
		ob_start();
		if($profile_link3!=''){
			require ('inc/front-end-ebay.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-ebay-bewertung', 'hnp_rating_ebay_shortcode' );


ob_start();
	function hnp_rating_anwalt_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_anwalt');
		if ($options != ''){
			$name4 = $options['name4'];
			$phone4 = $options['phone4'];
			$address4 = $options['address4'];
			$country4 = $options['country4'];
			$image_link4 = $options['image_link4'];
			$postal_code4 = $options['postal_code4'];
			$street_address4 = $options['street_address4'];
			$profile_link4 = $options['profile_link4'];
		}
		ob_start();
		if($profile_link4!=''){
			require ('inc/front-end-anwalt.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-anwalt-bewertung', 'hnp_rating_anwalt_shortcode' );


ob_start();
	function hnp_rating_aertz_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_aertz');
		if ($options != ''){
			$name5 = $options['name5'];
			$phone5 = $options['phone5'];
			$address5 = $options['address5'];
			$country5 = $options['country5'];
			$image_link5 = $options['image_link5'];
			$postal_code5 = $options['postal_code5'];
			$street_address5 = $options['street_address5'];
			$profile_link5 = $options['profile_link5'];
		}
		ob_start();
		if($profile_link5!=''){
			require ('inc/front-end-aertz.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-aerzte-bewertung', 'hnp_rating_aertz_shortcode' );



ob_start();
	function hnp_rating_jameda_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_jameda');
		if ($options != ''){
			$name6 = $options['name6'];
			$phone6 = $options['phone6'];
			$address6 = $options['address6'];
			$country6 = $options['country6'];
			$image_link6 = $options['image_link6'];
			$postal_code6 = $options['postal_code6'];
			$street_address6 = $options['street_address6'];
			$profile_link6 = $options['profile_link6'];
		}
		ob_start();
		if($profile_link6!=''){
			require ('inc/front-end-jameda.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-jameda-bewertung', 'hnp_rating_jameda_shortcode' );


ob_start();
	function hnp_rating_tripadvisor_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_tripadvisor');
		if ($options != ''){
			$name8 = $options['name8'];
			$phone8 = $options['phone8'];
			$address8 = $options['address8'];
			$country8 = $options['country8'];
			$image_link8 = $options['image_link8'];
			$postal_code8 = $options['postal_code8'];
			$street_address8 = $options['street_address8'];
			$profile_link8 = $options['profile_link8'];
		}
		ob_start();
		if($profile_link8!=''){
			require ('inc/front-end-tripadvisor.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-tripadvisor-bewertung', 'hnp_rating_tripadvisor_shortcode' );



ob_start();
	function hnp_rating_all_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_all');
		if ($options != ''){
			$name7 = $options['name7'];
			$phone7 = $options['phone7'];
			$address7 = $options['address7'];
			$country7 = $options['country7'];
			$image_link7 = $options['image_link7'];
			$postal_code7 = $options['postal_code7'];
			$street_address7 = $options['street_address7'];
			$profile_link7 = $options['profile_link7'];
		}
		ob_start();
		if($profile_link7!=''){
			$options = get_option('hnp_rating_facebook');
			$profile_link = $options['profile_link'];

			$options = get_option('hnp_rating_google');
			$name1 = $options['name1'];
			$google_address1 = $options['google_address1'];

			$options = get_option('hnp_rating_amazon');
			$profile_link2 = $options['profile_link2'];

			$options = get_option('hnp_rating_ebay');
			$profile_link3 = $options['profile_link3'];

			$options = get_option('hnp_rating_anwalt');
			$profile_link4 = $options['profile_link4'];

			$options = get_option('hnp_rating_aertz');
			$profile_link5 = $options['profile_link5'];

			$options = get_option('hnp_rating_jameda');
			$profile_link6 = $options['profile_link6'];

			$options = get_option('hnp_rating_tripadvisor');
			$profile_link8 = $options['profile_link8'];

			require ('inc/front-end-rating-all.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-rating-all', 'hnp_rating_all_shortcode' );




ob_start();
	function hnp_rating_page_shortcode($atts, $content = null){
		global $post;
		$options = get_option('hnp_rating_all');
		if ($options != ''){
			$name7 = $options['name7'];
			$phone7 = $options['phone7'];
			$address7 = $options['address7'];
			$country7 = $options['country7'];
			$image_link7 = $options['image_link7'];
			$postal_code7 = $options['postal_code7'];
			$street_address7 = $options['street_address7'];
			$profile_link7 = $options['profile_link7'];
		}
		ob_start();
		if($profile_link7!=''){
			$options = get_option('hnp_rating_facebook');
			$profile_link = $options['profile_link'];

			$options = get_option('hnp_rating_google');
			$name1 = $options['name1'];
			$google_address1 = $options['google_address1'];

			$options = get_option('hnp_rating_amazon');
			$profile_link2 = $options['profile_link2'];

			$options = get_option('hnp_rating_ebay');
			$profile_link3 = $options['profile_link3'];

			$options = get_option('hnp_rating_anwalt');
			$profile_link4 = $options['profile_link4'];

			$options = get_option('hnp_rating_aertz');
			$profile_link5 = $options['profile_link5'];

			$options = get_option('hnp_rating_jameda');
			$profile_link6 = $options['profile_link6'];

			$options = get_option('hnp_rating_tripadvisor');
			$profile_link8 = $options['profile_link8'];

			require ('inc/front-end-hnp-rating.php');
		}
		$content = ob_get_clean();
		return $content;
	}
	add_shortcode('hnp-rating', 'hnp_rating_page_shortcode' );





	?>
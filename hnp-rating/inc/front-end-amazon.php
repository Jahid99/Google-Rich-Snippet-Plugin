<?php

//header('content-type:text/plain');

global $full_content;

if (!function_exists('get_web_page_ratings_amazon'))   {

function get_web_page_ratings_amazon( $url )
{
    $options = array(
        CURLOPT_FAILONERROR => true,     // return web page
        CURLOPT_FOLLOWLOCATION         => true,    // don't return headers
        CURLOPT_RETURNTRANSFER => true,     // stop after 10 redirects
        CURLOPT_SSL_VERIFYHOST => false,     // stop after 10 redirects
        CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    global $full_content;
    $full_content = $content;
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;


 $start = strpos($content, '<span class="a-icon-alt">')+25;

$end = strpos($content, '</span>', $start);

$length = $end-$start;

$content = substr($content, $start, $length);

    return $content;
}

}
//echo $profile_link2;

$string = trim(get_web_page_ratings_amazon($profile_link2));


$string = explode(" ",$string);

$amazon_ratings = $string[0];

$start = strpos($full_content, '<a class="a-link-normal feedback-detail-description" href="#">')+62;

$end = strpos($full_content, '</a>', $start);

$length = $end-$start;

$string = trim(substr($full_content, $start, $length));

$string = explode("(",$string);

$amazon_reviews = (int) filter_var($string[1], FILTER_SANITIZE_NUMBER_INT);


echo "<p class='prof_reviews'>".$amazon_reviews." Bewertungen auf <a href='".$profile_link2."' target='_blank'> amazon.com</a></p>";

?>

<p class="prof_ratings"><?php echo $amazon_ratings; ?> von 5 Sternen </p>


<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address2; ?>",
      "postalCode":"<?php echo $postal_code2; ?>",
      "addressLocality": "<?php echo $address2; ?>",
      "addressCountry": "<?php echo $country2; ?>"
    },
    "name": "<?php echo $name2; ?>",
    "telephone": "<?php echo $phone2 ; ?>",
    "image": "<?php echo $image_link2; ?>",
    "url": "<?php echo $profile_link2; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo $amazon_ratings; ?>",
      "ratingCount": "<?php echo $amazon_reviews; ?>"
    }
    }
  </script>
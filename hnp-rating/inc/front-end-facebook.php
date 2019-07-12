<?php

//header('content-type:text/plain');

if (!function_exists('get_web_page_ratings_facebook'))   {

function get_web_page_ratings_facebook( $url )
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "spider", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
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

    $start = strpos($content, '"ratingValue":')+14;

   $end = strpos($content, ',"ratingCount"', $start);


$length = $end-$start;

$content = substr($content, $start, $length);

    return $content;
}

}

$facebook_ratings = trim(get_web_page_ratings_facebook($profile_link));



if (!function_exists('get_web_page_reviews_facebook'))   {

function get_web_page_reviews_facebook( $url )
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "spider", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
        CURLOPT_TIMEOUT        => 120,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
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


    $start = strpos($content, '"ratingCount":')+14;

   $end = strpos($content, '}}', $start);

   $length = $end-$start;

   $content = substr($content, $start, $length);

       return $content;
}

}

$facebook_reviews = trim(get_web_page_reviews_facebook($profile_link));

 echo "<p class='prof_reviews'>".$facebook_reviews." Bewertungen auf <a href='".$profile_link."' target='_blank'> facebook.com</a></p>";

?>

<p class="prof_ratings"><?php echo $facebook_ratings; ?> von 5 Sternen </p>


<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address; ?>",
      "postalCode":"<?php echo $postal_code; ?>",
      "addressLocality": "<?php echo $address; ?>",
      "addressCountry": "<?php echo $country; ?>"
    },
    "name": "<?php echo $name; ?>",
    "telephone": "<?php echo $phone ; ?>",
    "image": "<?php echo $image_link; ?>",
    "url": "<?php echo $profile_link; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo $facebook_ratings; ?>",
      "ratingCount": "<?php echo $facebook_reviews; ?>"
    }
    }
  </script>

<?php

//header('content-type:text/plain');

if (!function_exists('get_web_page_ratings_google'))   {

function get_web_page_ratings_google( $url )
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
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Language: en']);
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


 $start = strpos($content, 'reviews\\');

$end = strpos($content, 'reviews', $start)+200;

$length = $end-$start;

$content = substr($content, $start, $length);

    return $content;
}

}

$name = $name1;

$address=$google_address1;

//echo $google_address1;exit;

$name = str_replace(' ', '+', $name);

$address = str_replace(' ', '+', $address);

$link = $name.',+'.$address;

$string = trim(get_web_page_ratings_google('https://www.google.com/maps?gl=us&q='.$link));

$prof_link = 'https://www.google.com/maps?gl=us&q='.$link;

$string = explode("]",$string);




$string = explode(",",$string[1]);



$google_ratings = round($string[4],2);

$google_reviews = $string[5];

 echo "<p class='prof_reviews'>".$google_reviews." Bewertungen auf <a href='".$prof_link."' target='_blank'> google.com</a></p>";

?>

<p class="prof_ratings"><?php echo $google_ratings; ?> von 5 Sternen </p>


<script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address1; ?>",
      "postalCode":"<?php echo $postal_code1; ?>",
      "addressLocality": "<?php echo $address1; ?>",
      "addressCountry": "<?php echo $country1; ?>"
    },
    "name": "<?php echo $name1; ?>",
    "telephone": "<?php echo $phone1 ; ?>",
    "image": "<?php echo $image_link1; ?>",
    "url": "<?php echo $prof_link; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo $google_ratings; ?>",
      "ratingCount": "<?php echo $google_reviews; ?>"
    }
    }
  </script>
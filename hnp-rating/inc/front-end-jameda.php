<?php
// url
//header('content-type:text/plain');

if (!function_exists('get_web_page_reviews_jameda'))   {

function get_web_page_reviews_jameda( $url )
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
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;


     $start = strpos($content, '4;">');

$end = strpos($content, '</span>', $start);

$length = $end-$start;

$content = substr($content, $start, $length);

    return $content;
}

}

$string = get_web_page_reviews_jameda($profile_link6);
 $string = str_replace('4', ' ', $string);
 $string = str_replace(';', ' ', $string);
 $string = str_replace('"', ' ', $string);
 $string = str_replace('>', ' ', $string);
  $reviews = trim($string);

echo "<p class='prof_reviews'>".$reviews." Bewertungen auf <a href='".$profile_link6."' target='_blank'> jameda.de</a></p>";

?>

<?php
// url
//header('content-type:text/plain');

if (!function_exists('get_web_page_ratings_jameda'))   {


function get_web_page_ratings_jameda( $url )
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
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;


 $start = strpos($content, 'l">');

$end = strpos($content, '</div>', $start);

$length = $end-$start;

$content = substr($content, $start, $length);

    return $content;
}

}

$string = get_web_page_ratings_jameda($profile_link6);


$length = strlen($string);

$flag='';

    for($i=0;$i<$length;$i++){

        if($string[$i]=='l' && $string[$i+1]=='"' && $string[$i+2]=='>' ){
            $flag .= $string[$i+3].'.'.$string[$i+5];
            
        }

    }
    $flag = (float)$flag;
    
  

    
    
    $reverseRating = 7.0 - $flag;

    $ratings = ($reverseRating - 1.0) / 5.0 * 4.0 + 1.0;






?>


 <p class="prof_ratings"><?php echo sprintf('%.1f',$ratings) ; ?> von 5 Sternen </p>



  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address6; ?>",
      "postalCode":"<?php echo $postal_code6; ?>",
      "addressLocality": "<?php echo $address6; ?>",
      "addressCountry": "<?php echo $country6; ?>"
    },
    "name": "<?php echo $name6; ?>",
    "telephone": "<?php echo $phone6 ; ?>",
    "image": "<?php echo $image_link6; ?>",
    "url": "<?php echo $profile_link6; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo sprintf('%.1f',$ratings) ; ?>",
      "ratingCount": "<?php echo $reviews ; ?>"
    }
    }
  </script>
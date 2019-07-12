<?php

//facebook

$total_ratings = 0 ;

$total_reviews = 0 ;

if(isset($profile_link)){

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

?>


<?php

$total_ratings+=(float)$facebook_ratings;
$total_reviews+=(float)$facebook_reviews;

}

//google

if(isset($name1)){

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

$name = str_replace(' ', '+', $name);

$address = str_replace(' ', '+', $address);

$link = $name.',+'.$address;

$string = trim(get_web_page_ratings_google('https://www.google.com/maps?gl=us&q='.$link));

$prof_link = 'https://www.google.com/maps?gl=us&q='.$link;

$string = explode("]",$string);


$string = explode(",",$string[1]);

$google_ratings = round($string[4],2);

$google_reviews = $string[5];

?>




<?php

$total_ratings+=(float)$google_ratings;
$total_reviews+=(float)$google_reviews;

}

//amazon

if(isset($profile_link2)){

global $full_content;

if (!function_exists('get_web_page_ratings_amazons'))   {

function get_web_page_ratings_amazons( $url )
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

$string = trim(get_web_page_ratings_amazons($profile_link2));


$string = explode(" ",$string);

$amazon_ratings = $string[0];

$start = strpos($full_content, '<a class="a-link-normal feedback-detail-description" href="#">')+62;

$end = strpos($full_content, '</a>', $start);

$length = $end-$start;

$string = trim(substr($full_content, $start, $length));

$string = explode("(",$string);

$amazon_reviews = (int) filter_var($string[1], FILTER_SANITIZE_NUMBER_INT);


?>



<?php

$total_ratings+=(float)$amazon_ratings;
$total_reviews+=(float)$amazon_reviews;

}

//ebay

if(isset($profile_link3)){

$appID = 'samsharp-5067-49a2-942d-2cdab859d2f5';





$callName = 'GetSingleItem';

$compatibilityLevel = 647;

$endpoint = "http://open.api.ebay.com/shopping";



$headers[] = "X-EBAY-API-CALL-NAME: $callName";

$headers[] = "X-EBAY-API-APP-ID: $appID";

$headers[] = "X-EBAY-API-VERSION: $compatibilityLevel";

$headers[] = "X-EBAY-API-REQUEST-ENCODING: XML";

$headers[] = "X-EBAY-API-RESPONSE-ENCODING: XML";

$headers[] = "X-EBAY-API-SITE-ID: 0";

$headers[] = "Content-Type: text/xml";


if (!function_exists('curl_download_ratings_ebay'))   {

function curl_download_ratings_ebay($Url){

 if (!function_exists('curl_init')){

 die('cURL is not installed. Install and try again.');

 }

 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, $Url);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $output = curl_exec($ch);

 curl_close($ch);

 $start = strpos($output, '<div id="dsr" class="dsr fl col-3">');

$end = strpos($output, '</div><div class="clearfloat"></div></div>', $start);

$length = $end-$start;

$output = substr($output, $start, $length);



 return $output;

}

}
$string = curl_download_ratings_ebay($profile_link3);

$length = strlen($string);

$flag='';

  for($i=0;$i<$length;$i++){

    if($string[$i]=='t' && $string[$i+1]=='i' && $string[$i+2]=='t' && $string[$i+3]=='l' && $string[$i+4]=='e' && $string[$i+5]=='=' && $string[$i+6]=='"' ){
      $flag .= $string[$i+7].$string[$i+8].$string[$i+9].'|';

    }

  }

  $flag = str_replace(" /","",$flag);

  $flag = array_map('floatval', explode('|', $flag));

  $flag = array_sum($flag)/20;




    $reviews = '';

  for($i=0;$i<$length;$i++){

    if($string[$i]=='f' && $string[$i+1]=='l' && $string[$i+2]=='"' && $string[$i+3]=='>' ){
      $reviews .= $string[$i+4].$string[$i+5].$string[$i+7].$string[$i+8].$string[$i+9].'|';

    }

  }

  $reviews = array_map('intval', explode('|', $reviews));



  $reviews = array_sum($reviews)/4;


  $reviews = (int)$reviews;


?>



<?php

$total_ratings+=(float)sprintf('%.2f',$flag);
$total_reviews+=(float)$reviews;

}
//anwalt

if(isset($profile_link4)){

  if (!function_exists('curl_download_anwalt'))   {
  function curl_download_anwalt($Url){

    if (!function_exists('curl_init')){

    die('cURL is not installed. Install and try again.');

    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $Url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Language: en']);

    $output = curl_exec($ch);

    curl_close($ch);

    $start = strpos($output, '"ratingCount": "')+16;

    $end = strpos($output, '"', $start);

    $length = $end-$start;

    $output = substr($output, $start, $length);

    return $output;

   }
}


   $val = curl_download_anwalt($profile_link4);

   ?>


 <?php

 if (!function_exists('curl_download_anwalt2'))   {
  function curl_download_anwalt2($Url){

    if (!function_exists('curl_init')){

    die('cURL is not installed. Install and try again.');

    header('content-type:text/plain');

    }

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $Url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept-Language: en']);

    $output = curl_exec($ch);

    curl_close($ch);

    $start = strpos($output, '"ratingValue": "')+16;

    $end = strpos($output, '",', $start);

    $length = $end-$start;

    $output = substr($output, $start, $length);

    return $output;

   }
}


   $ratings = curl_download_anwalt2($profile_link4);



   ?>





<?php

$total_ratings+=(float)$ratings;
$total_reviews+=(float)$val;

}
//aerzte

if(isset($profile_link5)){

function curl_download_aerzte2($Url){

 if (!function_exists('curl_init')){

 die('cURL is not installed. Install and try again.');

 }

 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, $Url);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $output = curl_exec($ch);

 curl_close($ch);

 $start = strpos($output, "<div class='rating-box rating-tool-tip'>");

$end = strpos($output, '<span class="recommend-scroll">', $start);

$length = $end-$start;

$output = substr($output, $start, $length);



 return $output;

}


  $string = curl_download_aerzte2($profile_link5);
   $length = strlen($string);

$flag='';

  for($i=0;$i<$length;$i++){

    if($string[$i]=='<' && $string[$i+1]=='p' && $string[$i+2]=='>' ){
      $flag .= $string[$i+4].$string[$i+5].$string[$i+6].$string[$i+7];

    }

  }

$ratings = trim($flag);



  $flag='';


  for($i=0;$i<$length;$i++){

    if($string[$i]=='e' && $string[$i+1]=='=' && $string[$i+2]=='\'' ){
      $flag .= $string[$i+3].$string[$i+4].$string[$i+5];

    }

  }

$reviews = trim($flag);


?>




<?php

$total_ratings+=(float)sprintf('%.1f',$reviews);
$total_reviews+=(float)$ratings;

}

//jameda

if(isset($profile_link6)){

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



?>

<?php

//jameda

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





<?php

    $total_ratings+=(float)sprintf('%.1f',$ratings);
    $total_reviews+=(float)sprintf('%.1f',$reviews);

}

 ?>



<?php

//tripadvisor

if(isset($profile_link8)){

if (!function_exists('curl_download_tripadvisor'))   {

function curl_download_tripadvisor($Url){

 if (!function_exists('curl_init')){

 die('cURL is not installed. Install and try again.');

 }

 $ch = curl_init();

 curl_setopt($ch, CURLOPT_URL, $Url);

 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 $output = curl_exec($ch);

 curl_close($ch);

 $start = strpos($output, '<div class="rs rating">');

$end = strpos($output, '</div>', $start);

$length = $end-$start;

$output = substr($output, $start, $length);



 return $output;

}
    }




    $string = curl_download_tripadvisor($profile_link8);
     $length = strlen($string);

$flag='';

    for($i=0;$i<$length;$i++){

        if($string[$i]=='a' && $string[$i+1]=='l' && $string[$i+2]=='t' ){
            $flag .= $string[$i+5].$string[$i+6].$string[$i+7];

        }

    }
    $flag = explode(" ",$flag);

    $ratings = $flag[0];



//     $ratings1 = trim($flag);

    $flag='';


    for($i=0;$i<$length;$i++){

        if($string[$i]=='u' && $string[$i+1]=='n' && $string[$i+2]=='t' ){
            $flag .= $string[$i+5].$string[$i+6].$string[$i+7];

        }

    }

    $reviews = (int) filter_var($flag, FILTER_SANITIZE_NUMBER_INT);

    $total_ratings+=(float)sprintf('%.1f',$ratings);
    $total_reviews+=(float)sprintf('%.1f',$reviews);

}

?>









<?php



$i = 0;

if(isset($profile_link)){
    $i++;
}


if(isset($name1)){
    $i++;
}


if(isset($profile_link2)){
    $i++;
}


if(isset($profile_link3)){
    $i++;
}


if(isset($profile_link4)){
    $i++;
}

if(isset($profile_link5)){
    $i++;
}

if(isset($profile_link6)){
    $i++;
}

if(isset($profile_link8)){
    $i++;
}

   $total_ratings = (round($total_ratings/$i,2));


    echo "<p class='prof_reviews'>".$total_reviews." Bewertungen im <a href='".site_url().'/hnp-rating/'."' target='_blank'>Gesamtbewertungen</a></p>";

 ?>

 <p class="prof_ratings"><?php echo $total_ratings ; ?> von 5 Sternen </p>


  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $street_address7; ?>",
      "postalCode":"<?php echo $postal_code7; ?>",
      "addressLocality": "<?php echo $address7; ?>",
      "addressCountry": "<?php echo $country7; ?>"
    },
    "name": "<?php echo $name7; ?>",
    "telephone": "<?php echo $phone7 ; ?>",
    "image": "<?php echo $image_link7; ?>",
    "url": "<?php echo $profile_link7; ?>"
    ,
    "aggregateRating": {
      "@type": "AggregateRating",
      "bestRating": "5",
      "worstRating": "1",
      "ratingValue": "<?php echo $total_ratings ; ?>",
      "ratingCount": "<?php echo $total_reviews ; ?>"
    }
    }
  </script>

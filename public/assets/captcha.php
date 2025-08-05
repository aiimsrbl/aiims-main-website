<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

$captcha = $_REQUEST['captcha']??'';
$type = $_REQUEST['type']??'';


function writeCaptcha($code)
{   

    $DB_HOST        =   '127.0.0.1';
    $DB_DATABASE    =   'aiimsb5e_webnewlive';
    $DB_USERNAME    =   'aiimsb5e_webnewlive';
    $DB_PASSWORD    =   'webnewlive123';


    $conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
    
    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql    = "SELECT code FROM captcha_codes where code = $code";
    $result = $conn->query($sql);

    $date = date('Y-m-d H:i:s');

    if($result->num_rows > 0)
    {   
        $sql = "UPDATE captcha_codes SET code=$code,updated_at='$date' WHERE code=$code";
        $conn->query($sql);
    }
    else
    {
        $sql = "INSERT INTO captcha_codes (code,created_at)
        VALUES ($code,'$date')";
        $conn->query($sql);
    }

    $conn->close();
}

if($type == 'create'){
    writeCaptcha($captcha);
}
else
{    
    $image = imagecreate(60, 20); //create blank image (width, height)

    $bgcolor = imagecolorallocate($image, 56, 138, 130); //add background color with RGB.

    $textcolor = imagecolorallocate($image, 255, 255, 255); //add text/code color with RGB.

    $code = $captcha; //create a random number between 1000 and 9999

    imagestring($image, 10, 4, 3, $code, $textcolor); //create image with all the settings above.

    header ("Content-type: image/png"); // define image type

    imagepng($image); //display image as PNG
}

?>
<?php
    // Change this to false to allow the iTunes API to work on other devices.
    // Changing this is not recommended, but may be fine in some rare cases.
    $safe = true;
    // Do not edit below this line.
    $ver = "1.0.0";
    header('Access-Control-Allow-Origin: *'); 
    function fixUrl($url) {
        $url = rawurldecode($url);
        return $url;
    }

    if(isset($_GET["dl"])) {
        $dl = fixUrl(htmlspecialchars($_GET["dl"]));
    } else {
        $dl = "";
    }

    function deJson($url) {

        return json_decode(file_get_contents($url), true);
    }

    if(strpos($dl, "duckduckgo.com") ==! false) {
        header('Content-Type: application/json');
        echo json_encode(deJson(str_replace(' ' ,'%20',$dl)), JSON_PRETTY_PRINT);
    } else {
        if(($_SERVER['SERVER_ADDR'] != $_SERVER['REMOTE_ADDR']) or $safe != true) {
            // Disable access to iTunes endpoint from remote devices.
            echo "<title>Error 403</title><center style='margin-top:36vh;font-family:\"PT Sans Caption\",Helvetica,sans-serif'><h1>error 403</h1><b>For security purposes, Casa's full API cannot be accessed off-device. To change this, please set <code>$safe = true;</code> to <code>$safe = false;</code>.</b><br><p style='color:grey;'>Casa ".$ver."</p></center>";
        }
    }

?>

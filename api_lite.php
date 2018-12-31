<?php
    // Do not edit below this line.
    $ver = "1.0.1";
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
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(deJson(str_replace(' ' ,'%20',$dl)), JSON_PRETTY_PRINT);
    } else {
        echo "<title>Error 404</title><center style='margin-top:36vh;font-family:\"PT Sans Caption\",Helvetica,sans-serif'><h1>error 404</h1><b>The endpoint you were trying to find was not found.</b><br><p style='color:grey;'>Casa ".$ver."</p></center>";
    }

?>
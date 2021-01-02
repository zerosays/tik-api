<?php

$allowedIps = ['0.0.0.0'];
$userIp = $_SERVER['REMOTE_ADDR'];

if (!in_array($userIp, $allowedIps)) {
    exit('Unauthorized!');
}
require('../routeros_api.class.php');

$API = new RouterosAPI();

    $API->debug = false;
    
     $clientID="99";
     
     if ($API->connect('111.111.111.111', 'ADMIN', 'PASSWORD')) {
             $wofBIT=$API->comm("/ppp/active/getall",
                    array(
                           ".proplist"=> ".id",
                                 "?name" => $clientID,
                              ));
                              
            $API->comm("/ppp/active/remove",
                  array(
                           ".id" => $wofBIT[0][".id"],
                           )
                  );
                  
        $API->disconnect();

}

?>

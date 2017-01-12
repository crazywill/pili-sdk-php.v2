<?php

require(join(DIRECTORY_SEPARATOR, array(dirname(dirname(__FILE__)), 'lib', 'Pili_v2.php')));

$ak = "Tn8WCjE_6SU7q8CO3-BD-yF4R4IZbHBHeL8Q9t";
$sk = "vLZNvZDojo1F-bYOjOqQ43-NYqlKAej0e9OweInh";

$mac = new Qiniu\Pili\Mac($ak, $sk);
$client = new Qiniu\Pili\RoomClient($mac);

try {
    $resp = $client->createRoom("901", "testroom");
    print_r($resp);

    $resp = $client->getRoom("testroom");
    print_r($resp);

    $resp = $client->deleteRoom("testroom");
    print_r($resp);

    //鉴权的有效时间: 1个小时.
    $resp = $client->roomToken("testroom", "123", 'admin', (time()+3600)*1000*1000000);
    print_r($resp);
} catch (\Exception $e) {
    echo "Error:", $e, "\n";
}

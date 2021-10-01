<?php
/**
 * @author Amir Sanni <amirsanni@gmail.com>
 * @date 4th November 2019
 */

class Server
{
    public function index()
    {
        $servers = $this->getIceServers();

        header('Content-Type: Application/json');
        
        echo json_encode(json_decode($servers)->v->iceServers);
    }


    private function getIceServers()
    {
        // PHP Get ICE STUN and TURN list

        $data = array( "format" => "urls" );
        $data_json = json_encode($data);

        $curl = curl_init();
        curl_setopt_array( $curl, array (
            CURLOPT_HTTPHEADER => array("Content-Type: application/json","Content-Length: " . strlen($data_json)),
            CURLOPT_POSTFIELDS => $data_json,
            CURLOPT_URL => "https://global.xirsys.net/_turn/MyFirstApp",
            CURLOPT_USERPWD => "shakir:a6dbbe4a-2142-11ec-ae76-0242ac150003",
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_RETURNTRANSFER => 1
        ));

        $res = curl_exec($curl);
        if(curl_error($curl)){
            echo "Curl error: " . curl_error($curl);
        };
        curl_close($curl);
        
        return $res;
    }
}


$server = new Server;

$server->index();

<?php

/**
 * Description of server
 *
 * @author Amir <amirsanni@gmail.com>
 * @date 23-Dec-2016
 */

require 'vendor/autoload.php';

use Amir\Comm;
use Ratchet\App;

//set an array of origins allowed to connect to this server
$allowed_origins = ['shakir12345-dot.github.io/screen-share', 'shakir12345-dot.github.io/screen-share'];

// Run the server application through the WebSocket protocol on port 8080
$app = new App('shakir12345-dot.github.io/screen-share', 8080, 'shakir12345-dot.github.io/screen-share');//App(hostname, port, 'whoCanConnectIP', '')

//create socket routes
//route(uri, classInstance, arrOfAllowedOrigins)
$app->route('/comm', new Comm, $allowed_origins);

//run websocket
$app->run();

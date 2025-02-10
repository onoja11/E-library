<?php

// Load the Composer autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Get the Laravel application instance
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Use the HTTP kernel to handle the incoming request
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Capture the request and handle it
$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);

// Send the response back
$response->send();

// Terminate the request-response cycle
$kernel->terminate($request, $response);

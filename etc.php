<?php

use Dotenv\Dotenv;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;

define('SITE_ROOT', realpath(dirname(__FILE__)));

require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__)->safeLoad();


function config($key)
{
    return $_ENV[$key];
}
function request($file)
{
    try {
        $http = new GuzzleHttp\Client();
        // print_r($_FILES['file']);
        // exit;
        $path = "uploads/{$_FILES['file']['name']}";
        move_uploaded_file($_FILES['file']['tmp_name'], $path);
        $request = $http->request('POST', 'https://songdetector.dbapi.org/scan', [
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen($path, 'r'),
                ]
            ],
            'headers' => [
                'accept' => 'application/json',
                'X-Api-Key' => config('DBAPI_API_KEY')
            ],
        ]);
        $data = $request->getBody();
        $data = json_decode($data)->messages;
        // print_r($data);
        // exit;
        $response = "Available song(s): ";
        if (is_array($data)) {
            foreach ($data as $key) {
                $response .= "{$key->title},";
            }
        } else {
            $response = "Failed for scanning song in this file. Try again later.";
        }

        return rtrim($response, ",");
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}
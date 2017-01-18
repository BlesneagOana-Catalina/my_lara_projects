<?php

use GuzzleHttp\Psr7;
Route::get('home', function(){
    $client = new GuzzleHttp\Client();
	$response = $client->get('{{your_ip}}:3000/api/users', [
		'auth' => [
			'oana', 
			'parola'
			]
	]);
$data=$response->getBody();
$stream =Psr7\stream_for($data); 
echo $stream;
// string data
echo $stream->read(3);
// str
echo "-------------------------------------------------------------------------------------------------";
echo $stream->getContents();
// ing data
echo "-------------------------------------------------------------------------------------------------";
var_export($stream->eof());
// true
echo "-------------------------------------------------------------------------------------------------";
var_export($stream->tell());
// 11
echo "-------------------------------------------------------------------------------------------------";
	
});
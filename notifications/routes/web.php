<?php 
use Illuminate\Notifications\Messages\NexmoMessage as NexmoMessage;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/nexmo', function(NexmoMessage $nexmo){
	$client = new Nexmo\Client(new Nexmo\Client\Credentials\Basic('9c9f4332', '9759e39b591a2f6f')); 
	$message = $client->message()->send([
    'to' => '40748105921',
    'from' => '40748105921',
    'text' => 'Test message from the Nexmo PHP Client'
]);	
	echo "Sent message to " . $message['to'] . ". Balance is now " . $message['remaining-balance'] . PHP_EOL;
	
});

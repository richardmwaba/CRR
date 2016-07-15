<?
require(dirname(__FILE__).'/../vendor/autoload.php');

$pusher = new Pusher('cd62d59ac54f2586fa5c', 'c850d94991581f71f48f', '220049');

// trigger on my_channel' an event called 'my_event' with this payload:

$data['message'] = 'hello world';
$pusher->trigger('my_channel', 'my_event', $data);


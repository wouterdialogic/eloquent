<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Gorder\Order as Order;

//Capsule::schema()->create('orders', function ($table) {
//    $table->increments('id');
//    $table->string('title');	
//    //
//});

$mysql = new Order;
$mysql->connection = "default";
$mySqlFirst = $mysql->first();

$sqlite = new Order;
$sqlite->connection = "sqlite";
$sqliteFirst = $sqlite->first();

echo "<br>mysql connection: ".$mysql->connection."<br>";
echo "<br>sqlite connection: ".$sqlite->connection."<br>";
echo "<pre";
dd($sqliteFirst->toArray());
// echo "<br>timestamps: ".Order::$timestamps;


//for ($i = 0; $i < 2; $i++) {
//	Gorder\Order::create(['title' => 'post nr'.$i]);
//}


$order = Order::first();
$order = Order::find(1)->get();
$order = Order::where('id', '=', 2)->get();
$order = Order::all();
$order = Order::where('id', '=', "1")->first();
//$order = Order::findOrFail(3);
$orders = Order::where('id', '>', 0)->take(13)->get();
$orders = Order::where('id', '>', 0)->skip(10)->take(10)->get();
$countOrders = Order::where('id', '>', 10)->count();
$countOrders = Order::whereRaw('id > ? ', [10])->count();
$orders = Order::chunk(10, function($orders) {
	foreach ($orders as $order) {
		//echo "<br>2 records for you: <br><br>";
		echo "<Br>$order->title";
	}
});

echo "<br>amount of records with an id bigger than 10: ".$countOrders;
$name = "title";

foreach ($orders as $order) {
	echo "<br>title: ".$order->$name;
}
echo "<br><br>";

foreach ($order->toArray() as $key => $part) {
	echo "<br>key: ".$key." - part: ".$part;
}
echo "<br>title: ".$order["title"];

echo "<pre>";
//dd($order->toArray());
echo "</pre>";

//dd(Order::first()->toArray());
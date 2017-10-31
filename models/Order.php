<?php

namespace Gorder;

use Illuminate\Database\Eloquent\Model as Model;

Class Order extends Model {


	public $connection = 'sqlite';
	
	public static $name = "wouter";

	public $timestamps = false;

	public $fillable = ["title"];
}
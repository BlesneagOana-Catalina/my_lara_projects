<?php
namespace App;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class User extends Model{

    use HybridRelations;
	 protected $fillable = ['name'];


}
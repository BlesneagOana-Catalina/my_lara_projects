<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 255)->unique();
            $table->string('email', 255)->unique();
            $table->string('adress', 500);
            $table->string('photo', 500);
			$table->char('gender',1);
			$table->integer("age");
            $table->boolean('programmer');
			$table->boolean("designer");
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

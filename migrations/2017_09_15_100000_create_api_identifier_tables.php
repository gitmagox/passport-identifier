<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $connection = config('identifier.database.connection') ?: config('database.default');
        //角色表
        Schema::connection($connection)->create('admin_role', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 50)->comment('角色名');
            $table->string('slug', 60)->unique()->comment('角色标识');
            $table->timestamps();
        });

        //服务表
        Schema::connection($connection)->create(config('identifier.database.service_or_controller_table'), function (Blueprint $table) {
            $table->increments('id')->comment('服务或控制器ID');
            $table->string('name',50)->comment('服务或控制器名字');
            $table->string('slug', 100)->unique()->comment('服务标识');
            $table->unsignedInteger('money')->comment('权限财富值');
            $table->unsignedInteger('max_money')->comment('最大权限财富值');
            $table->timestamps();
        });
        //接口或方法表
        Schema::connection($connection)->create(config('identifier.database.api_or_method_table'), function (Blueprint $table) {
            $table->increments('id')->comment('接口或方法ID');
            $table->unsignedInteger('service_id')->comment('所属服务或控制器');
            $table->string('name',50)->comment('接口或方法名字');
            $table->string('path', 100)->unique()->comment('接口或控制器地址');
            $table->string('slug', 100)->unique()->comment('接口或方法标识');
            $table->unsignedInteger('money')->comment('接口权限财富值');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $connection = config('identifier.database.connection') ?: config('database.default');
        Schema::connection($connection)->dropIfExists(config('identifier.database.service_or_controller_table'));
        Schema::connection($connection)->dropIfExists(config('identifier.database.api_or_method_table'));
    }
}

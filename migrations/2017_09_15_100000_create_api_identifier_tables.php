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
        //用户表
        Schema::connection($connection)->create(config('identifier.database.admin_user_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 190)->unique();
            $table->string('password', 60);
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
        //角色表
        Schema::connection($connection)->create(config('identifier.database.admin_tole_table'), function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->string('name', 50)->comment('角色名');
            $table->string('slug', 60)->unique()->comment('角色标识');
            $table->timestamps();
        });

        //用户角色对应表
        Schema::connection($connection)->create(config('identifier.database.role_users_table'), function (Blueprint $table) {
            $table->integer('role_id');
            $table->integer('user_id');
            $table->index(['role_id', 'user_id']);
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
        Schema::connection($connection)->dropIfExists(config('identifier.database.admin_user_table'));
        Schema::connection($connection)->dropIfExists(config('identifier.database.admin_role_table'));
        Schema::connection($connection)->dropIfExists(config('identifier.database.service_or_controller_table'));
        Schema::connection($connection)->dropIfExists(config('identifier.database.api_or_method_table'));
    }
}

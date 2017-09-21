<?php
/**
 * Created by PhpStorm.
 */
return [
    /**
     * version
     */
    'version' => '0.1',
    /**
     * 暂时不要超过32位
     */
    'bit'    => 32,

    /*
     * 服务与接口表
     */
    'database' => [
        // Database connection for following tables.
        'connection'  =>'',

        // service table and model.
        'service_table' => 'service_or_controller_table',
        'service_model' => '',

        // api table and model.
        'api_table'  => 'api_or_method_table',
        'api_model'  => '',

        // Pivot table for table above.
        'service_or_controller_table'    => 'service_or_controller',
        'api_or_method_table'            => 'api_or_method',
        'admin_role_table'               => 'admin_role',
        'admin_user_table'               => 'admin_user',
        'role_users_table'               => 'admin_role_users',
        'role_service_table'             => 'role_service'


    ],



];
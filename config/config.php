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
     *  一个服务可以分配的接口权限数
     */
    'bit'    => 32,//一个服务可以分配的最大权位数

    /*
     * 服务与接口表---(另一种说法:控制器与方法表).
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


    ],



];
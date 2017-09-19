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
     * 例如一个服务或控制器如果是4位的权限值,那么它的方法或者接口有4个权位可以分配如下:
     * 接口Create分配为1(0001)
     * 接口update分配为2(0010)
     * 接口delete分配为4(0100)
     * 接口index 分配为8(1000)
     *
     * 通过本分配器可以自动分配相应的权限
     *
     * 暂时不要超过32位
     */
    'bit'    => 32,//一个服务可以分配的最大权位数

    /*
     * 服务与接口表---(另一种说法:控制器与方法表).
     *
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


    ],



];
<?php
/**
 *接口或方法
 */
namespace Gitmagox\Identifier\Models;


class Api extends ModelIdentifierConsumer
{

    protected $fillable = ['service_id','name','path', 'slug','money'];

    public $timestamps = true;

    /**
     * Api constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('identifier.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('identifier.database.api_or_method_table'));

        parent::__construct($attributes);
    }


}

<?php
/**
 * 服务或控制器model
 */
namespace Gitmagox\Identifier\Models;


class Service extends ModelIdentifierProvider
{

    protected $fillable = ['name', 'slug','money','max_money'];

    protected $table = 'service_or_controller';

    public $timestamps = true;


    /**
     * Service constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('identifier.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('identifier.database.service_or_controller_table'));

        parent::__construct($attributes);
    }
}

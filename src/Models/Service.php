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
    /**
     * A user has and belongs to many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        $pivotTable = config('identifier.database.role_service_table');
        return $this->belongsToMany('Gitmagox\Identifier\Models\Role', $pivotTable, 'service_id', 'role_id');
    }
}

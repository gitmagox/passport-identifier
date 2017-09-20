<?php

namespace Gitmagox\Identifier\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name', 'slug'];

    /**
     * Create a new Eloquent model instance.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('identifier.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('admin.database.admin_roles_table'));

        parent::__construct($attributes);
    }

    /**
     * A role belongs to many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function administrators()
    {
        $pivotTable = config('identifier.database.role_users_table');
        return $this->belongsToMany('Gitmagox\Identifier\Models\Administrator', $pivotTable, 'role_id', 'user_id');
    }

}

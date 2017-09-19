<?php

namespace Gitmagox\Identifier\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Administrator.
 *
 */
class Administrator extends Model
{


    protected $fillable = ['username', 'password', 'name', 'avatar'];

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('identifier.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('identifier.database.admin_user_table'));

        parent::__construct($attributes);
    }
}

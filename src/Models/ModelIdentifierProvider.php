<?php
/**
 * 接口或方法model
 */
namespace Gitmagox\Identifier\Models;

use Gitmagox\Identifier\Provider\IdentifierProvider;
use Illuminate\Database\Eloquent\Model;

class ModelIdentifierProvider extends Model implements IdentifierProvider
{
    public function getIdetifier()
    {
        return $this->money;
    }
    public function setIdetifier($number)
    {
        return $this->update(['money'=>$number]);
    }
}

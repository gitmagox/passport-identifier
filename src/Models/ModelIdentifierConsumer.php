<?php
/**
 * 接口或方法model
 */
namespace Gitmagox\Identifier\Models;

use Gitmagox\Identifier\Interfaces\IdentifierConsumer;
use Illuminate\Database\Eloquent\Model;

class ModelIdentifierConsumer extends Model implements IdentifierConsumer
{
    //权限消费
    public function setIdetifier($number)
    {
        return $this->update(['money'=>$number]);
    }
    public function getIdetifier()
    {
        return $this->money;
    }

}

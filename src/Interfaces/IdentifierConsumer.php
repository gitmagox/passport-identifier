<?php
/**
 * 权限值消费者
 */
namespace Gitmagox\Identifier\Interfaces;
interface IdentifierConsumer
{
    public function getIdetifier();
    public function setIdetifier($number);
}
<?php
/**
 * 权限值分配提供者
 */
namespace Gitmagox\Identifier\Provider;

interface IdentifierProvider
{
    public function getIdetifier();
    public function setIdetifier();
}
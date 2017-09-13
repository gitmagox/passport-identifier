<?php
/**
 * identifierprovider
 */
namespace Gitmagox\Identifier\Provider;

interface IdentifierProvider
{
    public function getIdetifier();
    public function setIdetifier($number);
}
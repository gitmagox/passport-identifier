<?php
/**
 * identifierprovider
 */
namespace Gitmagox\Identifier\Interfaces;

interface IdentifierProvider
{
    public function getIdetifier();
    public function setIdetifier($number);
}
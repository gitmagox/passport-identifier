<?php
/**
 *  Authority issuer
 */
namespace Gitmagox\Identifier\Traits;

use Gitmagox\Identifier\Provider\IdentifierProvider;

trait  IdentifierIssuer
{
    //Assignable authority
    protected $identifiers;

    public function setIdentifier(IdentifierProvider $identifierProvider)
    {
        $identifierProvider->setIdetifier($this->identifiers);
    }
    /**
     * Parse Authority Identifier
     */
    public function parseAuthorityIdentifier()
    {
        $keylist = [];
        for($i=0; $i<=31; $i++)
        {
            (($this->identifiers<<$i) & 0x80000000) && ($keylist[(31-$i)] = pow(2,(31-$i)));
        }
        return $keylist;
    }

    /**
     *  Get one ticket authority Identifier
     */
    function issueTicket()
    {
        $ticket = array_pop( $this->parseAuthorityIdentifier());
        $this->identifiers = $this->identifiers  & ~$one;
        return $ticket;
    }

    /**
     * revoke one ticket authority Identifier
     */
    public function backTicket( $authority )
    {
        $this->identifiers = $this->identifiers | $authority;
    }

}


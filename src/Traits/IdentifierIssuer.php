<?php
/**
 *  Authority issuer
 */
namespace Gitmagox\Identifier\Traits;

use Gitmagox\Identifier\Provider\IdentifierConsumer;
use Gitmagox\Identifier\Provider\IdentifierProvider;

trait  IdentifierIssuer
{
    /**
     * Assignable authority
     */
    protected $identifiers;

    /**
     * set identifier from identifierprovider;
     */
    public function setIdentifier(IdentifierProvider $identifierProvider, IdentifierConsumer $identifierConsumer)
    {
        $this->provider = $identifierProvider;
        $this->consumer = $identifierConsumer;
        $this->setIdentifierFromProvider();
        return $this;
    }
    /**
     * set identifier from identifierprovider;
     */
    public function setIdentifierFromProvider()
    {
        $this->identifiers = $this->provider->getIdetifier();
        return $this;
    }

    //back save identifier for identifierprovider;
    public function backIdentifierToProvider( )
    {
        return $this->provider->setIdetifier( $this->identifiers );
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
        $this->identifiers = $this->identifiers  & ~$ticket[0];
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


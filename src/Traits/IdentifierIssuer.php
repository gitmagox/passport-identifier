<?php
/**
 *  Authority issuer
 */
namespace Gitmagox\Identifier\Traits;

use Gitmagox\Identifier\Models\ModelIdentifierConsumer;
use Gitmagox\Identifier\Models\ModelIdentifierProvider;

trait  IdentifierIssuer
{
    protected $provider,$consumer;

    /**
     * Assignable authority
     */
    protected $identifiers;

    public function setProvider(
        ModelIdentifierProvider $identifierProvider,
        ModelIdentifierConsumer $identifierConsumer
    )
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
        $bit = config('identifier.bit')-1;
        $keylist = [];
        for($i=0; $i<=$bit; $i++)
        {
            (($this->identifiers<<$i) & 0x80000000) &&
            ($keylist[($bit-$i)] = pow(2,($bit-$i)));
        }
        return $keylist;
    }
    /**
     *  Get one ticket authority Identifier
     */
    function issueTicket($bool = true)
    {
        if($bool)
        {
            DB::transaction(function () {
                $ticket = array_slice($this->parseAuthorityIdentifier(),-1,1);
                dd($ticket);
                $this->identifiers = $this->identifiers  & ~$ticket[0];
                $this->consumer->setIdetifier($ticket[0]);
                $this->backIdentifierToProvider();
            });
        }else{

            $ticket = array_slice( $this->parseAuthorityIdentifier(),-1,1);

            $this->identifiers = $this->identifiers  & ~$ticket[0];
            $this->consumer->setIdetifier($ticket[0]);
            $this->backIdentifierToProvider();
        }

    }
    /**
     * revoke one ticket authority Identifier
     */
    public function backTicket($bool = true)
    {
        if( $bool )
        {
            DB::transaction(function () {
                $authority = $this->consumer->getIdentifier();
                $this->identifiers = $this->identifiers | $authority;
                $this->consumer->setIdentifier(0);
                $this->backIdentifierToProvider();
            });
        }else{
            $authority = $this->consumer->getIdentifier();
            $this->identifiers = $this->identifiers | $authority;
            $this->consumer->setIdentifier(0);
            $this->backIdentifierToProvider();
        }

    }

}


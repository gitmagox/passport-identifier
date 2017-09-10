<?php


trait  PermissionIdentifier
{
    protected $identifiers;
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
     *  Get one ticket authority Identifie
     */
    function getOneTicketFromAuthority()
    {
        $ticket = array_pop( $this->parseAuthorityIdentifier());
        $this->identifiers = $this->identifiers  & ~$one;
        return $ticket;
    }

}


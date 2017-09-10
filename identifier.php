<?php


trait  PermissionIdentifier
{
    /**
     * Parse Authority Identifier
     */
    function parseAuthorityIdentifier( $number )
    {
        $keylist = [];
        for($i=0; $i<=31; $i++)
        {
            (($number<<$i) & 0x80000000) && ($keylist[(31-$i)] = pow(2,(31-$i)));
        }
        return $keylist;
    }

    /**
     *  Get one ticket authority Identifie
     */
    function getOneTicketFromAuthority( $number )
    {
        $one = array_pop( getOne($number) );
        $number = $number  & ~$one;
        return $one;
    }

}


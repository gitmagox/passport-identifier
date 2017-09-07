<?php
/**
 * 根据权限值，取权限票
 * @param $number
 * @return array
 */
function getOne( $number )
{
    $keylist = [];
    for($i=0; $i<=31; $i++)
    {
        (($number<<$i) & 0x80000000) && ($keylist[(31-$i)] = pow(2,(31-$i)));
    }
    return $keylist;
}

/**
 * 消费一票权限
 * @param $number
 * @return mixed
 */
function payOne( &$number )
{
    $one = array_pop( getOne($number) );
    $number = $number  & ~$one;
    return $one;
}
//test
$a = 48;
echo $a;
$b = payOne($a);
echo($a);
echo "\n";
echo($b);

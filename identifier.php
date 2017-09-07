<?php
//test 生成权限值
$str = [];
for ($i=0; $i<=31; $i++){
    $str[] =  pow(2,$i);
}
print_r($str);

//求当前值中有几票权
function getONE( $number )
{
    $str = [];
    for ($i=0; $i<=31; $i++){
        $str[] =  pow(2,$i);
    }
    $keylist = [];
    for($i=0; $i<=31; $i++)
    {
        if( ($number<<$i) &  0x80000000)
            $keylist[] = $str[31-$i];
    }
    return $keylist;
}
//test
print_r($str-getONE( 48 ));

<?php
/**
 * Created by PhpStorm.
 * User : Superseng
 * Date : 2021/3/12
 * Time : 20:48
 **/
header("content-type:text/html; charset=utf-8");
$database = [
    'Name' => 'Uncho',
    'AGe' => 20,
    'HoBBy'=>'music',
    [
        'Test'=>'Ahhhh',
        'jeeBor'=>'Night8',
        'OkkE'=>'WDnmd',
        [
            'onE'=>'TWo',
            'THROeo'=>'IFyou',
            'TRy'=>'doaCET',
        ]
    ]
];
class Array_change_keys_values
{
    function array_change_keys_case(array &$data, int $type = CASE_LOWER) : array//约束函数返回值为数组型
//        如果要改变数组中的值，记得前面加上&符号
    {
        foreach ($data as $key => $value)
        {
            if ($type == CASE_LOWER)
            {
                $action = 'strtolower';
            }
            else
            {
                $action = 'strtoupper';
            }

            unset($data[$key]);//这个是删除数组中的键值操作,不影响$key变量的值
//        如果不删除$data[$key]会输出$data[]这个数组和$data[$key]这个数组
//        相当于数组输出原来的值，由于键名不同，同时还新增了键名转为大小写后的值

            if (is_array($value))
            {
                $data[$action($key)] = $this->array_change_keys_case($value, $type);
            }
            else
            {
                $data[$action($key)] = $value;
                //$action($key) == strtolower($key)
            }
        }
        return $data;
    }

    function array_change_values(array $data, int $type = CASE_LOWER)
    {
        array_walk_recursive($data, function (&$value, &$key, $type) {
            if ($type == CASE_LOWER) {
                $action = 'strtolower';
            } else {
                $action = 'strtoupper';
            }

            $value = $action($value);
            $key = $action($value);

        }, $type);

        return $data;
    }

}

$array_change = new Array_change_keys_values;
print_r($array_change->array_change_keys_case($database , CASE_LOWER));
echo "<hr><br><br><hr>";
print_r($array_change->array_change_values($database , CASE_LOWER));


?>

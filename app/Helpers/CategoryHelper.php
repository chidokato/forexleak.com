<?php

namespace App\Helpers;

class CategoryHelper
{
    public static function showCategoryOptions($data, $parent = 0, $str = '', $select = 0)
    {
        foreach ($data as $value) {
            if ($value['parent'] == $parent) {
                echo '<option value="'.$value['id'].'"'.($select != 0 && $value['id'] == $select ? ' selected' : '').'>'.$str.$value['name'].'</option>';
                self::showCategoryOptions($data, $value['id'], $str.'___', $select);
            }
        }
    }
}

<?php

namespace SpeckOrder\Util;

class Misc
{
    public static function arrayStrReplace($varNames, $varReplacements, array $arr)
    {
        foreach ($arr as $key => $val) {
            if (is_array($val)) {
                $arr[$key] = static::arrayStrReplace($varNames, $varReplacements, $val);
            }
            if (is_string($val)) {
                $arr[$key] = str_replace($varNames, $varReplacements, $val);
            }
        }

        return $arr;
    }
}

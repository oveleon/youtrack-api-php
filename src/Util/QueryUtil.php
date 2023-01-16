<?php

namespace Oveleon\YouTrack\Util;

class QueryUtil
{
    public static function queryList(string $name, array $parts, string $separator = ','): array
    {
        if(empty($parts))
        {
            return [];
        }

        return [$name => self::arrayToList($parts, $separator)];
    }

    private static function arrayToList(array $parts, string $separator = ','): string
    {
        $queryList = [];

        foreach($parts as $field => $value)
        {
            if(is_array($value))
            {
                $queryList[] = sprintf('%s(%s)', $field, self::arrayToList($value));
            }
            else
            {
                $queryList[] = $value;
            }
        }

        return implode($separator, $queryList);
    }
}

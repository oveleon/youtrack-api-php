<?php

namespace Oveleon\YouTrack\Util;

class QueryUtil
{
    public static function queryList(string $name, array $parts, $encode = false): array
    {
        if($encode)
            $parts = array_map(fn($part) => urlencode($part), $parts);

        return [$name => implode(",", $parts)];
    }
}

<?php

namespace Tests;

class BaseTestCase extends \PHPUnit\Framework\TestCase
{
    public static function clearNullFields(array $data): array
    {
        $data = array_filter($data);
        array_walk(
            $data,
            static function (&$data) {
                if (is_array($data)) {
                    $data = self::clearNullFields($data);
                }
            }
        );

        return $data;
    }
}
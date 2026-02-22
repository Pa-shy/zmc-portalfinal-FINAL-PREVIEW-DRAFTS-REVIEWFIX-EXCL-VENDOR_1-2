<?php

namespace App\Support;

use App\Models\SystemConfig;

/**
 * Master Settings helper.
 *
 * Reads defaults from config('zmc.master_settings') and merges with persisted
 * values stored in system_configs under key: master_settings.
 */
class MasterSettings
{
    public static function defaults(): array
    {
        return (array) config('zmc.master_settings', []);
    }

    public static function all(): array
    {
        $defaults = static::defaults();
        $saved = (array) SystemConfig::getValue('master_settings', []);
        return static::mergeRecursiveDistinct($defaults, $saved);
    }

    public static function get(string $path, $default = null)
    {
        $data = static::all();
        foreach (explode('.', $path) as $seg) {
            if (!is_array($data) || !array_key_exists($seg, $data)) {
                return $default;
            }
            $data = $data[$seg];
        }
        return $data;
    }

    public static function set(array $value): void
    {
        SystemConfig::setValue('master_settings', $value);
    }

    private static function mergeRecursiveDistinct(array $base, array $replacements): array
    {
        foreach ($replacements as $key => $value) {
            if (is_array($value) && isset($base[$key]) && is_array($base[$key])) {
                $base[$key] = static::mergeRecursiveDistinct($base[$key], $value);
            } else {
                $base[$key] = $value;
            }
        }
        return $base;
    }
}

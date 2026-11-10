<?php

namespace App\Support;

use App\Models\ModuleSetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class Module
{
    public static function enabled(string $key): bool
    {
        $config = config("modules.{$key}");
        if ($config === null) {
            return false;
        }

        try {
            if (Schema::hasTable('module_settings')) {
                $override = Cache::remember("module_setting_{$key}", 60, function () use ($key) {
                    return ModuleSetting::query()->where('key', $key)->value('enabled');
                });

                if ($override !== null) {
                    return (bool) $override;
                }
            }
        } catch (\Throwable) {
            // fall through to config
        }

        return (bool) ($config['enabled'] ?? false);
    }

    public static function all(): array
    {
        $modules = config('modules', []);
        $out = [];

        foreach ($modules as $key => $meta) {
            $out[$key] = array_merge($meta, [
                'key' => $key,
                'enabled' => static::enabled($key),
            ]);
        }

        return $out;
    }

    public static function clearCache(): void
    {
        foreach (array_keys(config('modules', [])) as $key) {
            Cache::forget("module_setting_{$key}");
        }
    }
}
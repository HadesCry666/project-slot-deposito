<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = ['key', 'label', 'value', 'type', 'section'];

    /**
     * Get a content value by key with optional default.
     */
    public static function get(string $key, string $default = ''): string
    {
        $record = static::where('key', $key)->first();
        return $record ? ($record->value ?? $default) : $default;
    }

    /**
     * Get all contents as key => value array.
     */
    public static function allAsArray(): array
    {
        return static::all()->pluck('value', 'key')->toArray();
    }

    /**
     * Get all contents grouped by section.
     */
    public static function grouped(): array
    {
        return static::all()->groupBy('section')->toArray();
    }
}

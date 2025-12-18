<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label_ar',
        'label_en',
    ];

    /**
     * Get a setting value by key
     */
    public static function getValue($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        
        if (!$setting) {
            return $default;
        }

        if ($setting->type === 'json') {
            return json_decode($setting->value, true) ?? $default;
        }

        return $setting->value ?? $default;
    }

    /**
     * Set a setting value by key
     */
    public static function setValue($key, $value, $type = 'text', $group = null, $labelAr = null, $labelEn = null)
    {
        $setting = self::firstOrNew(['key' => $key]);
        
        if ($type === 'json' && is_array($value)) {
            $setting->value = json_encode($value);
        } else {
            $setting->value = $value;
        }
        
        $setting->type = $type;
        $setting->group = $group;
        $setting->label_ar = $labelAr;
        $setting->label_en = $labelEn;
        $setting->save();
        
        return $setting;
    }
}

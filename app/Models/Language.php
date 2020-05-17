<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'language_code',
        'name',
        'native_name',
        'rtl'
    ];

    /**
     * Modify date format.
     *
     * @param  string  $value
     * @return Date
     */
    public function getCreatedAtAttribute($value): string
    {
        return date('Y-m-d H:i:s', strtotime($value));
    }

    /**
     * Modify date format.
     *
     * @param  string  $value
     * @return Date
     */
    public function getUpdatedAtAttribute($value): string
    {
        return date('Y-m-d H:i:s', strtotime($value));
    }
}

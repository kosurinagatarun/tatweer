<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'favicon',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'featured_image',
        'google_search_console',
        'google_analytics',
        'google_tag_manager',
        'pixel_code',
    ];

    protected $casts = [
        'meta_keywords' => 'array', // Automatically handle array to JSON conversion
    ];

    /**
     * Set the meta_keywords as a JSON encoded array.
     *
     * @param  string|array $value
     * @return void
     */
    public function setMetaKeywordsAttribute($value)
    {
        if (is_string($value)) {
            $value = explode(',', $value);
        }

        $this->attributes['meta_keywords'] = json_encode(array_map('trim', $value));
    }

    /**
     * Get the meta_keywords as an array.
     *
     * @return array
     */
    public function getMetaKeywordsAttribute($value)
    {
        return json_decode($value, true);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Infrastructure\Resources\WithApiWrapping;
use App\Infrastructure\Resources\WithDataFormatters;
use Illuminate\Http\Resources\Json\JsonResource;

class LanguageResource extends JsonResource
{
    use WithApiWrapping, WithDataFormatters;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $language = $this->resource;

        return [
            'id' => (int) $language->id,
            'language_code' => $language->language_code,
            'name' => $language->name,
            'native_name' => $language->native_name,
            'rtl' => (int) $language->rtl,
            'created_at' => $this->formatDate($language->created_at),
            'updated_at' => $this->formatDate($language->updated_at)
        ];
    }
}

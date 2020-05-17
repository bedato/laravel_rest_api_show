<?php

declare(strict_types=1);

namespace App\Repositories\Language;

use ArrayAccess;
use App\Models\Language;

/**
 * A repository class for languages.
 * The class controls an eloquent class of language that is provided by constructor injection.
 * @package Languages
 */
class LanguagesRepository implements LanguagesRepositoryInterface
{
    /**
     * Retrieve languages that correspond to the criteria.
     *
     * @return ArrayAccess
     */
    public function searchLanguages(array $searchCriteria): ArrayAccess
    {
        $search = Language::query();

        if (array_key_exists('name', $searchCriteria)) {
            $search = $search->where('name', 'LIKE', '%' . $searchCriteria['name'] . '%')
                ->orWhere('native_name', 'LIKE', '%' . $searchCriteria['name'] . '%');
            unset($searchCriteria['name']);
        }
        if (array_key_exists('native_name', $searchCriteria)) {
            $search = $search->where('native_name', 'LIKE', '%' . $searchCriteria['native_name'] . '%')
                ->orWhere('name', 'LIKE', '%' . $searchCriteria['native_name'] . '%');
            unset($searchCriteria['native_name']);
        }

        $search = $search->where($searchCriteria);

        return $search->paginate();
    }

    public function getByLanguageCode(string $languageCode): Language
    {
        return Language::where('language_code', $languageCode)->firstOrFail();
    }
}

<?php

declare(strict_types=1);

namespace App\Repositories\Language;

use ArrayAccess;
use App\Models\Language;

/**
 * An interface for the LanguagesRepository.
 * @package Languages
 */
interface LanguagesRepositoryInterface
{
    /**
     * Retrieve language by language code.
     *
     * @return Language
     */
    public function getByLanguageCode(string $languageCode): Language;

    /**
     * Retrieve languages that correspond to criteria.
     *
     * @return ArrayAccess<Language>
     */
    public function searchLanguages(array $searchCriteria): ArrayAccess;
}

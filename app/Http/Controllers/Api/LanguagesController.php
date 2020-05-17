<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Language;
use App\Repositories\Language\LanguagesRepositoryInterface;
use App\Http\Requests\Api\SearchLanguagesRequest;
use App\Http\Resources\LanguageResource;
use App\Http\Resources\LanguagesResourceCollection;

class LanguagesController extends ApiController
{
    private $languagesRepository;
    private $language;

    /**
     * LanguagesController constructor.
     *
     * @param LanguagesRepositoryInterface $languagesRepository
     */
    public function __construct(LanguagesRepositoryInterface $languagesRepository)
    {
        $this->repository = $languagesRepository;
        $this->language = new Language();
    }

    /**
     * Get languages list
     *
     * @return \App\Http\Resources\LanguagesResourceCollection
     */
    public function index(SearchLanguagesRequest $request): LanguagesResourceCollection
    {
        $languages = $this->repository->searchLanguages(
            $request->only($this->language->getFillable())
        );

        return new LanguagesResourceCollection($languages);
    }

    /**
     * Get specific language by language code.
     *
     * @return \App\Http\Resources\LanguageResource
     */
    public function getByLanguageCode(string $languageCode): LanguageResource
    {
        $language = $this->repository->getByLanguageCode($languageCode);

        return new LanguageResource($language);
    }
}

<?php

namespace Abtswath\PSNClient\Models;

class Concept extends BasicModel {

    /**
     * @var int
     */
    private int $id;

    /**
     * @var string[]
     */
    private array $titleIds;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var Media
     */
    private Media $media;

    /**
     * @var string[]
     */
    private array $genres;

    /**
     * @var LocalizedName
     */
    private LocalizedName $localizedName;

    /**
     * @var string
     */
    private string $country;

    /**
     * @var string
     */
    private string $language;

    public function __construct(array $concept) {
        $this->id = $concept['id'];
        $this->titleIds = $concept['titleIds'];
        $this->name = $concept['name'];
        $this->media = new Media($concept['media']);
        $this->genres = $concept['genres'];
        $this->localizedName = new LocalizedName($concept['localizedName']);
        $this->country = $concept['country'];
        $this->language = $concept['language'];
    }

    /**
     * @return int
     */
    public function getId(): int {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getTitleIds(): array {
        return $this->titleIds;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return Media
     */
    public function getMedia(): Media {
        return $this->media;
    }

    /**
     * @return array
     */
    public function getGenres(): array {
        return $this->genres;
    }

    /**
     * @return LocalizedName
     */
    public function getLocalizedName(): LocalizedName {
        return $this->localizedName;
    }

    /**
     * @return string
     */
    public function getCountry(): string {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }

}

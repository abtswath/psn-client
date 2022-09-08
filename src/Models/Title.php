<?php

namespace Abtswath\PSNClient\Models;

class Title extends BasicModel {

    /**
     * @var Concept
     */
    private Concept $concept;

    /**
     * @var string
     */
    private string $playDuration;

    /**
     * @var string
     */
    private string $firstPlayedDateTime;

    /**
     * @var string
     */
    private string $lastPlayedDateTime;

    /**
     * @var int
     */
    private int $playCount;

    /**
     * @var string
     */
    private string $category;

    /**
     * @var string
     */
    private string $localizedImageUrl;

    /**
     * @var string
     */
    private string $imageUrl;

    /**
     * @var string
     */
    private string $localizedName;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $titleId;

    /**
     * @var string
     */
    private string $service;

    /**
     * @var array
     */
    private array $stats;

    /**
     * @var Media
     */
    private Media $media;

    public function __construct(array $contents) {
        $this->concept = new Concept($contents['concept']);
        $this->playDuration = $contents['playDuration'];
        $this->firstPlayedDateTime = $contents['firstPlayedDateTime'];
        $this->lastPlayedDateTime = $contents['lastPlayedDateTime'];
        $this->playCount = $contents['playCount'];
        $this->category = $contents['category'];
        $this->localizedImageUrl = $contents['localizedImageUrl'];
        $this->imageUrl = $contents['imageUrl'];
        $this->localizedName = $contents['localizedName'];
        $this->name = $contents['name'];
        $this->titleId = $contents['titleId'];
        $this->service = $contents['service'];
        $this->stats = $contents['stats'];
        $this->media = new Media($contents['media']);
    }

    /**
     * @return Concept
     */
    public function getConcept(): Concept {
        return $this->concept;
    }

    /**
     * @return string
     */
    public function getPlayDuration(): string {
        return $this->playDuration;
    }

    /**
     * @return string
     */
    public function getFirstPlayedDateTime(): string {
        return $this->firstPlayedDateTime;
    }

    /**
     * @return string
     */
    public function getLastPlayedDateTime(): string {
        return $this->lastPlayedDateTime;
    }

    /**
     * @return int
     */
    public function getPlayCount(): int {
        return $this->playCount;
    }

    /**
     * @return string
     */
    public function getCategory(): string {
        return $this->category;
    }

    /**
     * @return string
     */
    public function getLocalizedImageUrl(): string {
        return $this->localizedImageUrl;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string {
        return $this->imageUrl;
    }

    /**
     * @return string
     */
    public function getLocalizedName(): string {
        return $this->localizedName;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTitleId(): string {
        return $this->titleId;
    }

    /**
     * @return string
     */
    public function getService(): string {
        return $this->service;
    }

    /**
     * @return array
     */
    public function getStats(): array {
        return $this->stats;
    }

    /**
     * @return Media
     */
    public function getMedia(): Media {
        return $this->media;
    }

}

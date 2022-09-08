<?php

namespace Abtswath\PSNClient\Models;

class Media extends BasicModel {

    /**
     * @var Audio[]
     */
    private array $audios = [];

    /**
     * @var Video[]
     */
    private array $videos = [];

    /**
     * @var Image[]
     */
    private array $images = [];

    public function __construct(array $media) {
        foreach ($media['audios'] as $audio) {
            $this->audios[] = new Audio($audio);
        }
        foreach ($media['videos'] as $video) {
            $this->videos[] = new Video($video);
        }
        foreach ($media['images'] as $image) {
            $this->images[] = new Image($image);
        }
    }

    /**
     * @return array
     */
    public function getAudios(): array {
        return $this->audios;
    }

    /**
     * @return array
     */
    public function getVideos(): array {
        return $this->videos;
    }

    /**
     * @return array
     */
    public function getImages(): array {
        return $this->images;
    }

}

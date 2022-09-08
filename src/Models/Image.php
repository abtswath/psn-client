<?php

namespace Abtswath\PSNClient\Models;

class Image extends BasicModel {

    /**
     * @var string
     */
    private string $url;

    /**
     * @var string
     */
    private string $type;

    public function __construct(array $image) {
        $this->url = $image['url'];
        $this->type = $image['type'];
    }

    /**
     * @return string
     */
    public function getUrl(): string {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getType(): string {
        return $this->type;
    }
}

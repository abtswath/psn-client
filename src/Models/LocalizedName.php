<?php

namespace Abtswath\PSNClient\Models;

class LocalizedName extends BasicModel {

    private string $defaultLanguage;

    private array $metadata;

    public function __construct(array $localizedName) {
        $this->defaultLanguage = $localizedName['defaultLanguage'];
        $this->metadata = $localizedName['metadata'];
    }

    /**
     * @return string
     */
    public function getDefaultLanguage(): string {
        return $this->defaultLanguage;
    }

    /**
     * @return array
     */
    public function getMetadata(): array {
        return $this->metadata;
    }

}

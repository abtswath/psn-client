<?php

namespace Abtswath\PSNClient\Response;

use Abtswath\PSNClient\Models\Trophy;

class TrophyResponse extends PaginationResponse {

    /**
     * The current version of the trophy set
     *
     * @var string
     */
    private string $trophySetVersion;

    /**
     * True if this title has additional trophy groups
     *
     * @var bool
     */
    private bool $hasTrophyGroups;

    /**
     * Individual object for each trophy
     *
     * @var Trophy[]
     */
    private array $trophies = [];

    public function __construct(array $contents) {
        $this->trophySetVersion = $contents['trophySetVersion'];
        $this->hasTrophyGroups = $contents['hasTrophyGroups'];
        $this->makeTrophies($contents['trophies']);
        parent::__construct($contents['totalItemCount'], $contents['nextOffset'] ?? null, $contents['previousOffset'] ?? null);
    }

    private function makeTrophies(array $trophies) {
        $this->trophies = [];
        foreach ($trophies as $trophy) {
            $this->trophies[] = new Trophy($trophy);
        }
    }

    /**
     * @return string
     */
    public function getTrophySetVersion(): string {
        return $this->trophySetVersion;
    }

    /**
     * @return bool
     */
    public function isHasTrophyGroups(): bool {
        return $this->hasTrophyGroups;
    }

    /**
     * @return array
     */
    public function getTrophies(): array {
        return $this->trophies;
    }

}

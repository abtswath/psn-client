<?php

namespace Abtswath\PSNClient\Response;

use Abtswath\PSNClient\Models\RarestTrophy;
use Abtswath\PSNClient\Models\TrophyEarned;

class TrophyEarnedResponse extends PaginationResponse {

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
     * Date most recent trophy earned for the title
     * UTC
     *
     * @var string
     */
    private string $lastUpdatedDateTime;

    /**
     * Individual object for each trophy
     *
     * @var TrophyEarned[]
     */
    private array $trophies = [];

    /**
     * Individual object for each trophy
     * Returns the trophy where earned is true with the lowest trophyEarnedRate.
     * Returns nothing if no trophies are earned
     *
     * @var RarestTrophy[]
     */
    private array $rarestTrophies = [];

    public function __construct(array $contents) {
        $this->trophySetVersion = $contents['trophySetVersion'];
        $this->hasTrophyGroups = $contents['hasTrophyGroups'];
        $this->lastUpdatedDateTime = $contents['lastUpdatedDateTime'];
        $this->makeTrophies($contents['trophies']);
        $this->makeRarestTrophies($contents['rarestTrophies']);
        parent::__construct($contents['totalItemCount'], $contents['nextOffset'] ?? null, $contents['previousOffset'] ?? null);
    }

    private function makeTrophies(array $trophies) {
        $this->trophies = [];
        foreach ($trophies as $trophy) {
            $this->trophies[] = new TrophyEarned($trophy);
        }
    }

    private function makeRarestTrophies(array $rarestTrophies) {
        $this->rarestTrophies = [];
        foreach ($rarestTrophies as $trophy) {
            $this->rarestTrophies[] = new RarestTrophy($trophy);
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
     * @return string
     */
    public function getLastUpdatedDateTime(): string {
        return $this->lastUpdatedDateTime;
    }

    /**
     * @return array
     */
    public function getTrophies(): array {
        return $this->trophies;
    }

    /**
     * @return array
     */
    public function getRarestTrophies(): array {
        return $this->rarestTrophies;
    }

}

<?php

namespace Abtswath\PSNClient\Response;

use Abtswath\PSNClient\Models\TrophyTitle;

class TrophyTitlesResponse extends PaginationResponse {

    /**
     * @var TrophyTitle[]
     */
    private array $trophyTitles = [];

    public function __construct(array $contents) {
        $this->makeTrophyTitles($contents['trophyTitles']);
        parent::__construct($contents['totalItemCount'], $contents['nextOffset'] ?? null, $contents['previousOffset'] ?? null);
    }

    private function makeTrophyTitles(array $trophyTitles) {
        $this->trophyTitles = [];
        foreach ($trophyTitles as $trophyTitle) {
            $this->trophyTitles[] = new TrophyTitle($trophyTitle);
        }
    }

    /**
     * @return array
     */
    public function getTrophyTitles(): array {
        return $this->trophyTitles;
    }

}

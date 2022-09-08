<?php

namespace Abtswath\PSNClient\Response;

use Abtswath\PSNClient\Models\Title;

class GameListResponse extends PaginationResponse {

    /**
     * @var Title[]
     */
    private array $titles = [];

    public function __construct(array $contents) {
        $this->makeTitles($contents['titles']);
        parent::__construct($contents['totalItemCount'], $contents['nextOffset'] ?? null, $contents['previousOffset'] ?? null);
    }

    private function makeTitles(array $titles) {
        $this->titles = [];
        foreach ($titles as $title) {
            $this->titles[] = new Title($title);
        }
    }

    /**
     * @return array
     */
    public function getTitles(): array {
        return $this->titles;
    }

}

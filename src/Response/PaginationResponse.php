<?php

namespace Abtswath\PSNClient\Response;

class PaginationResponse extends BasicResponse {

    /**
     * Total trophies in the group (or total trophies for the title if all specified)
     *
     * @var int
     */
    protected int $totalItemCount;

    /**
     * @var int|null
     */
    protected ?int $nextOffset;

    /**
     * @var int|null
     */
    protected ?int $previousOffset;

    public function __construct(int $totalItemCount, ?int $nextOffset, ?int $previousOffset) {
        $this->totalItemCount = $totalItemCount;
        $this->nextOffset = $nextOffset;
        $this->previousOffset = $previousOffset;
    }

    /**
     * @return int
     */
    public function getTotalItemCount(): int {
        return $this->totalItemCount;
    }

    /**
     * @return int|null
     */
    public function getNextOffset(): ?int {
        return $this->nextOffset;
    }

    /**
     * @return int|null
     */
    public function getPreviousOffset(): ?int {
        return $this->previousOffset;
    }

}

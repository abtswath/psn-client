<?php

namespace Abtswath\PSNClient\Models;

class DefinedTrophies extends BasicModel {

    /**
     * Total bronze trophies from all trophy groups
     *
     * @var int
     */
    private int $bronze;

    /**
     * Total silver trophies from all trophy groups
     *
     * @var int
     */
    private int $silver;

    /**
     * Total gold trophies from all trophy groups
     *
     * @var int
     */
    private int $gold;

    /**
     * Total platinum trophies from all trophy groups
     *
     * @var int
     */
    private int $platinum;

    public function __construct(array $earnedTrophies) {
        $this->bronze = $earnedTrophies['bronze'];
        $this->silver = $earnedTrophies['silver'];
        $this->gold = $earnedTrophies['gold'];
        $this->platinum = $earnedTrophies['platinum'];
    }

    /**
     * @return int
     */
    public function getBronze(): int {
        return $this->bronze;
    }

    /**
     * @return int
     */
    public function getSilver(): int {
        return $this->silver;
    }

    /**
     * @return int
     */
    public function getGold(): int {
        return $this->gold;
    }

    /**
     * @return int
     */
    public function getPlatinum(): int {
        return $this->platinum;
    }

}

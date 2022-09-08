<?php

namespace Abtswath\PSNClient\Models;

class RarestTrophy extends BasicModel {

    /**
     * Unique ID for this trophy (unique within the title and not just the group)
     *
     * @var int
     */
    private int $trophyId;

    /**
     * True if this is a secret trophy (ie. further details are not displayed by default unless earned)
     *
     * @var bool
     */
    private bool $trophyHidden;

    /**
     * True if this trophy has been earned
     *
     * @var bool
     */
    private bool $earned;

    /**
     * Date trophy was earned
     *
     * @var string
     */
    private string $earnedDateTime;

    /**
     * Type of the trophy
     *
     * @var string
     */
    private string $trophyType;

    /**
     * Rarity of the trophy
     * 0 Ultra Rare
     * 1 Very Rare
     * 2 Rare
     * 3 Common
     *
     * @var int
     */
    private int $trophyRare;

    /**
     * Percentage of all users who have earned the trophy
     *
     * @var string
     */
    private string $trophyEarnedRate;

    public function __construct(array $contents) {
        $this->trophyId = $contents['trophyId'];
        $this->trophyHidden = $contents['trophyHidden'];
        $this->earned = $contents['earned'];
        $this->earnedDateTime = $contents['earnedDateTime'];
        $this->trophyType = $contents['trophyType'];
        $this->trophyRare = $contents['trophyRare'];
        $this->trophyEarnedRate = $contents['trophyEarnedRate'];
    }

    /**
     * @return int
     */
    public function getTrophyId(): int {
        return $this->trophyId;
    }

    /**
     * @return bool
     */
    public function isTrophyHidden(): bool {
        return $this->trophyHidden;
    }

    /**
     * @return bool
     */
    public function isEarned(): bool {
        return $this->earned;
    }

    /**
     * @return string
     */
    public function getEarnedDateTime(): string {
        return $this->earnedDateTime;
    }

    /**
     * @return string
     */
    public function getTrophyType(): string {
        return $this->trophyType;
    }

    /**
     * @return int
     */
    public function getTrophyRare(): int {
        return $this->trophyRare;
    }

    /**
     * @return string
     */
    public function getTrophyEarnedRate(): string {
        return $this->trophyEarnedRate;
    }

}

<?php

namespace Abtswath\PSNClient\Models;

class TrophyEarned extends BasicModel {

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
     * If the trophy tracks progress towards unlock this is number of steps currently completed (ie. 73/300)
     * PS5 titles only
     * Only returned if the trophy tracks progress and earned is false
     *
     * @var string|null
     */
    private ?string $progress;

    /**
     * If the trophy tracks progress towards unlock this is the current percentage complete
     * PS5 titles only
     * Only returned if the trophy tracks progress and earned is false
     *
     * @var int|null
     */
    private ?int $progressRate;

    /**
     * f the trophy tracks progress towards unlock, and some progress has been made, then this returns the date progress was last updated.
     * PS5 titles only
     * Only returned if the trophy tracks progress, some progress has been made, and earned is false
     *
     * @var string|null
     */
    private ?string $progressedDateTime;

    /**
     * Date trophy was earned
     * Only returned if earned is true
     *
     * @var string|null
     */
    private ?string $earnedDateTime;

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
        $this->progress = $contents['progress'] ?? null;
        $this->progressRate = $contents['progressRate'] ?? null;
        $this->progressedDateTime = $contents['progressedDateTime'] ?? null;
        $this->earnedDateTime = $contents['earnedDateTime'] ?? null;
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
     * @return string|null
     */
    public function getProgress(): ?string {
        return $this->progress;
    }

    /**
     * @return int|null
     */
    public function getProgressRate(): ?int {
        return $this->progressRate;
    }

    /**
     * @return string|null
     */
    public function getProgressedDateTime(): ?string {
        return $this->progressedDateTime;
    }

    /**
     * @return string|null
     */
    public function getEarnedDateTime(): ?string {
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

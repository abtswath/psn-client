<?php

namespace Abtswath\PSNClient\Models;

class Trophy extends BasicModel {

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
     * Type of the trophy
     *
     * @var string
     */
    private string $trophyType;

    /**
     * Name of the trophy
     *
     * @var string
     */
    private string $trophyName;

    /**
     * Description of the trophy
     *
     * @var string
     */
    private string $trophyDetail;

    /**
     * URL for the graphic associated with the trophy
     *
     * @var string
     */
    private string $trophyIconUrl;

    /**
     * ID of the trophy group this trophy belongs to
     *
     * @var string
     */
    private string $trophyGroupId;

    /**
     * If the trophy tracks progress towards unlock this is the total required
     * PS5 titles only
     * Only returned if trophy tracks progress
     *
     * @var string|null
     */
    private ?string $trophyProgressTargetValue;

    /**
     * Name of the reward earning the trophy grants
     * PS5 titles only
     * Only returned if the trophy has a reward associated with it
     *
     * @var string|null
     */
    private ?string $trophyRewardName;

    /**
     * URL for the graphic associated with the reward
     * PS5 titles only
     * Only returned if the trophy has a reward associated with it
     *
     * @var string|null
     */
    private ?string $trophyRewardImageUrl;

    public function __construct(array $contents) {
        $this->trophyId = $contents['trophyId'];
        $this->trophyHidden = $contents['trophyHidden'];
        $this->trophyType = $contents['trophyType'];
        $this->trophyName = $contents['trophyName'];
        $this->trophyDetail = $contents['trophyDetail'];
        $this->trophyIconUrl = $contents['trophyIconUrl'];
        $this->trophyGroupId = $contents['trophyGroupId'];
        $this->trophyProgressTargetValue = $contents['trophyProgressTargetValue'] ?? null;
        $this->trophyRewardName = $contents['trophyRewardName'] ?? null;
        $this->trophyRewardImageUrl = $contents['trophyRewardImageUrl'] ?? null;
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
     * @return string
     */
    public function getTrophyType(): string {
        return $this->trophyType;
    }

    /**
     * @return string
     */
    public function getTrophyName(): string {
        return $this->trophyName;
    }

    /**
     * @return string
     */
    public function getTrophyDetail(): string {
        return $this->trophyDetail;
    }

    /**
     * @return string
     */
    public function getTrophyIconUrl(): string {
        return $this->trophyIconUrl;
    }

    /**
     * @return string
     */
    public function getTrophyGroupId(): string {
        return $this->trophyGroupId;
    }

    /**
     * @return string|null
     */
    public function getTrophyProgressTargetValue(): ?string {
        return $this->trophyProgressTargetValue;
    }

    /**
     * @return string|null
     */
    public function getTrophyRewardName(): ?string {
        return $this->trophyRewardName;
    }

    /**
     * @return string|null
     */
    public function getTrophyRewardImageUrl(): ?string {
        return $this->trophyRewardImageUrl;
    }

}

<?php

namespace Abtswath\PSNClient\Models;

class TrophyTitle extends BasicModel {

    /**
     * trophy for PS3, PS4, or PS Vita platforms, trophy2 for the PS5 platform
     *
     * @var string
     */
    private string $npServiceName;

    /**
     * Unique ID of the title; later required for requesting detailed trophy information for this title
     *
     * @var string
     */
    private string $npCommunicationId;

    /**
     * The current version of the trophy set
     *
     * @var string
     */
    private string $trophySetVersion;

    /**
     * Title name
     *
     * @var string
     */
    private string $trophyTitleName;

    /**
     * Title description PS3, PS4 and PS Vita titles only
     *
     * @var string
     */
    private string $trophyTitleDetail;

    /**
     * URL of the icon for the title
     *
     * @var string
     */
    private string $trophyTitleIconUrl;

    /**
     * The platform this title belongs to. Some games have trophy sets which are shared between multiple platforms (ie. PS4,PSVITA). The platforms will be comma separated.
     *
     * @var string
     */
    private string $trophyTitlePlatform;

    /**
     * True if the title has multiple groups of trophies (eg. DLC trophies which are separate from the main trophy list)
     *
     * @var bool
     */
    private bool $hasTrophyGroups;

    /**
     * Number of trophies for the title by type
     *
     * @var DefinedTrophies
     */
    private DefinedTrophies $definedTrophies;

    /**
     * Percentage of trophies earned for the title
     *
     * @var int
     */
    private int $progress;

    /**
     * Number of trophies for the title which have been earned by type
     *
     * @var EarnedTrophies
     */
    private EarnedTrophies $earnedTrophies;

    /**
     * Title has been hidden on the accounts trophy list
     * Authenticating account only
     * Title will not be returned if it has been hidden on another account
     *
     * @var bool
     */
    private bool $hiddenFlag;

    /**
     * Date most recent trophy earned for the title
     * UTC
     *
     * @var string
     */
    private string $lastUpdatedDateTime;

    public function __construct(array $contents) {
        $this->npServiceName = $contents['npServiceName'];
        $this->npCommunicationId = $contents['npCommunicationId'];
        $this->trophySetVersion = $contents['trophySetVersion'];
        $this->trophyTitleName = $contents['trophyTitleName'];
        $this->trophyTitleDetail = $contents['trophyTitleDetail'];
        $this->trophyTitleIconUrl = $contents['trophyTitleIconUrl'];
        $this->trophyTitlePlatform = $contents['trophyTitlePlatform'];
        $this->hasTrophyGroups = $contents['hasTrophyGroups'];
        $this->definedTrophies = new DefinedTrophies($contents['definedTrophies']);
        $this->progress = $contents['progress'];
        $this->earnedTrophies = new EarnedTrophies($contents['earnedTrophies']);
        $this->hiddenFlag = $contents['hiddenFlag'];
        $this->lastUpdatedDateTime = $contents['lastUpdatedDateTime'];
    }

    /**
     * @return string
     */
    public function getNpServiceName(): string {
        return $this->npServiceName;
    }

    /**
     * @return string
     */
    public function getNpCommunicationId(): string {
        return $this->npCommunicationId;
    }

    /**
     * @return string
     */
    public function getTrophySetVersion(): string {
        return $this->trophySetVersion;
    }

    /**
     * @return string
     */
    public function getTrophyTitleName(): string {
        return $this->trophyTitleName;
    }

    /**
     * @return string
     */
    public function getTrophyTitleDetail(): string {
        return $this->trophyTitleDetail;
    }

    /**
     * @return string
     */
    public function getTrophyTitleIconUrl(): string {
        return $this->trophyTitleIconUrl;
    }

    /**
     * @return string
     */
    public function getTrophyTitlePlatform(): string {
        return $this->trophyTitlePlatform;
    }

    /**
     * @return bool
     */
    public function isHasTrophyGroups(): bool {
        return $this->hasTrophyGroups;
    }

    /**
     * @return DefinedTrophies
     */
    public function getDefinedTrophies(): DefinedTrophies {
        return $this->definedTrophies;
    }

    /**
     * @return int
     */
    public function getProgress(): int {
        return $this->progress;
    }

    /**
     * @return EarnedTrophies
     */
    public function getEarnedTrophies(): EarnedTrophies {
        return $this->earnedTrophies;
    }

    /**
     * @return bool
     */
    public function isHiddenFlag(): bool {
        return $this->hiddenFlag;
    }

    /**
     * @return string
     */
    public function getLastUpdatedDateTime(): string {
        return $this->lastUpdatedDateTime;
    }

}

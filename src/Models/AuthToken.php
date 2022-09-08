<?php

namespace Abtswath\PSNClient\Models;

class AuthToken extends BasicModel {

    private string $accessToken;

    private string $tokenType;

    private int $expiresIn;

    private string $scope;

    private string $idToken;

    private string $refreshToken;

    private int $refreshTokenExpiresIn;

    public function __construct(array $contents) {
        $this->accessToken = $contents['access_token'];
        $this->tokenType = $contents['token_type'];
        $this->expiresIn = $contents['expires_in'];
        $this->scope = $contents['scope'];
        $this->idToken = $contents['id_token'];
        $this->refreshToken = $contents['refresh_token'];
        $this->refreshTokenExpiresIn = $contents['refresh_token_expires_in'];
    }

    /**
     * @return string
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getTokenType(): string {
        return $this->tokenType;
    }

    /**
     * @return int
     */
    public function getExpiresIn(): int {
        return $this->expiresIn;
    }

    /**
     * @return string
     */
    public function getScope(): string {
        return $this->scope;
    }

    /**
     * @return string
     */
    public function getIdToken(): string {
        return $this->idToken;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string {
        return $this->refreshToken;
    }

    /**
     * @return int
     */
    public function getRefreshTokenExpiresIn(): int {
        return $this->refreshTokenExpiresIn;
    }

}

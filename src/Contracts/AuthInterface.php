<?php

namespace Abtswath\PSNClient\Contracts;

interface AuthInterface {

    public function login(string $npsso);

    public function refreshToken(string $refreshToken);

}

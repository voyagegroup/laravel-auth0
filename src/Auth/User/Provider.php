<?php

declare(strict_types=1);

namespace Auth0\Laravel\Auth\User;

use Illuminate\Contracts\Auth\Authenticatable;

final class Provider implements \Auth0\Laravel\Contract\Auth\User\Provider, \Illuminate\Contracts\Auth\UserProvider
{
    /**
     * {@inheritdoc}
     *
     * @phpcsSuppress SlevomatCodingStandard.Functions.UnusedParameter
     */
    public function retrieveById($identifier): ?Authenticatable
    {
        return null;
    }

    /**
     * {@inheritdoc}
     *
     * @phpcsSuppress SlevomatCodingStandard.Functions.UnusedParameter
     */
    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        return null;
    }

    /**
     * {@inheritdoc}
     *
     * @phpcsSuppress SlevomatCodingStandard.Functions.UnusedParameter
     */
    public function retrieveByCredentials(array $credentials): ?Authenticatable
    {
        return null;
    }

    /**
     * {@inheritdoc}
     *
     * @phpcsSuppress SlevomatCodingStandard.Functions.UnusedParameter
     */
    public function validateCredentials(
        Authenticatable $user,
        array $credentials,
    ): bool {
        return false;
    }

    /**
     * {@inheritdoc}
     *
     * @phpcsSuppress SlevomatCodingStandard.Functions.UnusedParameter
     */
    public function updateRememberToken(Authenticatable $user, $token): void
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getRepository(): \Auth0\Laravel\Contract\Auth\User\Repository
    {
        static $repository = null;

        if (null === $repository) {
            $configName = \Auth0\Laravel\Auth0::getConfigName();

            /**
             * @var string $providerName
             */
            $providerName = config("$configName.auth.provider", 'auth0');

            /**
             * @var string|null $configured
             */
            $configured = config("auth.providers.$providerName.repository") ?? \Auth0\Laravel\Auth\User\Repository::class;
            $repository = app($configured);
        }

        return $repository;
    }
}

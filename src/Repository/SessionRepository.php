<?php


namespace Yaliilyaya\Symfony6AdminLte\Repository;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionRepository
{
    public function __construct(
        private readonly  RequestStack $requestStack
    ) {
    }

    public function getCanEdit(): bool
    {
        return $this->requestStack->getSession()->get('canEdit') === true;
    }
}
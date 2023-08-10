<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;

use Yaliilyaya\Symfony6AdminLte\Repository\SessionRepository;
use Twig\Extension\RuntimeExtensionInterface;

class AppConfigExtension implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly SessionRepository $sessionRepository
    ) {
    }

    public function appConfig(): array
    {
        return [
            'canEdit' => $this->sessionRepository->getCanEdit()
        ];
    }
}
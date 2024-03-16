<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Yaliilyaya\Symfony6AdminLte\Repository\SessionRepository;
use Twig\Extension\RuntimeExtensionInterface;

class AppConfigExtension implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly SessionRepository $sessionRepository,
        private readonly ContainerBagInterface $containerBag
    ) {
    }

    public function appConfig(): array
    {
        $config = $this->containerBag->all();

        return array_merge($config, [
            'canEdit' => $this->sessionRepository->getCanEdit()
        ]);
    }
}
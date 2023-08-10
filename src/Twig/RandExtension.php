<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;
use Yaliilyaya\Symfony6AdminLte\Model\Rand;
use Yaliilyaya\Symfony6AdminLte\Repository\SessionRepository;
use Twig\Extension\RuntimeExtensionInterface;

class RandExtension implements RuntimeExtensionInterface
{
    public function rand(): Rand
    {
        return new Rand();
    }
}
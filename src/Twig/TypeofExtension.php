<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;

use Twig\Extension\RuntimeExtensionInterface;

class TypeofExtension implements RuntimeExtensionInterface
{
    public function typeof($variable): string
    {
        return gettype($variable);
    }
}
<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;

use Twig\Extension\RuntimeExtensionInterface;

class NormalizeNameExtension implements RuntimeExtensionInterface
{
    /**
     * @param $value
     * @return mixed
     */
    public function formatNormalizeName($value)
    {
        $value = preg_replace('/([A-Z]+)/', '_$1', $value);
        return str_replace('_', ' ', $value);
    }
}
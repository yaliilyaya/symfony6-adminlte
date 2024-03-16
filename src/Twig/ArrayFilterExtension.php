<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;

use Doctrine\Common\Collections\ArrayCollection;
use Yaliilyaya\Symfony6AdminLte\Model\Rand;
use Twig\Extension\RuntimeExtensionInterface;

class ArrayFilterExtension implements RuntimeExtensionInterface
{
    public function arrayFilter(array $data, array $criteria): array
    {
        $data = array_reverse($data);
        $collection = new ArrayCollection($data);
        $item = $collection->findFirst(fn($key, $item) => $this->equelas($item, $criteria));

        return $item ?: [];
    }

    public function equelas(array $item, array $criteria): bool
    {
        foreach ($criteria as $key => $value) {
            if ($item[$key] !== $value) {
                return false;
            }
        }

        return true;
    }
}
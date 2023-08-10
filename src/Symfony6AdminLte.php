<?php
namespace Yaliilyaya\Symfony6AdminLte;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class Symfony6AdminLte extends Bundle
{
    public const ALIAS = 'symfony6-adminlte';

    public function getPath(): string
    {
        return realpath(__DIR__ . '/../');
    }
}
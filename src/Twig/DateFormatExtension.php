<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;

use Yaliilyaya\Symfony6AdminLte\Model\Rand;
use Yaliilyaya\Symfony6AdminLte\Repository\SessionRepository;
use Twig\Extension\RuntimeExtensionInterface;

class DateFormatExtension implements RuntimeExtensionInterface
{
    public function dateFormat($string)
    {
        $time = strtotime($string);
        return date('Y-m-d',$time);
    }

    public function timeFormat($string)
    {
        $time = strtotime($string);
        $time -= 3 * 60 * 60;
        //2022-07-20T10:00:00Z
        return str_replace(['#', '%'], ['T', 'Z'], date('Y-m-d#H:i:s%', $time));
    }
}
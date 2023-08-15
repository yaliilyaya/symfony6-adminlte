<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends  AbstractExtension
{
    /**
     * @return TwigFilter[]
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('normalizeName', [NormalizeNameExtension::class, 'formatNormalizeName']),
        ];
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
//            new TwigFunction('notificationList', [NotificationExtension::class, 'notificationList']),
            new TwigFunction('appConfig', [AppConfigExtension::class, 'appConfig']),
            new TwigFunction('rand', [RandExtension::class, 'rand']),
            new TwigFunction('dateFormat', [DateFormatExtension::class, 'dateFormat']),
            new TwigFunction('timeFormat', [DateFormatExtension::class, 'timeFormat']),
        ];
    }
}
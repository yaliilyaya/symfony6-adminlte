<?php


namespace Yaliilyaya\Symfony6AdminLte\Twig;
use Yaliilyaya\Symfony6AdminLte\Repository\SessionRepository;
use Twig\Extension\RuntimeExtensionInterface;

class NotificationExtension implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly SessionRepository $sessionRepository
    ) {
    }

    public function notificationList(): array
    {
        return array_filter([
            $this->getCompareSchemaNotification()
        ]);
    }

    private function getCompareSchemaNotification(): ?array
    {
        $compareSchema = $this->sessionRepository->findCompareSchemaCurrent();
        if ($compareSchema->isEmpty()) {
            return null;
        }

        return [
            'message' => $compareSchema->getCompareSchema(),
            'info' => 'CompareSchema'
        ];
    }
}
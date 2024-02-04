<?php

namespace Yaliilyaya\Symfony6AdminLte\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class FlashBagService 
   implements FlashBagInterface
{
    private FlashBagInterface $flashBag;

    public function __construct(private readonly RequestStack $requestStack)
    {
        $this->flashBag = $this->getFlash();
    }

    /**
     * Returns the current request.
     */
    public function getRequest(): ?Request
    {
        if (!isset($this->requestStack)) {
            throw new \RuntimeException('The "app.request" variable is not available.');
        }

        return $this->requestStack->getCurrentRequest();
    }

    /**
     * Returns the current session.
     */
    public function getSession(): ?Session
    {
        if (!isset($this->requestStack)) {
            throw new \RuntimeException('The "app.session" variable is not available.');
        }
        $request = $this->getRequest();

        return $request?->hasSession() ? $request->getSession() : null;
    }


    public function getFlash(): ?FlashBagInterface
    {
        try {
            if (null === $session = $this->getSession()) {
                return null;
            }
        } catch (\RuntimeException) {
            return null;
        }

        return $session->getFlashBag();
    }

    public function getName(): string
    {
        return $this->flashBag->getName();
    }

    /**
     * @return void
     */
    public function setName(string $name)
    {
        $this->flashBag->setName($name);
    }

    /**
     * @return void
     */
    public function initialize(array &$flashes)
    {
        $this->flashBag->initialize($flashes);
    }

    /**
     * @return void
     */
    public function add(string $type, mixed $message)
    {
        $this->flashBag->add($type, $message);
    }

    public function peek(string $type, array $default = []): array
    {
        return $this->flashBag->peek($type, $default);
    }

    public function peekAll(): array
    {
        return $this->flashBag->peekAll();
    }

    public function get(string $type, array $default = []): array
    {
        return $this->flashBag->get($type, $default);
    }

    public function all(): array
    {
        return $this->flashBag->all();
    }

    /**
     * @return void
     */
    public function set(string $type, string|array $messages)
    {
        $this->flashBag->set($type, $messages);
    }

    /**
     * @return void
     */
    public function setAll(array $messages)
    {
        $this->flashBag->setAll($messages);
    }

    public function has(string $type): bool
    {
        return $this->flashBag->has($type);
    }

    public function keys(): array
    {
        return $this->flashBag->keys();
    }

    public function getStorageKey(): string
    {
        return $this->flashBag->getStorageKey();
    }

    public function clear(): mixed
    {
        return $this->flashBag->clear();
    }

}
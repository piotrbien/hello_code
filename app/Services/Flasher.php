<?php

namespace App\Services;

use App\Enums\FlashType;
use Illuminate\Session\Store;

class Flasher
{
    private array $notifications = [];

    public function __construct(
        private readonly Store $session
    ) {
        //
    }

    public function danger(string $message): void
    {
        $this->push($message, FlashType::DANGER);
    }

    public function info(string $message): void
    {
        $this->push($message, FlashType::INFO);
    }

    public function success(string $message): void
    {
        $this->push($message, FlashType::SUCCESS);
    }

    public function warning(string $message): void
    {
        $this->push($message, FlashType::WARNING);
    }

    private function push(string $message, FlashType $type): void
    {
        $this->notifications[] = [
            'message' => $message,
            'type' => $type->value,
        ];

        $this->session->flash('notifications', $this->notifications);
    }
}

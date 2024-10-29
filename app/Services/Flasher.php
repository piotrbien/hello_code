<?php

namespace App\Services;

use App\Enums\FlashType;
use Illuminate\Session\Store;

class Flasher
{
    private array $notifications = [];

    /**
     * @param \Illuminate\Session\Store $session
     */
    public function __construct(
        private readonly Store $session
    ) {
        //
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public function danger(string $message): void
    {
        $this->push($message, FlashType::DANGER);
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public function info(string $message): void
    {
        $this->push($message, FlashType::INFO);
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public function success(string $message): void
    {
        $this->push($message, FlashType::SUCCESS);
    }

    /**
     * @param string $message
     *
     * @return void
     */
    public function warning(string $message): void
    {
        $this->push($message, FlashType::WARNING);
    }

    /**
     * @param string $message
     * @param \App\Enums\FlashType $type
     *
     * @return void
     */
    private function push(string $message, FlashType $type): void
    {
        $this->notifications[] = [
            'message' => $message,
            'type' => $type->value,
        ];

        $this->session->flash('notifications', $this->notifications);
    }
}

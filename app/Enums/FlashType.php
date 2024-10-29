<?php

namespace App\Enums;

enum FlashType: string
{
    case DANGER = 'danger';
    case INFO = 'info';
    case SUCCESS = 'success';
    case WARNING = 'warning';
}

<?php

namespace App\Models\Enums;

enum EventStatus : string {
    case PENDING = "PENDING";
    case HIDE = "HIDE";
    case SHOW = "SHOW";
}
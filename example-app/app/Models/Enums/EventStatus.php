<?php

namespace App\Models\Enums;

enum EventStatus : string {
    case PENDING = "PENDING";
    case END = "END";
    case SHOW = "SHOW";
}
<?php

namespace App\Models\Enums;

enum EventStatus:string {
    case PENDNING = "PENDING";
    case HIDE = "HIDE";
    case SHOW = "SHOW";
}
<?php

namespace App\Models\Enums;

enum ProcessStatus:string {
    case PARTICIPANT  = "PARTICIPANT";
    case HOST = "HOST";
}
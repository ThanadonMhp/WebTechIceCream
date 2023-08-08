<?php

namespace App\Models\Enums;

enum ProcessStatus:string {
    case UPCOMING  = "UPCOMING";
    case INPROCESS = "INPROCESS";
    case COMPLETED = "COMPLETED";
}
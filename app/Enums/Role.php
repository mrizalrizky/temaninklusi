<?php

namespace App\Enums;

enum Role: int {
    case ADMIN = 1;
    case MEMBER = 2;
    case EVENT_ORGANIZER = 3;
}

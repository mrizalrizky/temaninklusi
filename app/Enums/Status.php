<?php

namespace App\Enums;

enum Status: int {
    case ON_VERIFICATION = 1;
    case REJECTED = 2;
    case APPROVED = 3;
}

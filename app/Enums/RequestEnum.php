<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RequestEnum extends Enum
{
    const pending = "pending";
    const inProgress = "inProgress";
    const completed = "completed";
    const declined = "declined";
}
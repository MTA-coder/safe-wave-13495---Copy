<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class PriorityEnum extends Enum
{
    const low = "low";
    const mid = "mid";
    const high = "high";
}

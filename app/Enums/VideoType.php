<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class VideoType extends Enum
{
    const mp4 = "mp4";
    const m4v = "m4v";
}
<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ResType extends Enum
{
    const image = "image";
    const video = "video";
    const img_360 = "img_360";
}

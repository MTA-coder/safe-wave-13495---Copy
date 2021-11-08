<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ImageType extends Enum
{
    const jpg = "jpg";
    const png = "png";
    const gif = "gif";
}

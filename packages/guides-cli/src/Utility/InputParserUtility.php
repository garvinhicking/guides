<?php

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link https://phpdoc.org
 */

namespace phpDocumentor\Guides\Cli\Utility;

use Symfony\Component\Console\Input\InputInterface;

final class InputParserUtility
{
    /**
     * getParameterOption cannot map shortcuts, so we need to specifically
     * check the long and short syntax here. The fallback is
     * defined as last resort.
     */
    public static function getParameterWithShortcutAndFallback(InputInterface $input, string $fullName, string $shortcutName, mixed $fallbackValue): mixed
    {
        $value = $input->getParameterOption('--' . $fullName, null, true);
        if ($value === null) {
            $value = $input->getParameterOption('-' . $shortcutName, null, true);
        }

        if ($value === null) {
            $value = $fallbackValue;
        }

        return $value;
    }
}

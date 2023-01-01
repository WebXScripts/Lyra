<?php

namespace Webxscripts\Lyra\Exceptions;

use RuntimeException;

class JobClassDoesNotExist extends RunTimeException
{
    /**
     * @param string|null $jobClass
     * @return static
     */
    public static function make(?string $jobClass): self
    {
        return new self("The job class `{$jobClass}` does not exist.");
    }
}
<?php

namespace Webxscripts\Lyra\Exceptions;

use RuntimeException;

class WebhookUrlNotValid extends RuntimeException
{
    /**
     * @param string $name
     * @param string $url
     * @return static
     */
    public static function make(string $name, string $url): self
    {
        return new self("The webhook url `{$name}` is not valid. The url is `{$url}`.");
    }
}
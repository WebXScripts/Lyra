<?php

namespace Webxscripts\Lyra;
use Webxscripts\Lyra\Exceptions\JobClassDoesNotExist;
use Webxscripts\Lyra\Exceptions\WebhookUrlNotValid;
use Webxscripts\Lyra\Jobs\SendToSlackChannelJob;

class LyraConfig
{
    /**
     * @param array $arguments
     * @return SendToSlackChannelJob
     */
    public static function getJobClass(array $arguments): SendToSlackChannelJob
    {
        $jobClass = config('lyra.job_class');

        if ($jobClass === null || !class_exists($jobClass)) {
            throw JobClassDoesNotExist::make($jobClass);
        }

        return app($jobClass, $arguments);
    }

    /**
     * @param string $name
     * @return string|null
     */
    public static function getWebhookUrl(string $name): string|null
    {
        if (filter_var($name, FILTER_VALIDATE_URL)) {
            return $name;
        }

        $url = config("lyra.webhook_urls.{$name}");

        if (!$url) {
            return null;
        }

        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw WebhookUrlNotValid::make($name, $url);
        }

        return $url;
    }

    /**
     * @return array
     */
    public static function getNotifyOnClass(): array
    {
        return config('lyra.notify_on_class') ?? [];
    }
}
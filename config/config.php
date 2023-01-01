<?php

return [
    /**
     * The webhook URLs to send the notifications to.
     * See: https://api.slack.com/messaging/webhooks
     */
    'webhook_urls' => [
        'default' => env('SLACK_ALERT_WEBHOOK'),
    ],

    /**
     * The job class to use to send the notifications.
     * Currently only SendToSlackChannelJob is supported.
     */
    'job_class' => \Webxscripts\Lyra\Jobs\SendToSlackChannelJob::class,

    /**
     * The classes to notify on.
     */
    'notify_on_class' => [
        'ErrorException',
        \Illuminate\View\ViewException::class
    ]
];
<?php

namespace Webxscripts\Lyra\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendToSlackChannelJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @note The maximum number of unhandled exceptions to allow before failing.
     * @var int $maxExceptions
     */
    public int $maxExceptions = 3;

    /**
     * @note The number of seconds to wait before retrying the job.
     * @var int $retryAfter
     */
    public int $retryAfter = 60;

    /**
     * @param string $text
     * @param string $type
     * @param string $webhookUrl
     */
    public function __construct(
        public string $text,
        public string $type,
        public string $webhookUrl
    ) {
    }

    /**
     * @return void
     */
    public function handle()
    {
        Http::post($this->webhookUrl, [
            'text' => $this->text,
            'type' => $this->type,
        ]);
    }
}
<?php

namespace Webxscripts\Lyra;

use Illuminate\Http\Request;

class Lyra
{
    private string $webhookUrl = 'default';

    /**
     * @param string $webhookUrl
     * @return $this
     */
    public function buildUp(string $webhookUrl): self
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }

    /**
     * @param \Throwable $e
     * @param Request $request
     * @return void
     */
    public function handle(\Throwable $e, Request $request): void
    {
        if(!in_array(get_class($e), LyraConfig::getNotifyOnClass())) {
            return;
        }

        $webhookUrl = LyraConfig::getWebhookUrl($this->webhookUrl);
        if (!$webhookUrl) return;

        $jobArguments = [
            'text' => $this->generateMessage($e, $request),
            'type' => 'mrkdown',
            'webhookUrl' => $webhookUrl,
        ];
        $job = LyraConfig::getJobClass($jobArguments);
        dispatch($job);
    }

    protected function generateMessage(\Throwable $e, Request $request): string
    {
        return __('lyra::messages.message', [
            'url' => $request->fullUrl(),
            'route' => $request->getRequestUri(),
            'method' => $request->method(),
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => substr($e->getTraceAsString(), 0, 1000) . '...',
        ]);
    }
}

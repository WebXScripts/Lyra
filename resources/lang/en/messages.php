<?php

return [
    /**
     * The default webhook url to use when sending messages to Slack.
     * See: https://api.slack.com/messaging/webhooks
     */
    'message' => ":warning: *Lyra alert - Exception on :url found!*\n```-> Message: :message\n-> Route: :route\n-> Method: :method\n-> File: :file\n-> Line: :line\n\nTrace: :trace```\n<!here>",
];

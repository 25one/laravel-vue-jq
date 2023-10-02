<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendChatMessage extends Command
{
    protected $signature = 'chat:message';

    protected $description = 'Send chat message.';

    public function handle()
    {
        $user = \App\Models\User::first();
        
        event(new \App\Events\ChatMessageWasReceived('Test message AGAIN...', $user));
    }
}

<?php

namespace App\Enums;

enum DocumentStatus: string
{
    const Pending = 'pending';
    const Processing = 'processing';
    const Ready = 'ready';
    const Failed = 'failed';
}

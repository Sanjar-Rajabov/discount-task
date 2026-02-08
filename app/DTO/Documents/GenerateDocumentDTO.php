<?php

namespace App\DTO\Documents;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;

final readonly class GenerateDocumentDTO implements Arrayable
{
    public function __construct(
        public string $client,
        public string $provider,
        public Carbon $date
    )
    {
    }

    public function toArray(): array
    {
        return [
            'client' => $this->client,
            'provider' => $this->provider,
            'date' => $this->date
        ];
    }
}

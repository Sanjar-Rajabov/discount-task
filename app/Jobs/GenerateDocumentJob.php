<?php

namespace App\Jobs;

use App\DTO\Documents\GenerateDocumentDTO;
use App\Services\DocumentService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GenerateDocumentJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private int                 $id,
        private GenerateDocumentDTO $data
    )
    {
    }

    /**
     * Execute the job.
     */
    public function handle(DocumentService $service): void
    {
        try {
            $service->generateFile($this->id, $this->data);
        } catch (\Throwable $exception) {
            $this->fail($exception);
        }
    }
}

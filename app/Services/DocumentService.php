<?php

namespace App\Services;

use App\DTO\Documents\GenerateDocumentDTO;
use App\Jobs\GenerateDocumentJob;
use App\Models\Document;
use App\PDF\PDFGenerator;
use App\Repositories\DocumentRepository;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

readonly class DocumentService
{
    public function __construct(
        public DocumentRepository $repository,
        public PDFGenerator       $pdf
    )
    {
    }

    public function create(GenerateDocumentDTO $data): Document
    {
        $document = $this->repository->create();
        GenerateDocumentJob::dispatch($document->getKey(), $data);
        return $document;
    }

    public function generateFile(int $id, GenerateDocumentDTO $data): void
    {
        $document = $this->repository->find($id);
        $this->repository->markProcessing($document);
        $path = $this->makePath($id, $data);

        try {
            $this->pdf->generate(
                config('documents.view'),
                ['data' => $data],
                $path
            );

            $this->repository->markReady($document, $path);
        } catch (Throwable $exception) {
            $this->repository->markFailed($document, $exception->getMessage());
            Log::error(
                sprintf('Generating document %d failed. Message: %s', $id, $exception->getMessage()),
                $exception->getTrace()
            );
        }
    }

    private function makePath(int $id, GenerateDocumentDTO $data): string
    {
        $path = sprintf(
            '%s/agreement-%d-%s-and-%s-%s.pdf',
            config('documents.path'),
            $id,
            Str::slug($data->client),
            Str::slug($data->provider),
            $data->date->format('Y-m-d')
        );

        $dir = dirname(Storage::path($path));
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        return $path;
    }
}

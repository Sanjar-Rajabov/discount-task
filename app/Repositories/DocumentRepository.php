<?php

namespace App\Repositories;

use App\Enums\DocumentStatus;
use App\Models\Document;

class DocumentRepository
{
    public function find(int $id): Document
    {
        return Document::query()->findOrFail($id);
    }

    public function create()
    {
        $document = Document::query()->create();
        $document->refresh();
        return $document;
    }

    public function markProcessing(Document $document): void
    {
        $document->update([
            'status' => DocumentStatus::Processing,
        ]);
    }

    public function markReady(Document $document, string $path): void
    {
        $document->update([
            'status' => DocumentStatus::Ready,
            'path' => $path,
        ]);
    }

    public function markFailed(Document $document, string $error): void
    {
        $document->update([
            'status' => DocumentStatus::Failed,
            'comment' => $error,
        ]);
    }
}

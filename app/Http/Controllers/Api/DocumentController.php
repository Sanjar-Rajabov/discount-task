<?php

namespace App\Http\Controllers\Api;

use App\DTO\Documents\GenerateDocumentDTO;
use App\Http\Requests\Api\Document\DocumentGenerateRequest;
use App\Models\Document;
use App\Services\DocumentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;

readonly class DocumentController
{
    public function __construct(
        public DocumentService $service
    )
    {
    }

    public function generate(DocumentGenerateRequest $request): JsonResponse
    {
        $document = $this->service->create(
            new GenerateDocumentDTO(
                $request->input('client'),
                $request->input('provider'),
                Carbon::make($request->input('date')),
            )
        );

        return response()->json([
            'message' => 'Document generated successfully',
            'document' => $document
        ], 202);
    }

    public function getOne(Document $document): JsonResponse
    {
        return response()->json([
            'document' => $document
        ]);
    }
}

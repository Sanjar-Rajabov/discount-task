<?php

namespace App\PDF;


use Barryvdh\DomPDF\PDF;
use Exception;
use Illuminate\Support\Facades\Storage;

readonly class DompdfAdapter implements PDFGenerator
{
    public function __construct(
        public PDF $pdf
    )
    {
    }

    /**
     * @throws Exception
     */
    public function generate(string $view, array $data, string $path): void
    {
        $this->pdf->loadView($view, $data);
        $this->pdf->save(Storage::path($path));
    }
}

<?php

namespace App\PDF;

interface PDFGenerator
{
    public function generate(string $view, array $data, string $path): void;
}

<?php

namespace App\Http\Controllers;

use App\Services\CvService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CvController extends Controller
{
    protected CvService $cvService;

    public function __construct(CvService $cvService)
    {
        $this->cvService = $cvService;
    }

    public function preview()
    {
        $cvData = $this->cvService->getCvData();
        return view('cv.preview', compact('cvData'));
    }

    public function downloadPdf()
    {
        $cvData = $this->cvService->getCvData();
        
        $pdf = Pdf::loadView('cv.content', [
            'cvData' => $cvData,
            'isPreview' => false,
        ])->setPaper('A4', 'portrait')
          ->setOptions([
              'isRemoteEnabled' => true,
              'isHtml5ParserEnabled' => true,
              'isPhpEnabled' => true,
              'defaultFont' => 'Inter',
          ]);

        return $pdf->download('Ridho_Norfajar_CV.pdf');
    }
}
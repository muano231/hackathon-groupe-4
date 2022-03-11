<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use \Mpdf\Mpdf as PDF;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }



    /**
     *  get charts and return  pdf.
     *
     * @return
     */
    public function getChartsPdf(){
        $render = $this->getCharts()->render();
        // Setup a filename
        $documentFileName = "charts.pdf";

        // Create the mPDF document
        $document = new PDF( [
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_header' => '3',
            'margin_top' => '20',
            'margin_bottom' => '20',
            'margin_footer' => '2',
        ]);

        // Set some header informations for output
        $header = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.$documentFileName.'"'
        ];

        // Write some simple Content
        $document->WriteHTML($this->getCharts()->render());


        // Save PDF on your public storage
        Storage::disk('public')->put($documentFileName, $document->Output($documentFileName, "S"));

        // Get file back from storage with the give header informations
        return Storage::disk('public')->download($documentFileName, 'Request', $header);

    }


    /**
     * Generate charts and return view.
     *
     * @return
     */
    public function getCharts(){
        $studies = Study::with('sessions', 'sessions.tests')->get();
        $data = [];
        foreach($studies as $study){
            $el = [];
            foreach($study['sessions'] as $session){
                if ($session['tests']->count() > 0){
                    $el[] = [$session['description'], $session['tests']->count()];
                }

            }
            $data[] = $el;
        }

//        $studies = Study::with('sessions', 'sessions.tests')->groupBy('sessions')->get();
//        dd($studies);
        return view('charts', ['studies' => $data]);
    }

}

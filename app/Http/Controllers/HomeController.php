<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use mikehaertl\wkhtmlto\Pdf;

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
        $pdf = new Pdf;
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('report.pdf'));

        return response()->download(public_path('report.pdf'));
    }


    /**
     * Generate charts and return view.
     *
     * @return
     */
    public function getCharts(){
        return view('charts');
    }

}

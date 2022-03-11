<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Knp\Snappy\Pdf;


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


        file_put_contents(public_path('charts.html'), $render);



       return response()->file(public_path('charts.html'));

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

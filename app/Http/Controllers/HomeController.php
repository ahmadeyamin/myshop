<?php

namespace App\Http\Controllers;

use App\Model\IncAndExp;
use App\Charts\HomeChart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $date_ = Carbon::now()->subDay(30);




        $chart = new HomeChart;

        $dates = [];

        for ($i=0; $i < 30; $i++) {
            $dates[$i] = Carbon::now()->subRealDay($i);
        }


        $f_data = [];
        $x_data = [];

        foreach ($dates as $key => $value) {
            $t_data =
            IncAndExp
            ::where('shop_id',1)
            ->whereDate('created_at','=',$value->format('Y-m-d'))
            ->where('type','exp')
            ->get();

            $amount = 0;
            foreach ($t_data as $key => $value) {
                $amount += $value->amount;
            }
            $f_data[] = (int) $amount;

        }


        foreach ($dates as $key => $value) {
            $t_data =
            IncAndExp
            ::where('shop_id',1)
            ->whereDate('created_at','=',$value->format('Y-m-d'))
            ->where('type','inc')
            ->get();

            $amount = 0;
            foreach ($t_data as $key => $value) {
                $amount += $value->amount;
            }
            $x_data[] = (int) $amount;

        }

        $format_date = [];

        foreach ($dates as $key => $value) {
            array_push($format_date,$value->format('d D'));
        }


        $chart->labels($format_date);
        $chart->dataset('Cost', 'line', $f_data)->color('#ec4561')->options([
            'borderWidth'=> '3',
            'borderColor'=> "rgba(255, 22, 194, .6)",
            'borderCapStyle'=> "butt",
            'borderDashOffset'=> 0,
            'borderJoinStyle'=>"miter",
            'pointBorderColor'=>"#ec4561",
            'pointBackgroundColor'=>"#ec4561",
            'pointBorderWidth'=>1,
            'pointHoverRadius'=>5,
            'pointHoverBackgroundColor'=>"#ec4561",
            'pointHoverBorderColor'=>"#ec4561",
            'pointHoverBorderWidth'=>2,
            'pointRadius'=>1,
            'pointHitRadius'=>10,
            'lineTension'=>.5,
            'backgroundColor'=>"rgba(255, 22, 194, 0.2)",
            'borderDash'=>[],
            'fill'=> true,
        ]);

        $chart->dataset('Earn', 'line', $x_data)->color('#3c4ccf')->options([
            'borderWidth'=> '3',
            'borderColor'=> "#3c4ccf",
            'borderCapStyle'=> "butt",
            'borderDashOffset'=> 0,
            'borderJoinStyle'=>"miter",
            'pointBorderColor'=>"#3c4ccf",
            'pointBackgroundColor'=>"#fff",
            'pointBorderWidth'=>1,
            'pointHoverRadius'=>5,
            'pointHoverBackgroundColor'=>"#3c4ccf",
            'pointHoverBorderColor'=>"#fff",
            'pointHoverBorderWidth'=>2,
            'pointRadius'=>1,
            'pointHitRadius'=>10,
            'lineTension'=>.5,
            'backgroundColor'=>"rgba(60, 76, 207, 0.2)",
            'borderDash'=>[],
            'fill'=> true,
        ]);


        // return $f_data;
        return view('index',compact(['chart']));
    }
}

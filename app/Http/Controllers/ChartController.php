<?php

namespace App\Http\Controllers;

use App\Models\AlertGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {

    //     return view('chart');
    // dd($datapic);
    // }

    public function index(Request $request)
    {

        // if ($request->ajax()) {
        //     return datatables()->of($list_alertgroup)->make(true);
        // }
        // if (request()->ajax()) {
        //     if (!empty($request->from_date)) {
        //         $data = DB::table('alertgroup')
        //             ->select('alertgroup.*', 'users.name', 'status.description')
        //             ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
        //             ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
        //             ->whereBetween('alertgroup.created_at', array($request->from_date, $request->to_date))
        //             ->get();
        //     } else {
        //         $data = DB::table('alertgroup')
        //             ->select(
        //                 'alertgroup.*',
        //                 'alertgroup.alertgroupid as id',
        //                 'users.name',
        //                 'status.description as description',
        //                 DB::raw('case when alertgroup.status = 3 then "Warning" end as warning'),
        //                 DB::raw('case when alertgroup.status = 2 then "Down" end as down'),
        //                 DB::raw('case when alertgroup.status = 13 then "Critical" end as critical')
        //             )
        //             ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
        //             ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
        //             ->get();
        //     }
        //     return datatables()->of($data)
        //         ->addColumn('Status', function ($data) {
        //             $button = "";
        //             if ($data->description == "Down") {
        //                 $button = "<span class='badge bg-danger' style='color:white'>" . $data->description . "</span>";
        //             } else if ($data->description == "Critical") {
        //                 $button = "<span class='badge bg-critical' style='color:white'>" . $data->description . "</span>";
        //             } else if ($data->description == "Warning") {
        //                 $button = "<span class='badge bg-warning' style='color:white'>" . $data->description . "</span>";
        //             }

        //             return $button;
        //         })
        //         ->rawColumns(['Status'])
        //         ->make(true);
        // }
        // return view('chart');
        if (request()->ajax()) {
            $labels =  DB::table('alertgroup')
                ->select('status', 'description as desc')
                ->leftJoin('status', 'alertgroup.status', '=', 'status.id')
                ->groupBy('alertgroup.status', 'status.description')
                ->get();


            $chart = DB::table('alertgroup')
                ->select(
                    'status',
                    'description as desc',
                    DB::raw('count(alertgroupid) as totalalert'),
                    DB::raw('count(case when status = 3 then 1 else null end) as totwarn'),
                    DB::raw('count(case when status = 2 then 1 else null end) as totdown'),
                    DB::raw('count(case when status = 13 then 1 else null end) as totcrit'),
                )->leftJoin('status', 'alertgroup.status', '=', 'status.id')
                ->groupBy('alertgroup.status', 'status.description')
                ->get();

            // $items = DB::table('transaksis')
            //             ->select(DB::raw('count(*) as jumlah, status'))
            //             ->groupBy('status')
            //             ->get();

            return response()->json([
                'data' => $chart,
                'labels' => $labels
            ]);
        }
        return view('chart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

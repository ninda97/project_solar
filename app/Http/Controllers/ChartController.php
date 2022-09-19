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
    public function index()
    {

        $bdata = DB::table('alertgroup')
            ->select(
                'location',
                DB::raw('count(alertgroupid) as totalalert'),
                DB::raw('count(case when status = 3 then 1 else null end) as totwarn'),
                DB::raw('count(case when status = 2 then 1 else null end) as totdown'),
                DB::raw('count(case when status = 13 then 1 else null end) as totcrit'),
            )
            ->groupBy('location')
            ->get();

        $barlabel = [];
        $bardata = [];

        foreach ($bdata as $row) {
            $barlabel[] = $row->location;
            $bardata[] = [$row->totwarn, $row->totcrit, $row->totdown];
        }

        return view('chart', ['bardata' => $bardata, 'barlabel' => $barlabel]);

        // dd($bardata);
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

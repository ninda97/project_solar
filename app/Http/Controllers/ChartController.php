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


        $udata = DB::table('alertgroup')
            ->select(DB::raw('count(alertgroupid) as totalalert'), 'users.name as picname')
            ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
            ->whereNotNull('users.chatid')

            ->groupBy('alertgroup.chatid', 'users.name')
            ->get();

        $datapic = [];
        $pic = [];

        foreach ($udata as $row) {
            $datapic[] = $row->totalalert;
            $pic[] = $row->picname;
        }

        return view('chart', ['datapic' => $datapic, 'pic' => $pic]);

        dd($datapic);
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

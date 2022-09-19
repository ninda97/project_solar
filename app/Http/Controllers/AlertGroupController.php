<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlertGroup;
use App\Models\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AlertGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_alertgroup = DB::table('alertgroup')
            ->select('alertgroup.*', 'users.name', 'status.description')
            ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
            ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
            ->get();

        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $data = DB::table('tbl_order')
                    ->whereBetween('created_at', array($request->from_date, $request->to_date))
                    ->get();
            } else {
                $data = DB::table('tbl_order')
                    ->get();
            }
            return datatables()->of($data)->make(true);
        }

        return view('alert-detail', [
            'list_alertgroup' => $list_alertgroup
        ]);
        error_log($request);
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
        $alert = DB::table('alertgroup')
            ->select('alertgroup.*', 'users.name', 'status.description')
            ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
            ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
            ->where('alertgroupid', $id)
            ->first();

        return view('each-alert', compact('alert'));
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

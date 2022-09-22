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
        $users = DB::table('users')
            ->select('chatid')
            ->where('chatid', auth()->user()->chatid)
            ->first();

        if (request()->ajax()) {
            if ((auth()->user()->chatid != '' || auth()->user()->chatid != null) && $users->chatid == auth()->user()->chatid) {

                if (!empty($request->from_date)) {

                    $data = DB::table('alertgroup')
                        ->select('alertgroup.*', 'users.name', 'status.description as description')
                        ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
                        ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
                        ->whereBetween('alertgroup.created_at', array($request->from_date, $request->to_date))
                        ->where('users.chatid', auth()->user()->chatid)
                        ->orderBy('alertgroup.created_at', 'DESC')
                        ->get();
                } else {
                    $data = DB::table('alertgroup')
                        ->select(
                            'alertgroup.*',
                            'users.name',
                            'status.description as description'
                        )
                        ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
                        ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
                        ->where('users.chatid', auth()->user()->chatid)
                        ->orderBy('alertgroup.created_at', 'DESC')
                        ->get();
                }
            } else {
                if (!empty($request->from_date)) {
                    $data = DB::table('alertgroup')
                        ->select('alertgroup.*', 'users.name', 'status.description as description')
                        ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
                        ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
                        ->whereBetween('alertgroup.created_at', array($request->from_date, $request->to_date))
                        ->orderBy('alertgroup.created_at', 'DESC')
                        ->get();
                } else {
                    $data = DB::table('alertgroup')
                        ->select(
                            'alertgroup.*',
                            'users.name',
                            'status.description as description'
                        )
                        ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
                        ->leftjoin('status', 'status.id', '=', 'alertgroup.status')
                        ->orderBy('alertgroup.created_at', 'DESC')
                        ->get();
                }
            }
            return datatables()->of($data)
                ->addColumn('Status', function ($data) {
                    $button = "";
                    if ($data->description == "Down") {
                        $button = "<span class='badge bg-danger' style='color:white'>" . $data->description . "</span>";
                    } else if ($data->description == "Critical") {
                        $button = "<span class='badge bg-critical' style='color:white'>" . $data->description . "</span>";
                    } else if ($data->description == "Warning") {
                        $button = "<span class='badge bg-warning' style='color:white'>" . $data->description . "</span>";
                    }

                    return $button;
                })
                ->rawColumns(['Status'])
                ->make(true);
        }

        return view('alert-detail');
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

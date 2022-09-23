<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\AlertGroup;


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
        $colors =  DB::table('status')
            ->select('id')
            ->get();

        $result = DB::table('alertgroup')
            ->select(
                DB::raw('count(alertgroupid) as totalalert'),
                DB::raw('count(case when status = 3 then 1 else null end) as totalwarning'),
                DB::raw('count(case when status = 2 then 1 else null end) as totaldown'),
                DB::raw('count(case when status = 13 then 1 else null end) as totalcritical'),
                DB::raw('count(distinct(trx_ticket.id)) as totalticket')
            )
            ->leftjoin('trx_ticket', 'trx_ticket.alertid', '=', 'alertgroup.alertid')
            ->get();

        $resultu = DB::table('alertgroup')
            ->select(
                DB::raw('count(alertgroupid) as totalalert'),
                DB::raw('count(case when status = 3 then 1 else null end) as totalwarning'),
                DB::raw('count(case when status = 2 then 1 else null end) as totaldown'),
                DB::raw('count(case when status = 13 then 1 else null end) as totalcritical'),
                DB::raw('count(distinct(trx_ticket.id)) as totalticket')
            )
            ->leftjoin('trx_ticket', 'trx_ticket.alertid', '=', 'alertgroup.alertid')
            ->where('trx_ticket.chatid', auth()->user()->chatid)
            ->get();

        $labels =  DB::table('alertgroup')
            ->select('status', 'description')
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

        $chartu = DB::table('alertgroup')
            ->select(
                'chatid',
                DB::raw('count(alertgroupid) as totalalert'),
                DB::raw('count(case when status = 3 then 1 else null end) as totwarn'),
                DB::raw('count(case when status = 2 then 1 else null end) as totdown'),
                DB::raw('count(case when status = 13 then 1 else null end) as totcrit'),
            )
            ->where('chatid', auth()->user()->chatid)
            ->groupBy('status', 'chatid')
            ->get();

        $chartg = DB::table('alertgroup')
            ->select(
                'nodegroup',
                DB::raw('count(alertgroupid) as totalalert')
            )
            ->whereNotNull('nodegroup')
            ->where('nodegroup', '!=', '')
            ->groupBy('nodegroup')
            ->get();

        $months = DB::table('alertgroup')
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->groupBy('month_name')
            ->orderBy('created_at')
            ->get();


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


        $udata = DB::table('alertgroup')
            ->select(DB::raw('count(alertgroupid) as totalalert'), 'users.name as picname')
            ->leftjoin('users', 'users.chatid', '=', 'alertgroup.chatid')
            ->whereNotNull('users.chatid')
            ->groupBy('alertgroup.chatid', 'users.name')
            ->get();

        $barlabel = [];
        $bardata = [];
        $label = [];
        $labelg = [];
        $datag = [];
        $datau = [];
        $month = [];
        $label_month = [];
        $datapic = [];
        $pic = [];

        foreach ($bdata as $row) {
            $barlabel[] = $row->location;
            $bardata[] = [$row->totwarn, $row->totcrit, $row->totdown];
        }

        foreach ($months as $row) {
            $label_month[] = $row->month_name;
            $month[] = $row->count;
        }

        foreach ($labels as $row) {
            $label[] = $row->description;
        }

        // foreach ($chart as $row) {
        //     $data[] = $row->totalalert;
        // }

        foreach ($chartu as $row) {
            $datau[] = $row->totalalert;
        }

        foreach ($chartg as $row) {
            $datag[] = $row->totalalert;
            $labelg[] = $row->nodegroup;
        }

        foreach ($udata as $row) {
            $datapic[] = $row->totalalert;
            $pic[] = $row->picname;
        }

        // $data['chart_data'] = json_encode($data);
        // $data['l'] = json_encode($label);

        // return view('home', compact('result'), $data, $label);

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
        return view('home', ['colors' => $colors, 'result' => $result, 'resultu' => $resultu, 'datag' => $datag, 'datau' => $datau, 'label' => $label, 'labelg' => $labelg, 'label_month' => $label_month, 'month' => $month, 'datapic' => $datapic, 'pic' => $pic, 'barlabel' => $barlabel, 'bardata' => $bardata]);
    }


    /**
     * User Profile
     * @param Nill
     * @return View Profile
     * @author A&N
     */
    public function getProfile()
    {
        return view('profile');
    }

    /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     * @author A&N
     */
    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'name'    => 'required',
            'chatid' => 'required',
        ]);

        try {
            DB::beginTransaction();

            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'name' => $request->name,
                'chatid' => $request->chatid,
            ]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author A&N
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function Chart(Request $request)
    {
    }
}

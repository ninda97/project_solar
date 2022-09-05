<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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
        $result = DB::table('alertgroup')
        ->select(DB::raw('count(alertgroupid) as totalalert'), 
        DB::raw('count(case when status = 3 then 1 else null end) as totalwarning'), 
        DB::raw('count(case when status = 2 then 1 else null end) as totaldown'), 
        DB::raw('count(case when status = 13 then 1 else null end) as totalcritical'),
        DB::raw('count(distinct(trx_ticket.id)) as totalticket'))
        ->leftjoin('trx_ticket', 'trx_ticket.alertid', '=', 'alertgroup.alertid')
        ->get();

        return view('home', compact('result'));
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

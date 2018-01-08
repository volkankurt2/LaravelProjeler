<?php

namespace App\Http\Controllers;
use App\AdminProfileModel;
use App\Http\Middleware\User;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminGetController extends AdminController
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
     * @return \Illuminate\Http\Response
     */

    public function get_index()
    {
        //$ticket = Ticket::all();
        $ticket = DB::table('ticket')
            ->select('users.name as userName', 'title','message','status','ticket.ticketID','ticket_type.name as ticketTypeName')
            ->join('ticket_type', 'ticket_type.id', '=', 'ticket.ticket_type')
            ->join('users', 'users.id', '=', 'ticket.userID')
            ->orderBy('ticket.ticketID','DESC')
            ->get();

        return view('backend.index')->with('ticket',$ticket);
    }
    public function get_profile()
    {
        $userID = Auth::user()->id;
        $zeroWhere = ['status' => 0];
        $oneWhere = ['status' => 1];

        $adminProfile = AdminProfileModel::where('id',$userID)->select("*")->first();
        $adminProfile["acikTalepler"] = Ticket::where($oneWhere)->select("*")->count();
        $adminProfile["kapaliTalepler"] = Ticket::where($zeroWhere)->select("*")->count();
        return view('backend.profile')->with('adminProfile',$adminProfile);

    }
    public function get_ticketType_add()
    {
        return view('backend.addTicketType');
    }
}

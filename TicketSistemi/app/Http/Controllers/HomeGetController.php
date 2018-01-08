<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Ticket;
use App\TicketType;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeGetController extends HomeController
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
        $userID = Auth::user()->id;
        $ticket = DB::table('ticket')
            ->select('*')
            ->join('ticket_type', 'ticket_type.id', '=', 'ticket.ticket_type')
            ->where('ticket.userID', $userID)
            ->orderBy('ticket.ticketID','DESC')
            ->get();

        return view('frontend.index')->with('ticket',$ticket);
    }

    public function get_profile()
    {
        $userID = Auth::user()->id;

        $zeroWhere = ['userID' => $userID, 'status' => 0];
        $oneWhere = ['userID' => $userID, 'status' => 1];

        $userProfile = User::where('id',$userID)->select("users.*")->first();
        $userProfile["acikTalepler"] = Ticket::where($oneWhere)->select("ticket.*")->count();
        $userProfile["kapaliTalepler"] = Ticket::where($zeroWhere)->select("ticket.*")->count();
        return view('frontend.profile')->with('userProfile',$userProfile);
    }
    public function get_ticket()
    {

        return view('frontend.index');
    }
    public function get_CreateTicket()
    {
        $ticket_type = TicketType::all();
        return view('frontend.createTicket')->with('ticketType',$ticket_type);
    }

}

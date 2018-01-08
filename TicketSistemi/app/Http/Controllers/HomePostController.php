<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomePostController extends HomeController
{

    public function post_login()
    {
        return view('frontend.login');
    }
    public function post_profile(Request $request)
    {
        try
        {
            $userID = Auth::user()->id;
            unset($request['_token']);
            User::where('id',$userID)->update($request->all());
            return response(['durum'=>'success','baslik'=>'Başarılı','icerik'=>'Profiliniz başarıyla güncellendi.']);

        }
        catch (\Exception $e)
        {
            return response(['durum'=>'error','baslik'=>'Başarısız','icerik'=>'Güncelleme işlemi başarısız. Lütfen tekrar deneyin.']);
        }
    }
    public function post_ticket()
    {
        return view('frontend.index');
    }
    public function post_CreateTicket(Request $request)
    {
        try
        {
            $ticket = new Ticket();
            $ticket->userID = Auth::id();
            $ticket->ticket_type = $request->ticket_type;
            $ticket->title = $request->title;
            $ticket->message = $request->message;
            $ticket->status = 1; // 0:Kapalı, 1: Açık
            $ticket->save();
            return response(['durum'=>'success','baslik'=>'Başarılı','icerik'=>'Destek talebi başarıyla oluşturuldu.']);
        }
        catch (\Exception $e)
        {
            return response(['durum'=>'error','baslik'=>'Başarısız','icerik'=>'Talep oluşturulamadı, lütfen tekrar deneyin.']);
        }
    }
    public function post_DeleteTicket(Request $request)
    {
        try
        {
            DB::table('ticket')->where('ticketID', $request->ticketID)->delete();

            return response(['durum'=>'success','baslik'=>'Başarılı','icerik'=>'Destek talebi başarıyla silindi.']);
        }
        catch (\Exception $e)
        {
            return response(['durum'=>'error','baslik'=>'Başarısız','icerik'=>'Talep silinemedi, lütfen tekrar deneyin.']);
        }
    }
}

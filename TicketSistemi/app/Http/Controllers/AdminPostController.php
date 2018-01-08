<?php

namespace App\Http\Controllers;
use App\AdminProfileModel;
use App\Ticket;
use App\TicketType;
use App\User;
use \Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPostController extends AdminController
{
    public function post_index(Request $request)
    {
        switch ($request->islem)
        {
            case "sil":
                try
                {
                    DB::table('ticket')->where('ticketID', $request->ticketID)->delete();

                    return response(['durum'=>'success','baslik'=>'Başarılı','icerik'=>'Destek talebi başarıyla silindi.']);
                }
                catch (\Exception $e)
                {
                    return response(['durum'=>'error','baslik'=>'Başarısız','icerik'=>'Talep silinemedi, lütfen tekrar deneyin.']);
                }
                break;
            case 'duzenle':
                try
                {
                    $ticketID = $request->ticketID;
                    $status = $request->status;
                    DB::table('ticket')
                        ->where('ticketID', $ticketID)
                        ->limit(1)
                        ->update(array('status' => $status));
                    return response(['durum'=>'success','baslik'=>'Başarılı','icerik'=>'Destek talebi başarıyla güncellendi.']);
                }
                catch (\Exception $e)
                {
                    return response(['durum'=>'error','baslik'=>'Başarısız','icerik'=>'Talep güncellenemedi, lütfen tekrar deneyin.']);
                }
                break;
        }
    }
    public function post_profile(Request $request)
    {
        try
        {
            unset($request['_token']);
            $userID = Auth::user()->id;
            AdminProfileModel::where('id',$userID )->update($request->all());
            return response(['durum'=>'success','baslik'=>'Başarılı','icerik'=>'Profiliniz başarıyla güncellendi.']);

        }
        catch (\Exception $e)
        {
            return response(['durum'=>'error','baslik'=>'Başarısız','icerik'=>$e]);
        }
    }
    public function post_ticketType_add(Request $request)
    {
        try
        {
            $slug = str_slug($request->name);
            $request->merge(['slug'=>$slug]);
            TicketType::create($request->all());
            return response(['durum'=>'success','baslik'=>'Başarılı','icerik'=>'Destek talebi için yeni konu eklediniz.']);
        }
        catch (\Exception $e)
        {
            return response(['durum'=>'error','baslik'=>'Başarısız','icerik'=>'Güncelleme işlemi başarısız. Lütfen tekrar deneyin.']);
        }
    }


}

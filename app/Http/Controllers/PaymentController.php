<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    //
    public function payment(Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            "item_details" => array(
                [
                    "id" => "a05",
                    "price" => $request->get('harga'),
                    "quantity" => 1,
                    "name" => $request->get('nama_materi'),
                ]
            ),
            'customer_details' => array(
                'first_name' => Auth::User()->nama_lengkap,
                'last_name' => '',
                'email' => Auth::User()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        return view('action.payment', ['snap_token'=>$snapToken]);
    }

    public function payment_post(Request $request)
    {
        $json = json_decode($request->get('json'));
        $order = new Order();

        $order->status = $json->transaction_status;
        $order->name = Auth::User()->nama_lengkap;
        $order->email = Auth::User()->email;
        $order->number = "";
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $request->get('harga');
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code)? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url)? $json->pdf_url : null;

        DB::table('transaksi')->insert([
            'id_materi'=>$request->get('id_materi'),
            'id'=>Auth::User()->id,
            'modal_transaksi'=> Str::random(5),
        ]);

        return $order->save() ? redirect(url('/dashboardpelajar'))->with('alert-success', 'Order berhasil!') : redirect(url('/dashboardpelajar'))->with('alert-failed', 'Order bermasalah!');
    }

    public function proses_beli(Request $request)
    {
        DB::table('transaksi')->insert([
            'id_materi'=>$request->get('id_materi'),
            'id'=>Auth::User()->id,
            'modal_transaksi'=> Str::random(5),
        ]);

        return redirect("/dashboardpelajar");
    }
}

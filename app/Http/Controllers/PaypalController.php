<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Item;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Srmklive\PayPal\Services\AdaptivePayments;
use Srmklive\PayPal\Services\ExpressCheckout;
use Auth;
use App\UserCredit;
use DB;

class PaypalController extends Controller
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new ExpressCheckout();

    }

    public function index()
    {
        $creditos=DB::table("user_credit")->sum('credits');
        $id = Auth::id();
        $user = User::find($id);
        //dd($user);

        $msgError="";
        if(isset($_GET['cancel_invoice']))
        {
            $msgError="Tu compra no pudo ser completada";
        }
        $statusmsg="";
        if(isset($_GET['status']))
        {
            $statusmsg="Tus creditos se han cargado correctamente";
        }
        return view('paypal.index',compact('msgError','statusmsg','creditos','user'));
    }
    

    public function getIndex(Request $request)
    {
        $response = [];
        if (session()->has('code')) {
            $response['code'] = session()->get('code');
            session()->forget('code');
        }

        if (session()->has('message')) {
            $response['message'] = session()->get('message');
            session()->forget('message');
        }

        return view('welcome', compact('response'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getExpressCheckout(Request $request)
    {
        $recurring = ($request->get('mode') === 'recurring') ? true : false;
        $cart = $this->getCheckoutData($recurring,$_GET['plan']);

        try {
            $response = $this->provider->setExpressCheckout($cart, $recurring);
            return redirect($response['paypal_link']);
        } catch (\Exception $e) {
            //$invoice = $this->createInvoice($cart, 'Invalid');

            session()->put(['code' => 'danger', 'message' => "Error processing PayPal payment for Order $invoice->id!"]);
        }
    }

    /**
     * Process payment on PayPal.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getExpressCheckoutSuccess(Request $request)
    {
        $recurring = ($request->get('mode') === 'recurring') ? true : false;
        $token = $request->get('token');
        $payerID = $request->get('PayerID');
        $plan=$request->get('plan');
        $user_id=$request->get('user_id');

        //$cart = $this->getCheckoutData($recurring,1);

        // Verify Express Checkout Token
        $response = $this->provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            
                // Perform transaction on PayPal
                $cart = $this->getCheckoutData($recurring,$plan);
                $payment_status = $this->provider->doExpressCheckoutPayment($cart, $token, $payerID);
                $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];
                $invoice = $this->createInvoice($user_id, $plan,$token,$payerID);



            return redirect('/creditos?status=success');
        }
    }

    public function getAdaptivePay()
    {
        $this->provider = new AdaptivePayments();

        $data = [
            'receivers'  => [
                [
                    'email'   => 'johndoe@example.com',
                    'amount'  => 10,
                    'primary' => true,
                ],
                [
                    'email'   => 'janedoe@example.com',
                    'amount'  => 5,
                    'primary' => false,
                ],
            ],
            'payer'      => 'EACHRECEIVER', // (Optional) Describes who pays PayPal fees. Allowed values are: 'SENDER', 'PRIMARYRECEIVER', 'EACHRECEIVER' (Default), 'SECONDARYONLY'
            'return_url' => url('payment/success'),
            'cancel_url' => url('payment/cancel'),
        ];

        $response = $this->provider->createPayRequest($data);
        dd($response);
    }

    /**
     * Parse PayPal IPN.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function notify(Request $request)
    {
        if (!($this->provider instanceof ExpressCheckout)) {
            $this->provider = new ExpressCheckout();
        }

        $request->merge(['cmd' => '_notify-validate']);
        $post = $request->all();

        $response = (string) $this->provider->verifyIPN($post);

        $logFile = 'ipn_log_'.Carbon::now()->format('Ymd_His').'.txt';
        Storage::disk('local')->put($logFile, $response);
    }

    /**
     * Set cart data for processing payment on PayPal.
     *
     * @param bool $recurring
     *
     * @return array
     */
    protected function getCheckoutData($recurring = false,$plan)
    {
        $data = [];

        $order_id = UserCredit::all()->count() + 200;

        if ($recurring === true) {
            $data['items'] = [
                [
                    'name'  => 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id,
                    'price' => 0,
                    'qty'   => 1,
                ],
            ];

            $data['return_url'] = url('/paypal/ec-checkout-success?mode=recurring');
            $data['subscription_desc'] = 'Monthly Subscription '.config('paypal.invoice_prefix').' #'.$order_id;
        } else {

            $name="";
            $price=0;
            $credits=0;

            switch($plan)
            {
                case 1:
                $name="1 crédito - Survenia";
                $price=3;
                $credits=1;
                break;
                case 2:
                $name="10 créditos - Survenia";
                $price=25.5;
                $credits=10;
                break;
                case 3:
                $name="50 créditos - Survenia";
                $price=112.5;
                $credits=50;
                break;
                case 4:
                $name="100 créditos - Survenia";
                $price=195;
                $credits=100;
                break;
                case 5:
                $name="250 créditos - Survenia";
                $price=412.5;
                $credits=250;
                break;
                case 6:
                $name="500 créditos - Survenia";
                $price=600;
                $credits=500;
                break;
            }
            $data['items'] = [
                [
                    'name'  => $name,
                    'price' => $price,
                    'qty'   => 1,
                ]
            ];

            $data['return_url'] = url('/checkout-success?plan='.$plan.'&user_id='.Auth::user()->id);
        }

        $data['invoice_id'] = config('paypal.invoice_prefix').'_'.$order_id;
        $data['invoice_description'] = "Compra de créditos - Survenia";
        $data['cancel_url'] = url('/creditos?cancel_invoice=1');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $data['total'] = $total;

        return $data;
    }

    /**
     * Create invoice.
     *
     * @param array  $cart
     * @param string $status
     *
     * @return \App\Invoice
     */
    protected function createInvoice($userId, $plan,$paypalToken,$payerId)
    {
        $credits=0;

            switch($plan)
            {
                case 1:
                $credits=1;
                break;
                case 2:
                $credits=10;
                break;
                case 3:
                $credits=50;
                break;
                case 4:
                $credits=100;
                break;
                case 5:
                $credits=250;
                break;
                case 6:
                $credits=500;
                break;
            }

        $invoice = new UserCredit;
        $invoice->user_id=$userId;
        $invoice->credits=$credits;
        $invoice->paypalToken=$paypalToken;
        $invoice->payerId=$payerId;
        
        $invoice->save();

        return $invoice;
    }
    
}

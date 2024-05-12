<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\XController;
use App\Http\Controllers\XRecordsController;
use App\Http\Controllers\XLoad;
use App\Http\Controllers\XTR;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Redirect;



class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->except(['index','home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        
        $data = array();
        $data['pid_admin'] = 'Admin';
        $pid_user = Auth::user()->pid_user;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        //$data['product'] = DB::table('products')->where('xstatus',1)->where('pid_product',$pid_product)->first();//products
        
        //orders
        $data['my_orders_count'] = DB::table('orders')->where('xstatus',1)->where('pid_user', $pid_user)->where('order_type','RETAIL')->count();//counts
        $data['my_orders'] = DB::table('orders')->where('xstatus',1)->where('pid_user', $pid_user)->where('order_type','RETAIL')->orderBy('id','DESC')->limit(20)->get();//products
        $data['my_products'] = DB::table('products_ordered')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        
        //tranchepay
        //$data['my_tranchepays_count'] = DB::table('paystack_subscriptions')->where('xstatus',1)->where('pid_user', $pid_user)->count();//counts
        //$data['my_tranchepays'] = DB::table('paystack_subscriptions')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        $data['my_products'] = DB::table('products_ordered')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        
        //account details
        $data['my_account'] = DB::table('users')->where('xstatus',1)->where('pid_user', $pid_user)->first();//users account details      
    

        
        //////////////////// REQUIRED CORE DATA ////////////////////

        return view('pages/dashboard', $data);
    }
    
    
    
    
    
    public function account_details_update(Request $request)
    {

          //CUSTOMER RECORDS DATA
          $first_name = $request->first_name;
          $last_name = $request->last_name;
          $company_name = $request->company_name;
          $country = $request->country;
          $street = $request->street; 
          $apartment = $request->apartment;
          $city = $request->city;
          $state = $request->state;
          $phone = $request->phone;

        $data = array();
        $data['pid_admin'] = 'Admin';
        $pid_user = Auth::user()->pid_user;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        //$data['product'] = DB::table('products')->where('xstatus',1)->where('pid_product',$pid_product)->first();//products
        
        //orders
        $data['my_orders_count'] = DB::table('orders')->where('xstatus',1)->where('pid_user', $pid_user)->count();//counts
        $data['my_orders'] = DB::table('orders')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        $data['my_products'] = DB::table('products_ordered')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        
        //tranchepay
        //$data['my_tranchepays_count'] = DB::table('paystack_subscriptions')->where('xstatus',1)->where('pid_user', $pid_user)->count();//counts
        //$data['my_tranchepays'] = DB::table('paystack_subscriptions')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        $data['my_products'] = DB::table('products_ordered')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        
        //account details
        $data['my_account'] = DB::table('users')->where('xstatus',1)->where('pid_user', $pid_user)->first();//users account details 
        
        
              
              
          //UPDATE FOR RETURNING USERS RECORD 
          DB::table('users')
                ->where('pid_user', $pid_user)
                ->update([
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'company_name' => $company_name,
                    'phone' => $phone,
                    'country' => $country,
                    'state' => $state,
                    'city' => $city,
                    'street' => $street,
                    'apartment' => $apartment,
                    'xstatus' => 1,
					'updated_at' => now()
                    ]);
              

        
        //////////////////// REQUIRED CORE DATA ////////////////////

        return view('pages/dashboard', $data);
    }
    
    
    
    

    
    public function generate_subscription_update_link($plan_code)
    {


        $data = array();
        $data['pid_admin'] = 'Admin';
        $pid_user = Auth::user()->pid_user;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        //$data['product'] = DB::table('products')->where('xstatus',1)->where('pid_product',$pid_product)->first();//products
        
        //orders
        $data['my_orders_count'] = DB::table('orders')->where('xstatus',1)->where('pid_user', $pid_user)->count();//counts
        $data['my_orders'] = DB::table('orders')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        $data['my_products'] = DB::table('products_ordered')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        
        //tranchepay
        //$data['my_tranchepays_count'] = DB::table('paystack_subscriptions')->where('xstatus',1)->where('pid_user', $pid_user)->count();//counts
        //$data['my_tranchepays'] = DB::table('paystack_subscriptions')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        $data['my_products'] = DB::table('products_ordered')->where('xstatus',1)->where('pid_user', $pid_user)->orderBy('id','DESC')->limit(20)->get();//products
        
        //account details
        $data['my_account'] = DB::table('users')->where('xstatus',1)->where('pid_user', $pid_user)->first();//users account details    
        
        
        
            //GET PLAN DETAILS
              $curl = curl_init();
              
              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/plan/$plan_code",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Authorization: Bearer sk_live_e5338724a254f5f3fb0fed2bd2792c465d7d8d14",
                  "Cache-Control: no-cache",
                ),
              ));
              
              $response = curl_exec($curl);
              $err = curl_error($curl);
              
             
              
                //DECODE JSON DATA
                $json = json_decode($response);
                //$status = $json->status;//STATUS
                $message = $json->message;//MESSAGE
                //$data['next_payment'] = $json->data->subscriptions[0]->next_payment_date;//AUTHORIZATION URL


            if(isset($json->data->subscriptions[0]->next_payment_date)){
                $next_payment = $json->data->subscriptions[0]->next_payment_date;//get next payment date
                $subscription_code = $json->data->subscriptions[0]->subscription_code;//get the subscription code
                $status = 'Started';
            }else{
                $next_payment = 'No Subscription';
                $subscription_code = 'No Subscription';
                $status = 'Not Started';
                return view('pages/dashboard', $data);
            };
            
      
        
          //GENERATE SUBSCRIPTION UPDATE LINK
          $curl = curl_init();
          
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/subscription/$subscription_code/manage/link",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "Authorization: Bearer sk_live_e5338724a254f5f3fb0fed2bd2792c465d7d8d14",
              "Cache-Control: no-cache",
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
        
          curl_close($curl);
          
          
           //DECODE JSON DATA
          $json = json_decode($response);
         
         //check if paystack request was successful
          if($json->status == true){
                ///////////// DEFAULT DATA /////////////
                $status = $json->status;//STATUS
                $message = $json->message;//MESSAGE
                $subscription_update_link = $json->data->link;

                //redirect to paystack subscription update link
                return Redirect::to($subscription_update_link);
          }else{
              return view('pages/dashboard', $data);
          }

        
        //////////////////// REQUIRED CORE DATA ////////////////////

        
    }
    
    
    public function price_percentage_increase()
    {
        //MULTIPLY ALL COLUMN VALUES BY 10%
        $percentage_increase = 20;
        
        $pi = $percentage_increase / 100;
        DB::table('products')
        ->where('xstatus', 1)
        ->update([
            'product_price' => DB::raw("product_price + (product_price * $pi)")
        ]);
        dd('Price Update was Successfull!!!');
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}//end of class

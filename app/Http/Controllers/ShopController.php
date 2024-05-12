<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Http\Controllers\XISCode;
use App\Http\Controllers\XController;
use App\Http\Controllers\XRecordsController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\XLoad;
use App\Http\Controllers\XTR;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrdersCalculationController;

class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    */

    public function __construct()
    {
        //$this->middleware(['auth', 'verified'])->except(['index','home']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */


    

    //############################# SHOP INDEX #############################//
    public function shop()
    {

        $data = array();
        $data['pid_admin'] = 'Admin';
        //$pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders

        $data['products1'] = DB::table('products')->where('xstatus',1)->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products2'] = DB::table('products')->where('xstatus',1)->where('product_category','general')->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products3'] = DB::table('products')->where('xstatus',1)->where('product_category','analgesics')->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products4'] = DB::table('products')->where('xstatus',1)->where('product_category','antacids')->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products5'] = DB::table('products')->where('xstatus',1)->where('product_category','antianxiety_drugs')->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products6'] = DB::table('products')->where('xstatus',1)->where('product_category','antiarrhythmics')->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products7'] = DB::table('products')->where('xstatus',1)->where('product_category','antibacterials')->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products8'] = DB::table('products')->where('xstatus',1)->where('product_category','antibiotics')->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products9'] = DB::table('products')->where('xstatus',1)->where('product_category','anticoagulants_and_thrombolytics')->orderBy('seq','DESC')->limit(8)->get();//products
        $data['products10'] = DB::table('products')->where('xstatus',1)->where('product_category','vitamins_and_supplements')->orderBy('seq','DESC')->limit(8)->get();//products
                
        $data['product_featured'] = DB::table('products')->where('xstatus',1)->orderBy('featured_timestamp','DESC')->limit(1)->get();//product
        
        $data['products_featured1'] = DB::table('products')->where('xstatus',1)->where('product_category','general')->orderBy('featured_timestamp','DESC')->limit(3)->get();//products
        $data['products_featured2'] = DB::table('products')->where('xstatus',1)->where('product_category','analgesics')->orderBy('featured_timestamp','DESC')->limit(3)->get();//products
        $data['products_featured3'] = DB::table('products')->where('xstatus',1)->where('product_category','antacids')->orderBy('featured_timestamp','DESC')->limit(3)->get();//products
        $data['products_featured4'] = DB::table('products')->where('xstatus',1)->where('product_category','antianxiety_drugs')->orderBy('featured_timestamp','DESC')->limit(3)->get();//products
        $data['products_featured5'] = DB::table('products')->where('xstatus',1)->where('product_category','antiarrhythmics')->orderBy('featured_timestamp','DESC')->limit(3)->get();//products
        $data['products_featured6'] = DB::table('products')->where('xstatus',1)->where('product_category','antibacterials')->orderBy('featured_timestamp','DESC')->limit(3)->get();//products
        $data['products_featured7'] = DB::table('products')->where('xstatus',1)->where('product_category','antibiotics')->orderBy('featured_timestamp','DESC')->limit(3)->get();//products
        $data['products_featured10'] = DB::table('products')->where('xstatus',1)->where('product_category','vitamins_and_supplements')->orderBy('featured_timestamp','DESC')->limit(3)->get();//products
        //////////////////// REQUIRED CORE DATA ////////////////////

        //dd($data['product_featured']);
        return view('pages/shop', $data);exit;

    }
          







    //############################# SHOP DETAILS INDEX #############################//
    public function shop_product_details_view_index($product_slug, $product_category, $pid_product)
    {

        $data = array();
        $data['pid_admin'] = 'Admin';
        //$pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        $data['product'] = DB::table('products')->where('xstatus',1)->where('pid_product',$pid_product)->first();//products
        $data['products_related'] = DB::table('products')->where('xstatus',1)->where('pid_product', '<>', $pid_product)->where('product_category',$product_category)->orderBy('seq','DESC')->limit(16)->get();//products
        //////////////////// REQUIRED CORE DATA ////////////////////

        //dd($data['product_featured']);
        return view('pages/shop_product_details', $data);exit;

    }




    //############################# SHOP CATEGORY INDEX #############################//
    public function product_category_view_index($product_category)
    {

        $data = array();
        $data['pid_admin'] = 'Admin';
        //$pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        $data['category_name'] = str_replace('_',  ' ', $product_category);
        //$data['product'] = DB::table('products')->where('xstatus',1)->where('pid_product',$pid_product)->first();//products
        $data['products_category'] = DB::table('products')->where('xstatus',1)->where('product_category',$product_category)->orderBy('id','DESC')->limit(40)->get();//products
        //////////////////// REQUIRED CORE DATA ////////////////////

        return view('pages/shop_category', $data);exit;

    }





    //############################# SHOP CHECKOUT INDEX #############################//
    public function checkout_form_prox(Request $request)
    {


        
                $data = array();
                $data['pid_admin'] = 'Admin';
                //$pid_admin = Auth::user()->pid_admin;
                
                if(($request->purchase_quantity == '') || ($request->purchase_quantity == 0) || ($request->purchase_quantity < 1)){$request->purchase_quantity = 1;}
                $data['pid_product'] = $request->pid_product;
                $data['product_name'] = $request->product_name;
                $data['product_category'] = $request->product_category;
                $data['product_price'] = $request->product_price;
                $data['purchase_quantity'] = $request->purchase_quantity;
                $data['gold_rate'] = $request->gold_rate;
                $data['product_weight'] = $request->product_weight;
                $data['purity'] = $request->purity;
                $data['workmanship'] = $request->workmanship;
                $data['tax'] = $request->tax;
                $data['procurement_cost'] = $request->procurement_cost;
                $data['shipping_cost'] = $request->shipping_cost;
                $data['total_cost'] = $data['product_price'] * $data['purchase_quantity'];
                
        
                //////////////////// REQUIRED CORE DATA ////////////////////
                //heavy loaders
                //$data['product'] = DB::table('products')->where('xstatus',1)->where('pid_product',$pid_product)->first();//products
                //$data['products_related'] = DB::table('products')->where('xstatus',1)->where('product_category',$product_category)->orderBy('seq','DESC')->limit(16)->get();//products
                //////////////////// REQUIRED CORE DATA ////////////////////
        
                //dd($data['product_featured']);
                if($request->xbutton == 'buy'){return view('pages/shop_checkout', $data);exit;}
                if($request->xbutton == 'pss'){return view('pages/shop_tranchepay', $data);exit;}
        
        
        
        
        

    }







    //############################# PAYSTACK PAYMENT PROCESSING INDEX #############################//
    public function paystack_payment_processing(Request $request)
    {

              //CUSTOMER RECORDS DATA
              $pid_user = 'CUST'.XController::xhash(5).time();
              $first_name = $request->first_name;
              $last_name = $request->last_name;
              $company_name = $request->company_name;
              $country = $request->country;
              $street = $request->street; 
              $apartment = $request->apartment;
              $city = $request->city;
              $state = $request->state;
              $phone = $request->phone;
              $email = $request->email;
              $password = Hash::make($request->password);
              
              //ORDER RECORDS DATA
              $pid_order = 'QRD'.XController::xhash(5).time();
              $order_info = $request->order_info;
              $pid_product = $request->pid_product;
              $product_category = $request->product_category;
              $amount = ($request->total_cost * 100);
              //$amount = 1000;
              //PRODUCTS RECORDS DATA
              $pid_product = $request->pid_product;
              $data['productx'] = DB::table('products')->where('xstatus',1)->where('pid_product', $pid_product)->first();//products
                              
                              
                    
                    //check if value exists, then regenerate new value to avoid duplicate records
                    $user_not_exist = true;
                    $user_count = DB::table('users')->where('email', '=', $email)->count();
                    if($user_count == 1){
                    $user_not_exist = false;
                    }
    

    
              //INSERT USERS RECORD NEW USERS
              if($user_not_exist){
              DB::table('users')->insert(
				  [
                        'pid_user' => $pid_user,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'other_name' => null,
                        'company_name' => $company_name,
                        'email' => $email,
                        'phone' => $phone,
                        'role' => null,
                        'gender' => null,
                        'account_type' => null,
                        'country' => $country,
                        'state' => $state,
                        'city' => $city,
                        'street' => $street,
                        'apartment' => $apartment,
                        'cid' => null,
                        'login_status' => null,
                        'login_stamp' => null,
                        'ref_id' => null,
                        'status' => null,
                        'status1' => null,
                        'status2' => null,
                        'status3' => null,
                        'ext1' => null,
                        'ext2' => null,
                        'ext3' => null,
                        'xstatus' => 1,
                        'profile_image' => null,
                        'superuser' => null,
                        'active' => 'ACTIVE',
                        'email_verified_at' => now(),
                        'password' => $password,
                        'remember_token' => null,
                        'xstatus' => 1,
    					'created_at' => now(),
    					'updated_at' => now()
				  ]
			  );
              }else{
                  //$pid_user = Auth::user()->pid_user;
                  //UPDATE FOR RETURNING USERS RECORD 
                  DB::table('users')
                        //->where('pid_user', $pid_user)
                        ->where('email', $email)
                        ->where('xstatus', 1)
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
              }
                
			  
			  
               

              //INSERT ORDER RECORD
              DB::table('orders')->insert(
				  [
                        'pid_order' => $pid_order,
                        'pid_user' => $pid_user,
                        'order_name' => $pid_order,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'company_name' => $company_name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => null,
                        'country' => $country,
                        'state' => $state,
                        'street' => $street,
                        'apartment' => $apartment,
                        'city' => $city,
                        'order_info' => $order_info,
                        'order_type' => 'STORE_RETAIL_PURCHASE',
                        'order_currency_main' => 'NGN',
                        'order_total_cost' => $amount,
                        'status' => 'ATTEMPTED',
                        'xstatus' => 1,
    					'created_at' => now(),
    					'updated_at' => now()
				  ]
			  );
              
              
              
              
              //INSERT PRODUCTS ORDERED
              DB::table('products_ordered')->insert(
    				[
                        'pid_product' => $request->pid_product,
                        'pid_order' => $pid_order,
                        'pid_user' => $pid_user,
                        'pid_admin' => null,
                        'product_category' => $product_category,
                        'product_name' => $data['productx']->product_name,
                        'product_quantity' => $request->product_quantity,
                        'product_unit_price' => $data['productx']->product_price,
                        'product_weight' => null,
                        'product_info' => null,
                        'product_type' => 'SHOP',
                        'product_image' =>$data['productx']->product_image,
                        'xstatus' => 1,
    					'created_at' => now(),
    					'updated_at' => now()
    				]
    			);
    			
              
              
             //create sessions
             session(['email' => $email]);
             session(['first_name' => $first_name]);
             session(['pid_user' => $pid_user]);
             session(['pid_order' => $pid_order]);
             session(['pid_product' => $request->pid_product]);
             session(['amount' => $amount]);
             //session(['reference' => $reference]);
             session(['payment_type' => 'FULL_PAYMENT']);
             session(['service_type' => 'STORE_RETAIL_PURCHASE']);

              

          //PAYSTACK PAYMENT PROCESSING
          $url = "https://api.paystack.co/transaction/initialize";
          $callback_url = "https://accessmydrugs.com/paystack/callback.php";   
          
          $fields = [
            'callback_url' => $callback_url,
            'email' => $email,
            'amount' => $amount
          ];
        
          $fields_string = http_build_query($fields);
        
          //open connection
          $ch = curl_init();
          
          //set the url, number of POST vars, POST data
          curl_setopt($ch,CURLOPT_URL, $url);
          curl_setopt($ch,CURLOPT_POST, true);
          curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_7f07813d1c8519cb6258e3ed56173937430a3863",
            "Cache-Control: no-cache",
          ));
          
          //So that curl_exec returns the contents of the cURL; rather than echoing it
          curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
          
          //execute post
          $result = curl_exec($ch);
          //echo $result;
          
          //DECODE JSON DATA
          $json = json_decode($result);
         
         
         //check if paystack request was successful
          if($json->status == true){
                ///////////// DEFAULT DATA /////////////
                $status = $json->status;//STATUS
                $message = $json->message;//MESSAGE
                $auth_url = $json->data->authorization_url;//AUTHORIZATION URL
                $access_code = $json->data->access_code;//ACCESS CODE
                $reference_id = $json->data->reference;//REFERENCE ID
                
                session(['reference' => $reference_id]);
                
                //redirect to paystack payment url
                return Redirect::to($auth_url);
          }
          else{
                $data['payment_status'] = 'Payment Failed!';
                \Session::flash('success', 'Payment Failed!');
                //return redirect('order/order_request_pending/view/index');exit;
                return view('pages.payment-status-failed');
                //return redirect()->route('shop', $data);
          }
        

    }





    //############################# PAYSTACK CALLBACK PROCESSING #############################//
    public function paystack_callback_processing(Request $request, $trxref=null, $reference=null)
    {
            $trxref = $request->query('trxref');
            $reference = $request->query('reference');
            
            $email = session('email');
            $first_name = session('first_name');
            $amount = session('amount');
            $pid_user = session('pid_user');
            $pid_order = session('pid_order');
            $amount = session('amount');
            $reference = session('reference');
            $payment_type = session('payment_type');
            $service_type = session('service_type');
            
            
            //PAYMENT RECORDS DATA
            $pid_payment = 'PAY'.XController::xhash(5).time();
            
            
        
            

              $curl = curl_init();
      
              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Authorization: Bearer sk_test_7f07813d1c8519cb6258e3ed56173937430a3863",
                  "Cache-Control: no-cache",
                ),
              ));
              
              
              $response = curl_exec($curl);
              $err = curl_error($curl);
              curl_close($curl);
              
          
              //DECODE JSON DATA
              $json = json_decode($response);
             
              
              if ($err) {
                  $data['payment_status'] = 'Payment Failed!';              
                  $data['payment_message'] = $err;
                  return view('pages/payment-status', $data);exit;
              } else {
                  
                //INSERT PAYMENT RECORD
                DB::table('payment_records')->insert(
    				[
                        'pid_payment' => $pid_payment,
                        'pid_user' => $pid_user,
                        'pid_order' => $pid_order,
                        'trx_id' => $trxref,
                        'ref_id' => $reference,
                        'payment_status' => 'SUCCESS',
                        'currency_type' => 'NGN',
                        'payment_type' => $payment_type,
                        'amount' => $amount,
                        'affiliate_pay_status' => null,
                        'service_type' => $service_type,
                        'tx_date_processor' => null,
                        'tx_date_server' => null,
    					'created_at' => now(),
    					'updated_at' => now()
    				]
			    );
			    
			    
    			    //UPDATE ORDER STATUS TO PROCESSING 
                    DB::table('orders')
                            ->where('pid_order', $pid_order)
                            ->where('xstatus', 1)
                            ->update([
                                'status' => 'PROCESSING',
            					'updated_at' => now()
                                ]);
			    
			    
			        //if service is Tranche, then update
    			    if($service_type == 'TRANCHE'){
    			    $pid_subscription = session('pid_subscription');
                    //UPDATE SUBSCRIPTIONS RECORD 
                    DB::table('paystack_subscriptions')
                            ->where('pid_subscription', $pid_subscription)
                            ->where('xstatus', 1)
                            ->update([
                                'status' => 'STARTED',
                                'xstatus' => 1,
            					'updated_at' => now()
                                ]);
    			    }
			         
			        //ORDER PURCHASE MAIL
                    $email_title = 'AccessMyDrugs Order Purchase';
                    $message_title = 'Order has been successfully placed';
            
                    $message_body = "
                    Dear ".$first_name.",<br>
                    Your order with ID: <b>".$pid_order."</b> was successfuly placed and is currently under processing by the AMD team.<br><br>
                    A receipt of payment has also been forwarded to your registered mail.<br><br>
                    <b>Transaction Details</b><hr>
                    Reference: <b>".$reference."</b><br>
                    Order ID: <b>".$pid_order."</b><br>
                    Total Cost: <b>₦".number_format($amount/100)."</b>
                    <br><br>
                    Thank you. 
                    <br><br>
                    Kind Regards,<br>
                    ";

                
                
                ////////////////// EMAIL SENDER STARTS //////////////////
                    //mail body contents
                    $xdata = array();
                    $xdata['to'] = $email;
                    $xdata['email_title'] = $email_title;
                    $xdata['message_title'] = $message_title;
                    $xdata['message_body'] = $message_body;
                    //$xdata['message_designation'] = "<b>Nkwocha Tochukwu</b><br>Founder / CEO <br>";
                    $xdata['from'] = 'amd@accessmydrugs.com';
                    $xdata['message_designation'] = "<b>PROCESSING TEAM</b><br> AccessMyDrugs Order Processing Team<br>";
                    $xdata['mail_template'] = 'emails.general_email';
                    //send mail
                    $send_status = MailController::mailsend($xdata); //$send_status == 'SUCCESS' OR 'FAILED'
                ////////////////// EMAIL SENDER STOPS //////////////////
                            

                  
                  $data['payment_status'] = 'Payment was Successful!';              
                  $data['payment_message'] = 'Thank you for doing business with Us';
                  return view('pages/payment-status', $data);exit;
              }
    }
    






    //############################# PAYSTACK SUBSCRIPTION PROCESSING #############################//
    public function paystack_subscription_processing(Request $request)
    {

              
              //CUSTOMER RECORDS DATA
              $pid_user = 'CUST'.XController::xhash(5).time();
              $first_name = $request->first_name;
              $last_name = $request->last_name;
              $company_name = $request->company_name;
              $country = $request->country;
              $street = $request->street; 
              $apartment = $request->apartment;
              $city = $request->city;
              $state = $request->state;
              $phone = $request->phone;
              $email = $request->email;
              $password = Hash::make($request->password);
              
              //ORDER RECORDS DATA
              $pid_order = 'QRD'.XController::xhash(5).time();
              $order_info = $request->order_info;
              $pid_product = $request->pid_product;
              $product_quantity = $request->product_quantity;
              $product_category = $request->product_category;
              $amount = $request->total_cost;
              $installment = $request->installments;
              //$amount = 1000;
              
              $data['email'] = $email;
              $data['pid_order'] = $pid_order;
              $data['order_info'] = $order_info;
              $data['pid_product'] = $pid_product;
              $data['product_category'] = $product_category;
              $data['product_quantity'] = $product_quantity;
              $data['amount'] = $request->total_cost;
              $data['installment'] = $installment;
              $data['pid_user'] = $pid_user;
              $data['first_name'] = $first_name;
              
              
              //PRODUCTS RECORDS DATA
              $pid_product = $request->pid_product;
              $data['productx'] = DB::table('products')->where('xstatus',1)->where('pid_product', $pid_product)->first();//products
              $data['product_name'] = $data['productx']->product_name;
                              
                    
                    //check if value exists, then regenerate new value to avoid duplicate records
                    $user_not_exist = true;
                    $user_count = DB::table('users')->where('email', '=', $email)->count();
                    if($user_count == 1){
                    $user_not_exist = false;
                    }
    

    
              //INSERT USERS RECORD NEW USERS
              if($user_not_exist){
              DB::table('users')->insert(
				  [
                        'pid_user' => $pid_user,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'other_name' => null,
                        'company_name' => $company_name,
                        'email' => $email,
                        'phone' => $phone,
                        'role' => null,
                        'gender' => null,
                        'account_type' => null,
                        'country' => $country,
                        'state' => $state,
                        'city' => $city,
                        'street' => $street,
                        'apartment' => $apartment,
                        'cid' => null,
                        'login_status' => null,
                        'login_stamp' => null,
                        'ref_id' => null,
                        'status' => null,
                        'status1' => null,
                        'status2' => null,
                        'status3' => null,
                        'ext1' => null,
                        'ext2' => null,
                        'ext3' => null,
                        'xstatus' => 1,
                        'profile_image' => null,
                        'superuser' => null,
                        'active' => 'ACTIVE',
                        'email_verified_at' => now(),
                        'password' => $password,
                        'remember_token' => null,
                        'xstatus' => 1,
    					'created_at' => now(),
    					'updated_at' => now()
				  ]
			  );
              }else{
                  $pid_user = Auth::user()->pid_user;
                  //UPDATE FOR RETURNING USERS RECORD 
                  DB::table('users')
                        ->where('email', $email)
                        ->where('xstatus', 1)
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
              }
                
			  
			  
               

              //INSERT ORDER RECORD
              DB::table('orders')->insert(
				  [
                        'pid_order' => $pid_order,
                        'pid_user' => $pid_user,
                        'order_name' => $pid_order,
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'company_name' => $company_name,
                        'email' => $email,
                        'phone' => $phone,
                        'password' => null,
                        'country' => $country,
                        'state' => $state,
                        'street' => $street,
                        'apartment' => $apartment,
                        'city' => $city,
                        'order_info' => $order_info,
                        'order_type' => 'TRANCHE',
                        'order_currency_main' => 'NGN',
                        'order_total_cost' => $amount,
                        'status' => 'ATTEMPTED',
                        'xstatus' => 1,
    					'created_at' => now(),
    					'updated_at' => now()
				  ]
			  );
              
              
              
              
              //INSERT PRODUCTS ORDERED
              DB::table('products_ordered')->insert(
    				[
                        'pid_product' => $request->pid_product,
                        'pid_order' => $pid_order,
                        'pid_user' => $pid_user,
                        'pid_admin' => null,
                        'product_category' => $product_category,
                        'product_name' => $data['productx']->product_name,
                        'product_quantity' => $request->product_quantity,
                        'product_unit_price' => $data['productx']->product_price,
                        'product_weight' => null,
                        'product_info' => null,
                        'product_type' => 'TRANCHE',
                        'product_image' =>$data['productx']->product_image,
                        'xstatus' => 1,
    					'created_at' => now(),
    					'updated_at' => now()
    				]
    			);
    			
              
              
             //create sessions
             session(['email' => $email]);
             session(['first_name' => $first_name]);
             session(['pid_user' => $pid_user]);
             session(['pid_order' => $pid_order]);
             session(['pid_product' => $request->pid_product]);
             session(['amount' => $amount]);
             //session(['reference' => $reference]);
             session(['payment_type' => 'TRANCHE_PAYMENT']);
             session(['service_type' => 'TRANCHEPAY']);
              
              

              
              //TRANCHE CALCULATION
              if($data['installment'] == 3){
                $additional_amount = (2.5 / 100) * $data['amount'];
                $full_payment = $additional_amount + $data['amount'];
                $data['full_payment'] = $full_payment;
                $tranche_payment = $full_payment / 3;
                $data['tranche_payment'] = round($tranche_payment,2);
              }
              
              if($data['installment'] == 6){
                $additional_amount = (5 / 100) * $data['amount'];
                $full_payment = $additional_amount + $data['amount'];
                $data['full_payment'] = $full_payment;
                $tranche_payment = $full_payment / 6;
                $data['tranche_payment'] = round($tranche_payment,2);
              }
              
              if($data['installment'] == 10){
                $additional_amount = (7.5 / 100) * $data['amount'];
                $full_payment = $additional_amount + $data['amount'];
                $data['full_payment'] = $full_payment;
                $tranche_payment = $full_payment / 10;
                $data['tranche_payment'] = round($tranche_payment,2);
              }
              

              
              return view('pages/shop_tranchepay_details', $data);exit;
                              
    }
    
    
    
    
    
    
    //############################# PAYSTACK SUBSCRIPTION PROCESSING 2 #############################//
    public function paystack_subscription_processing2(Request $request)
    {
               
                $pid_subscription = 'SUB'.XController::xhash(5).time();
                $subscription_name = $request->product_name;
                $subscription_limit = $request->plan;
                $subscription_amount = $request->amount * 100; //amount in kobo
                $subscription_email = $request->email;
                $subscription_interval = "monthly";
                
                //$email = session('email');
                $first_name = session('first_name');
                //$amount = session('amount');
                $pid_user = session('pid_user');
                $pid_order = session('pid_order');
                $pid_product = session('pid_product');
                //$reference = session('reference');
                //$payment_type = session('payment_type');
                //$service_type = session('service_type');
            
                session(['pid_subscription' => $pid_subscription]);
     
              ////////// ::::: CREATE A PLAN ::::: //////////
              $url = "https://api.paystack.co/plan";
            
              $fields = [
                'name' => $subscription_name,
                'interval' => $subscription_interval, 
                'invoice_limit' => $subscription_limit,
                'amount' => $subscription_amount
              ];
            
              $fields_string = http_build_query($fields);
            
              //open connection
              $ch = curl_init();
              
              //set the url, number of POST vars, POST data
              curl_setopt($ch,CURLOPT_URL, $url);
              curl_setopt($ch,CURLOPT_POST, true);
              curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
              curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer sk_live_e5338724a254f5f3fb0fed2bd2792c465d7d8d14",
                "Cache-Control: no-cache",
              ));
              
              //So that curl_exec returns the contents of the cURL; rather than echoing it
              curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
              
              //execute post
              $result = curl_exec($ch);
              //echo $result;



              //json decode
              $json = json_decode($result);
             //dd($result);
              $plan_code = $json->data->plan_code;//AUTHORIZATION URL
             
             //check if paystack request was successful
              if($json->status == true){

                  
                                          //INSERT SUBSCRIPTIONS RECORD
                                          DB::table('paystack_subscriptions')->insert(
                                				[
                                                    'pid_subscription' => $pid_subscription,
                                                    'pid_user' => $pid_user,
                                                    'pid_order' => $pid_order,
                                                    'pid_product' => $pid_product,
                                                    'email' => $subscription_email,
                                                    'subscription_name' => $subscription_name,
                                                    'plan_code' => null,
                                                    'amount' => $subscription_amount,
                                                    'payment_interval' => $subscription_interval,
                                                    'charge_limit' => $subscription_limit,
                                                    'currency' => 'NGN',
                                                    'integration' => null,
                                                    'subscription_id' => null,
                                                    'status' => 'PENDING',
                                                    'xstatus' => 1,
                                					'created_at' => now(),
                                					'updated_at' => now()
                                				]
                                			);
                                      

                                              //json decode
                                              $json = json_decode($result);
                                              //$plan_code = $json->data->plan_code;//AUTHORIZATION URL
                                             
                                              //check if paystack request was successful
                                              if($json->status == true){
                                                                  ////////// ::::: CREATE A SUBSCRIPTION PAY AND INITIALIZE ::::: //////////
                                                                  $url = "https://api.paystack.co/transaction/initialize";
                                                                  $callback_url = "https://accessmydrugs.com/paystack/callback.php";   

                                                                  $fields = [
                                                                    'callback_url' => $callback_url,
                                                                    'email' => $subscription_email,
                                                                    'amount' => 10000,
                                                                    'plan' => $plan_code
                                                                  ];
                                                                
                                                                  $fields_string = http_build_query($fields);
                                                                
                                                                  //open connection
                                                                  $ch = curl_init();
                                                                  
                                                                  //set the url, number of POST vars, POST data
                                                                  curl_setopt($ch,CURLOPT_URL, $url);
                                                                  curl_setopt($ch,CURLOPT_POST, true);
                                                                  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                                                                  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                                                    "Authorization: Bearer sk_live_e5338724a254f5f3fb0fed2bd2792c465d7d8d14",
                                                                    "Cache-Control: no-cache",
                                                                  ));
                                                                  
                                                                  //So that curl_exec returns the contents of the cURL; rather than echoing it
                                                                  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                                                                  
                                                                  //execute post
                                                                  $result = curl_exec($ch);
                                                                  //echo $result;
                                                    
                                                                  //DECODE JSON DATA
                                                                  $json = json_decode($result);
                                                                 
                                                                 //check if paystack request was successful
                                                                  if($json->status == true){
                                                                        ///////////// DEFAULT DATA /////////////
                                                                        $status = $json->status;//STATUS
                                                                        $message = $json->message;//MESSAGE
                                                                        $auth_url = $json->data->authorization_url;//AUTHORIZATION URL
                                                                        $access_code = $json->data->access_code;//ACCESS CODE
                                                                        $reference_id = $json->data->reference;//REFERENCE ID
                                                                        
                                                                        session(['reference' => $reference_id]);
                                                                        session(['service_type' => 'TRANCHE']);
                                                                        session(['pid_subscription' => $pid_subscription ]);
                                                                        
                                                                        //UPDATE SUBSCRIPTIONS RECORD 
                                                                        DB::table('paystack_subscriptions')
                                                                                ->where('pid_subscription', $pid_subscription)
                                                                                ->where('xstatus', 1)
                                                                                ->update([
                                                                                    'plan_code' => $plan_code,
                                                                                    'xstatus' => 1,
                                                                					'updated_at' => now()
                                                                                    ]);
                                                                                     
                                                                        //redirect to paystack payment url
                                                                        return Redirect::to($auth_url);
                                                                  }
                                                  
                                              }
                  
                                     }
            

              
              
              
              


    }    
    
    
    
    //############################# PAYSTACK PAY SUBSCRIPTION #############################//
    public function pay_subscription(Request $request)
    {
        
                                      $email = Auth::user()->email;
                                      $plan_code = $request->plan_code;
                                      $pid_subscription = $request->pid_subscription;
                                    
                                      ////////// ::::: CREATE A SUBSCRIPTION PAY AND INITIALIZE ::::: //////////
                                      $url = "https://api.paystack.co/transaction/initialize";
                                      $callback_url = "https://accessmydrugs.com/paystack/callback.php";   

                                      $fields = [
                                        'callback_url' => $callback_url,
                                        'email' => $email,
                                        'amount' => 10000,
                                        'plan' => $plan_code
                                      ];
                                    
                                      $fields_string = http_build_query($fields);
                                    
                                      //open connection
                                      $ch = curl_init();
                                      
                                      //set the url, number of POST vars, POST data
                                      curl_setopt($ch,CURLOPT_URL, $url);
                                      curl_setopt($ch,CURLOPT_POST, true);
                                      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
                                      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                                        "Authorization: Bearer sk_live_e5338724a254f5f3fb0fed2bd2792c465d7d8d14",
                                        "Cache-Control: no-cache",
                                      ));
                                      
                                      //So that curl_exec returns the contents of the cURL; rather than echoing it
                                      curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
                                      
                                      //execute post
                                      $result = curl_exec($ch);
                                      //echo $result;
                        
                                      //DECODE JSON DATA
                                      $json = json_decode($result);
                                     
                                     //check if paystack request was successful
                                      if($json->status == true){
                                            ///////////// DEFAULT DATA /////////////
                                            $status = $json->status;//STATUS
                                            $message = $json->message;//MESSAGE
                                            $auth_url = $json->data->authorization_url;//AUTHORIZATION URL
                                            $access_code = $json->data->access_code;//ACCESS CODE
                                            $reference_id = $json->data->reference;//REFERENCE ID
                                            
                                            session(['reference' => $reference_id]);
                                            session(['service_type' => 'TRANCHE']);
                                            session(['pid_subscription' => $pid_subscription ]);
                                            
                                            //UPDATE SUBSCRIPTIONS RECORD 
                                            DB::table('paystack_subscriptions')
                                                    ->where('pid_subscription', $pid_subscription)
                                                    ->where('xstatus', 1)
                                                    ->update([
                                                        'plan_code' => $plan_code,
                                                        'xstatus' => 1,
                                    					'updated_at' => now()
                                                        ]);
                                                         
                                            //redirect to paystack payment url
                                            return Redirect::to($auth_url);
                                      }
        
    }
    
    
    
    
    
    
    
    



    //############################# SHOP PAY INDEX #############################//
    public function xpay_form_prox(Request $request)
    {

        $data = array();
        $data['pid_admin'] = 'Admin';
        //$pid_admin = Auth::user()->pid_admin;
        
        if(($request->purchase_quantity == '') || ($request->purchase_quantity == 0) || ($request->purchase_quantity < 1)){$request->purchase_quantity = 1;}
        $data['pid_product'] = $request->pid_product;
        
        //$data['product_name'] = $request->product_name;
        //$data['product_category'] = $request->product_category;
        //$data['product_price'] = $request->product_price;
        //$data['purchase_quantity'] = $request->purchase_quantity;
        //$data['gold_rate'] = $request->gold_rate;
        //$data['product_weight'] = $request->product_weight;
        //$data['purity'] = $request->purity;
        //$data['workmanship'] = $request->workmanship;
        //$data['tax'] = $request->tax;
        //$data['procurement_cost'] = $request->procurement_cost;
        //$data['shipping_cost'] = $request->shipping_cost;
        
        
        //ADDRESS DETAILS
        $data['country'] = $request->country;
        $data['state'] = $request->state;
        $data['city'] = $request->city;
        $data['street'] = $request->street;
        $data['apartment'] = $request->apartment;
        $data['full_address'] = $data['apartment'].','.$data['street'].','.$data['city'].','.$data['state'].','.$data['country'];
        
        
        //PAYSTACK REQUIREMENTS
        $data['email'] = $request->email;
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['amount'] = $request->total_cost;
        $data['delivery_address'] = $data['full_address'];
        

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        //$data['product'] = DB::table('products')->where('xstatus',1)->where('pid_product',$pid_product)->first();//products
        //$data['products_related'] = DB::table('products')->where('xstatus',1)->where('product_category',$product_category)->orderBy('seq','DESC')->limit(16)->get();//products
        //////////////////// REQUIRED CORE DATA ////////////////////

        return view('pages/shop_pay', $data);exit;

    }





    //############################# SHOP SEARCH INDEX #############################//
    public function shop_search(Request $request)
    {

        $data = array();
        $data['pid_admin'] = 'Admin';
        //$pid_admin = Auth::user()->pid_admin;
        
        $search_key = $request->search_key;
        $data['search_key'] = $search_key;

        if($search_key == ''){
                $data['products_search'] = DB::table('products')->where('xstatus',1)->orderBy('id','DESC')->limit(40)->get();//products
        }else{
                $data['products_search'] = DB::table('products')
                    ->orwhere('product_category','LIKE','%'.$search_key.'%')
                    ->orwhere('product_category','LIKE', $search_key.'%')
                    ->orWhere('product_name','LIKE','%'.$search_key.'%')
                    ->orWhere('product_name','LIKE', $search_key.'%')
                    ->orWhere('product_description','LIKE','%'.$search_key.'%')
                    ->orWhere('product_description','LIKE', $search_key.'%')
                    ->orderBy('id','DESC')->limit(40)->get();//products
        }

        

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        //$data['product'] = DB::table('products')->where('xstatus',1)->where('pid_product',$pid_product)->first();//products
        //$data['products_related'] = DB::table('products')->where('xstatus',1)->where('product_category',$product_category)->orderBy('seq','DESC')->limit(16)->get();//products
        //////////////////// REQUIRED CORE DATA ////////////////////

        //dd($data['product_featured']);
        return view('pages/shop_search', $data);exit;

    }









    //############################# SHOP PAGE INDEX #############################//
    public function faq()
    {

        $data = array();
        $data['pid_admin'] = 'Admin';
        //$pid_admin = Auth::user()->pid_admin;

        return view('pages/faq', $data);exit;

    }






























     
    //############################# POST CREATE INDEX #############################//
    public function product_create_form_index()
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        //heavy loaders
        //$data['orders'] = XLoad::records('orders');
        //$data['counts'] = XLoad::records('counts');
        $data['pid_admin'] = $pid_admin;
        //////////////////// REQUIRED CORE DATA ////////////////////


        return view('pages/product_create_form_index', $data);exit;

    }




    //############################# POST CREATE PROX #############################//
    public function product_create_form_prox(Request $request)
    {
   
        $data = array();
        $admin_name = Auth::user()->name;
        //$admin_name = Auth::user()->first_name.' '.Auth::user()->last_name;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['admin_name'] = $admin_name;
        //heavy loaders
        //$data['orders'] = XLoad::records('orders');
        //$data['counts'] = XLoad::records('counts');
        //$data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////


        //:::::::::: SAVE IMAGE STARTS :::::::::://
        //stores files in defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex = XController::xfile($request, 'product_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'product_image', 'N');
        //:::::::::: SAVE IMAGE STOPS :::::::::://

        $pid_product =  'PRD'.XController::xhash(5).time();//generate random post id

        $slug = \Str::slug($request->product_name);//convert title to slug

        //check if slug already exists, then regenerate new value to avoid duplicate records
        $slug_check = DB::table('products')->where('pid_product', '=', $pid_product)->where('xstatus', '=', 1)->count();
        while($slug_check >= 1){
            $slug = $slug.'-'.XIScode::xHashNumeric(3);
            $slug_check = DB::table('products')->where('xstatus', '=', 1)->count();
        }

        if((DB::table('products')->latest('seq')->first('seq')) == null){$seq = 0;}else{
        $seq = (int)(DB::table('products')->latest('seq')->first('seq')->seq) + 10;//record sequence update
        }
        $seq = (int)$seq;

            DB::table('products')->insert(
				[
                    'pid_product' => $pid_product,
					'seq' => $seq,
					'pid_admin' => $admin_name,
					'product_name' => $request->input('product_name'),
                    'product_slug' => $slug,
					'product_category' => $request->input('product_category'),
					'product_description' => $request->input('product_description'),
                    'product_summary' => $request->input('product_summary'),
                    'product_tags' => $request->input('product_tags'),
                    'product_quantity' => $request->input('product_weight'),
					'shipping_cost' => $request->input('shipping_cost'),
                    'tax' => $request->input('tax'),
                    'expiry_date' => '',
                    'gold_rate' => 500,
                    'purity' => 85,
                    'workmanship' => 50,
					'product_visibility' => $request->input('product_visibility'),
                    'product_image' => $filex['name'],
                    'product_status' => '',
                    'xstatus' => 1,
                    'ext1' => '',
                    'ext2' => '',
                    'ext3' => '',
					'created_at' => now(),
					'updated_at' => now()
				]
			);


        $data['products'] = DB::table('products')->where('xstatus',1)->orderBy('seq','DESC')->get();//products

        \Session::flash('success','Product has been Successfully Added!');
        //return redirect()->route('product_view_table_index', $data);
        return redirect()->route('dashboard', $data);
        //return view('pages/post_view_table_index', $data);exit;

    }




    //############################# POST UPDATE INDEX #############################//
    public function post_update_form_index($pid_post)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;
        $author_name = Auth::user()->first_name.' '.Auth::user()->last_name;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //$data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////

        $data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();//load single record


        return view('pages/post_update_form_index', $data);exit;

    }



    //############################# POST UPDATE PROX #############################//
    public function post_update_form_prox(Request $request)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        $pid_post = $request->pid_post;
        $data['posts'] = DB::table('posts')->where('xstatus',1)->orderBy('seq','DESC')->get();//load all posts

        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');

        //:::::::::: UPDATE IMAGE STARTS :::::::::://
        //stores files in defualt directory: "storage/app/image" 
        //get file name using $file_name = $filex['name']
        //XController::xfile(REQUEST-DATA, FILE-ELEMENT-NAME, FILE-TYPES-ALLOWED, FILE-SIZE, FILE-LOCATION-IN-STORAGE, REQUIRED(Y=Yes, N=No))
        $filex = XController::xfile($request, 'post_image', 'jpg,png,gif,svg,JPG,PNG,GIF,SVG', 2000, 'post_image', 'N');
		if ($filex['name'] != null){
            DB::table('posts')
                    ->where('pid_post', '=', $pid_post)
                    ->update(['post_image' => $filex['name'],]);}
        //:::::::::: UPDATE IMAGE STOPS :::::::::://
        
        $slug = \Str::slug($request->post_title);//convert title to slug


        $slug = $slug.'-'.XIScode::xHashNumeric(3);


        DB::table('posts')
                ->where('pid_post', $pid_post)
                ->where('xstatus', 1)
                ->update([
                        'seq' => $request->seq,
                        'pid_admin' => $pid_admin, 
                        'post_title' => $request->post_title,
                        'post_slug' => $slug,
                        'post_article' => $request->post_article,
                        'post_tags' => $request->post_tags,
                        'post_description' => $request->post_description,
                        'status' => $request->publish_post,
                        'updated_at' => now()
                    ]);


            \Session::flash('success','Article has been Successfully Updated!');
            return redirect()->route('post_view_table_index', $data);
            //return routes('post_view_table_index')->with($data);
            //return view('pages/post_view_table_index', $data);exit;

    }






     //############################# POST DELETE PROX #############################//
     public function post_delete_record_prox(Request $request)
     {
 
         $data = array();
         $pid_admin = Auth::user()->pid_admin;
 
         $pid_order = $request->pid_order;
         $pid_user = $request->pid_user;
         $pid_post = $request->pid_post;

        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
         //////////////////// REQUIRED CORE DATA ////////////////////
         //light loaders
         $data['post'] = DB::table('posts')->where('pid_post',$pid_post)->first();

         DB::table('posts')
                    ->where('pid_post', $pid_post)
                    ->delete();


         \Session::flash('success', 'Article has been successfully deleted!');
         //return redirect('order/order_request_pending/view/index');exit;
         return redirect()->route('post_view_table_index', $data);
         //return view('pages/post_view_table_index', $data);exit;
 
     }   




    //############################# POST VIEW TABLE INDEX #############################//
    public function post_view_table_index()
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //LIGHT LOADER
        //$data['user'] = XRecordsController::records('user');
        $data['posts'] = DB::table('posts')->where('xstatus',1)->orderBy('seq','DESC')->get();
        //$data['posts'] = DB::table('posts')->where('status','published')->where('xstatus',1)->get();
        //////////////////// REQUIRED CORE DATA ////////////////////


        return view('pages/post_view_table_index', $data);exit;

    }


    //############################# POST VIEW TABLE INDEX #############################//
    public function post_view_list_index($post_slug)
    {

        $data = array();
        $pid_admin = Auth::user()->pid_admin;

        //////////////////// REQUIRED CORE DATA ////////////////////
        $data['pid_admin'] = $pid_admin;
        //heavy loaders
        $data['orders'] = XLoad::records('orders');
        $data['counts'] = XLoad::records('counts');
        //LIGHT LOADER
        //$data['user'] = XRecordsController::records('user');
        $data['post'] = DB::table('posts')->where('post_slug', $post_slug)->where('xstatus',1)->first();
        //////////////////// REQUIRED CORE DATA ////////////////////


        return view('pages/post_view_list_index', $data);exit;

    }





    public function testx()
    {
dd('THE TEST LINK IS OK');
        DB::table('products')
                ->where('product_category', 'GOLD_BRACELETS')
                ->where('xstatus', 1)
                ->update([
                        'product_category' => 'GOLD_BANGLES',
                    ]);


}





        





////////////////////// END OF CONTROLLER ///////////////////////
}


@extends('layouts.base_shop')


@section('title', "Dashboard")


<!-- MAIN PAGE CONTENT STARTS -->
@section('content')

        <!---------------------------------------------------------->
        


<section class="main_content_area">
        <div class="container">
            <div class="account_dashboard">
                <div class="row">
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <!-- Nav tabs -->
                        <div class="dashboard_tab_button">
                            <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tab">
                                <li><a href="#dashboard" data-toggle="tab" class="nav-link active" aria-selected="true" role="tab">Dashboard</a></li>
                                <li> <a href="#orders" data-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Orders (<b>{{ $my_orders_count ?? 0}}</b>) </a></li>
                                <li><a href="#tranchepay" data-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Installments (<b>{{ $my_tranchepays_count ?? 0}}</b>) </a></li>
                                <li><a href="#address" data-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Shipping Address</a></li>
                                <li><a href="#account-details" data-toggle="tab" class="nav-link" aria-selected="false" role="tab" tabindex="-1">Account details</a></li>
                            </ul>
                            <ul role="tablist" class="nav flex-column dashboard-list" id="nav-tabx">
                                <li><a href="{{ route('logout') }}" class="nav-link" aria-selected="xfalse" role="xtab" tabindex="x-1">logout</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-9 col-lg-9">
                        <!-- Tab panes -->
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel">
                                <h3>Dashboard </h3>
                                <p> Welcome <b>{{ Auth::user()->first_name ?? '' }}</b> to your account dashboard. you can easily check &amp; view your <i>recent orders</i>, manage your <i>shipping and billing addresses</i> and <i>Edit your account details.</i></p>
                            </div>
                            
                            

                            
                            
                                                        @if(("my_tranchepays_count" == "my_tranchepays_count"))
                                                            <b> No Records available</b>
                                                        @endif
                           
                                    
                                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                                    <h3>Orders</h3>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Image</th>
                                                                    <th>Status</th>
                                                                    <th>Quantity</th>
                                                                    <th>Unit Price</th>
                                                                    <!--<th>Actions</th>-->
                                                                </tr>  
                                                            </thead>
                                                            <tbody>
                                                                
                                                            @foreach($my_orders as $order)
                                                                 @foreach($my_products as $product)
                                                                    @if($order->pid_order == $product->pid_order)
                                                                        <tr>
                                                                            <td>{{ $order->order_name }}</td>
                                                                            <td><a class="primary_img" href=""><img src='{{ URL::asset('https://admin3.spreaditglobal.com/storage/app/product_image') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp' alt=""></a></td>
                                                                            <td><span class="success"><i>Completed</i></span></td>
                                                                            <td> {{ $product->product_quantity }} </td>
                                                                            <td> ₦{{ number_format($product->product_unit_price) }} </td>
                                                                            <!--<td> View </td>-->
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                            
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                        
                            
                            
                        
                        
                        
                                                <div class="tab-pane fade" id="tranchepay" role="tabpanel">
                                                    <h3>Tranchepay Subscriptions</h3>
                                                    <div class="table-responsive">
                                                        No Records
                                                    </div>
                                                </div>
                        
                            
                            
                            
                            <div class="tab-pane" id="address" role="tabpanel">
                                
                                <h3 class="billing-address">Billing address</h3>
                               <p>The following addresses will be used on the checkout page by default.</p>
                                
                                <p><strong>{{ $my_account->first_name ?? "" }} {{ $my_account->last_name ?? "" }}</strong><br>
                                <i>{{ $my_account->email ?? "" }}</i>
                                </p>
                                
                                <address>
                                    {{ $my_account->apartment ?? "" }}<br>
                                    {{ $my_account->street ?? "" }} <br>
                                    {{ $my_account->city ?? "" }}<br>
                                    {{ $my_account->state ?? "" }} <br>
                                </address>
                                    <p>{{ $my_account->country ?? "" }}</p>
                            </div>
                            
                            
                            <div class="tab-pane fade" id="account-details" role="tabpanel">
                                <h3>Account details </h3>
                                <div class="login">
                                    <div class="login_form_container">
                        
                        
                        
                        
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-10 col-md-10">
                        <form method="post" action="{{ route('account_details_update'); }}"  enctype="multipart/form-data">
                            @csrf
                                            
                            <h3>Billing & Shipping Details</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name='first_name' value="{{ Auth::user()->first_name ?? '' }}" required>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name <span>*</span></label required>
                                    <input type="text" name='last_name' value="{{ Auth::user()->last_name ?? '' }}" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Company Name (Optional)</label>
                                    <input type="text" name='company_name' value="{{ Auth::user()->company_name ?? '' }}" >
                                </div>
                                
                                
                                <div class="col-12 mb-20">
                                    <label for="country">country <span>*</span></label>
                            <!-- Country names and Country Name -->
<select class="niceselect_option" id="country" name="country" required>
    
    @php
        $country = Auth::user()->country ?? '' ;
    @endphp
    
    @if(($country != "") || ($country != null))
        <option value="{{ Auth::user()->country ?? '' }}" selected>{{ Auth::user()->country ?? '' }}</option>
    @endif
    
    <option value="">country</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Afghanistan">Afghanistan</option>
    <option value="Aland Islands">Aland Islands</option>
    <option value="Albania">Albania</option>
    <option value="Algeria">Algeria</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Andorra">Andorra</option>
    <option value="Angola">Angola</option>
    <option value="Anguilla">Anguilla</option>
    <option value="Antarctica">Antarctica</option>
    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="Argentina">Argentina</option>
    <option value="Armenia">Armenia</option>
    <option value="Aruba">Aruba</option>
    <option value="Australia">Australia</option>
    <option value="Austria">Austria</option>
    <option value="Azerbaijan">Azerbaijan</option>
    <option value="Bahamas">Bahamas</option>
    <option value="Bahrain">Bahrain</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="Barbados">Barbados</option>
    <option value="Belarus">Belarus</option>
    <option value="Belgium">Belgium</option>
    <option value="Belize">Belize</option>
    <option value="Benin">Benin</option>
    <option value="Bermuda">Bermuda</option>
    <option value="Bhutan">Bhutan</option>
    <option value="Bolivia">Bolivia</option>
    <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="Botswana">Botswana</option>
    <option value="Bouvet Island">Bouvet Island</option>
    <option value="Brazil">Brazil</option>
    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="Brunei Darussalam">Brunei Darussalam</option>
    <option value="Bulgaria">Bulgaria</option>
    <option value="Burkina Faso">Burkina Faso</option>
    <option value="Burundi">Burundi</option>
    <option value="Cambodia">Cambodia</option>
    <option value="Cameroon">Cameroon</option>
    <option value="Canada">Canada</option>
    <option value="Cape Verde">Cape Verde</option>
    <option value="Cayman Islands">Cayman Islands</option>
    <option value="Central African Republic">Central African Republic</option>
    <option value="Chad">Chad</option>
    <option value="Chile">Chile</option>
    <option value="China">China</option>
    <option value="Christmas Island">Christmas Island</option>
    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
    <option value="Colombia">Colombia</option>
    <option value="Comoros">Comoros</option>
    <option value="Congo">Congo</option>
    <option value="Congo, Democratic Republic of the Congo">Congo, Democratic Republic of the Congo</option>
    <option value="Cook Islands">Cook Islands</option>
    <option value="Costa Rica">Costa Rica</option>
    <option value="Cote D'Ivoire">Cote D'Ivoire</option>
    <option value="Croatia">Croatia</option>
    <option value="Cuba">Cuba</option>
    <option value="Curacao">Curacao</option>
    <option value="Cyprus">Cyprus</option>
    <option value="Czech Republic">Czech Republic</option>
    <option value="Denmark">Denmark</option>
    <option value="Djibouti">Djibouti</option>
    <option value="Dominica">Dominica</option>
    <option value="Dominican Republic">Dominican Republic</option>
    <option value="Ecuador">Ecuador</option>
    <option value="Egypt">Egypt</option>
    <option value="El Salvador">El Salvador</option>
    <option value="Equatorial Guinea">Equatorial Guinea</option>
    <option value="Eritrea">Eritrea</option>
    <option value="Estonia">Estonia</option>
    <option value="Ethiopia">Ethiopia</option>
    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
    <option value="Faroe Islands">Faroe Islands</option>
    <option value="Fiji">Fiji</option>
    <option value="Finland">Finland</option>
    <option value="France">France</option>
    <option value="French Guiana">French Guiana</option>
    <option value="French Polynesia">French Polynesia</option>
    <option value="French Southern Territories">French Southern Territories</option>
    <option value="Gabon">Gabon</option>
    <option value="Gambia">Gambia</option>
    <option value="Georgia">Georgia</option>
    <option value="Germany">Germany</option>
    <option value="Ghana">Ghana</option>
    <option value="Gibraltar">Gibraltar</option>
    <option value="Greece">Greece</option>
    <option value="Greenland">Greenland</option>
    <option value="Grenada">Grenada</option>
    <option value="Guadeloupe">Guadeloupe</option>
    <option value="Guam">Guam</option>
    <option value="Guatemala">Guatemala</option>
    <option value="Guernsey">Guernsey</option>
    <option value="Guinea">Guinea</option>
    <option value="Guinea-Bissau">Guinea-Bissau</option>
    <option value="Guyana">Guyana</option>
    <option value="Haiti">Haiti</option>
    <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
    <option value="Honduras">Honduras</option>
    <option value="Hong Kong">Hong Kong</option>
    <option value="Hungary">Hungary</option>
    <option value="Iceland">Iceland</option>
    <option value="India">India</option>
    <option value="Indonesia">Indonesia</option>
    <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
    <option value="Iraq">Iraq</option>
    <option value="Ireland">Ireland</option>
    <option value="Isle of Man">Isle of Man</option>
    <option value="Israel">Israel</option>
    <option value="Italy">Italy</option>
    <option value="Jamaica">Jamaica</option>
    <option value="Japan">Japan</option>
    <option value="Jersey">Jersey</option>
    <option value="Jordan">Jordan</option>
    <option value="Kazakhstan">Kazakhstan</option>
    <option value="Kenya">Kenya</option>
    <option value="Kiribati">Kiribati</option>
    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
    <option value="Korea, Republic of">Korea, Republic of</option>
    <option value="Kosovo">Kosovo</option>
    <option value="Kuwait">Kuwait</option>
    <option value="Kyrgyzstan">Kyrgyzstan</option>
    <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
    <option value="Latvia">Latvia</option>
    <option value="Lebanon">Lebanon</option>
    <option value="Lesotho">Lesotho</option>
    <option value="Liberia">Liberia</option>
    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
    <option value="Liechtenstein">Liechtenstein</option>
    <option value="Lithuania">Lithuania</option>
    <option value="Luxembourg">Luxembourg</option>
    <option value="Macao">Macao</option>
    <option value="Macedonia, the Former Yugoslav Republic of">Macedonia, the Former Yugoslav Republic of</option>
    <option value="Madagascar">Madagascar</option>
    <option value="Malawi">Malawi</option>
    <option value="Malaysia">Malaysia</option>
    <option value="Maldives">Maldives</option>
    <option value="Mali">Mali</option>
    <option value="Malta">Malta</option>
    <option value="Marshall Islands">Marshall Islands</option>
    <option value="Martinique">Martinique</option>
    <option value="Mauritania">Mauritania</option>
    <option value="Mauritius">Mauritius</option>
    <option value="Mayotte">Mayotte</option>
    <option value="Mexico">Mexico</option>
    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
    <option value="Moldova, Republic of">Moldova, Republic of</option>
    <option value="Monaco">Monaco</option>
    <option value="Mongolia">Mongolia</option>
    <option value="Montenegro">Montenegro</option>
    <option value="Montserrat">Montserrat</option>
    <option value="Morocco">Morocco</option>
    <option value="Mozambique">Mozambique</option>
    <option value="Myanmar">Myanmar</option>
    <option value="Namibia">Namibia</option>
    <option value="Nauru">Nauru</option>
    <option value="Nepal">Nepal</option>
    <option value="Netherlands">Netherlands</option>
    <option value="Netherlands Antilles">Netherlands Antilles</option>
    <option value="New Caledonia">New Caledonia</option>
    <option value="New Zealand">New Zealand</option>
    <option value="Nicaragua">Nicaragua</option>
    <option value="Niger">Niger</option>
    <option value="Nigeria">Nigeria</option>
    <option value="Niue">Niue</option>
    <option value="Norfolk Island">Norfolk Island</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Norway">Norway</option>
    <option value="Oman">Oman</option>
    <option value="Pakistan">Pakistan</option>
    <option value="Palau">Palau</option>
    <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
    <option value="Panama">Panama</option>
    <option value="Papua New Guinea">Papua New Guinea</option>
    <option value="Paraguay">Paraguay</option>
    <option value="Peru">Peru</option>
    <option value="Philippines">Philippines</option>
    <option value="Pitcairn">Pitcairn</option>
    <option value="Poland">Poland</option>
    <option value="Portugal">Portugal</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Qatar">Qatar</option>
    <option value="Reunion">Reunion</option>
    <option value="Romania">Romania</option>
    <option value="Russian Federation">Russian Federation</option>
    <option value="Rwanda">Rwanda</option>
    <option value="Saint Barthelemy">Saint Barthelemy</option>
    <option value="Saint Helena">Saint Helena</option>
    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="Saint Lucia">Saint Lucia</option>
    <option value="Saint Martin">Saint Martin</option>
    <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
    <option value="Samoa">Samoa</option>
    <option value="San Marino">San Marino</option>
    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
    <option value="Saudi Arabia">Saudi Arabia</option>
    <option value="Senegal">Senegal</option>
    <option value="Serbia">Serbia</option>
    <option value="Serbia and Montenegro">Serbia and Montenegro</option>
    <option value="Seychelles">Seychelles</option>
    <option value="Sierra Leone">Sierra Leone</option>
    <option value="Singapore">Singapore</option>
    <option value="Sint Maarten">Sint Maarten</option>
    <option value="Slovakia">Slovakia</option>
    <option value="Slovenia">Slovenia</option>
    <option value="Solomon Islands">Solomon Islands</option>
    <option value="Somalia">Somalia</option>
    <option value="South Africa">South Africa</option>
    <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
    <option value="South Sudan">South Sudan</option>
    <option value="Spain">Spain</option>
    <option value="Sri Lanka">Sri Lanka</option>
    <option value="Sudan">Sudan</option>
    <option value="Suriname">Suriname</option>
    <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
    <option value="Swaziland">Swaziland</option>
    <option value="Sweden">Sweden</option>
    <option value="Switzerland">Switzerland</option>
    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
    <option value="Tajikistan">Tajikistan</option>
    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
    <option value="Thailand">Thailand</option>
    <option value="Timor-Leste">Timor-Leste</option>
    <option value="Togo">Togo</option>
    <option value="Tokelau">Tokelau</option>
    <option value="Tonga">Tonga</option>
    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="Tunisia">Tunisia</option>
    <option value="Turkey">Turkey</option>
    <option value="Turkmenistan">Turkmenistan</option>
    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
    <option value="Tuvalu">Tuvalu</option>
    <option value="Uganda">Uganda</option>
    <option value="Ukraine">Ukraine</option>
    <option value="United Arab Emirates">United Arab Emirates</option>
    <option value="United Kingdom">United Kingdom</option>
    <option value="United States">United States</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="Uruguay">Uruguay</option>
    <option value="Uzbekistan">Uzbekistan</option>
    <option value="Vanuatu">Vanuatu</option>
    <option value="Venezuela">Venezuela</option>
    <option value="Viet Nam">Viet Nam</option>
    <option value="Virgin Islands, British">Virgin Islands, British</option>
    <option value="Virgin Islands, U.s.">Virgin Islands, U.s.</option>
    <option value="Wallis and Futuna">Wallis and Futuna</option>
    <option value="Western Sahara">Western Sahara</option>
    <option value="Yemen">Yemen</option>
    <option value="Zambia">Zambia</option>
    <option value="Zimbabwe">Zimbabwe</option>
</select>
                                </div>
                                

                                <div class="col-12 mb-20">
                                    <label>Street address <span>*</span></label>
                                    <input placeholder="House number and street name" type="text" name='street' value="{{ Auth::user()->street ?? '' }}" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name='apartment' value="{{ Auth::user()->apartment ?? '' }}">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text" name='city' value="{{ Auth::user()->city ?? '' }}" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>State  <span>*</span></label>
                                    <input type="text" name='state' value="{{ Auth::user()->state ?? '' }}" required>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name='phone' value="{{ Auth::user()->phone ?? '' }}" required>

                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Email Address <span>*</span></label>
                                    <input type="text" name='email'  id='email' value="{{ Auth::user()->email ?? '' }}" disabled>
                                </div>
                                
                                                                <hr><br>

    
                                <div class="order_button">
                                    <button class="button" type="submit" name="xbutton" value="pss" style='color:#ffc354; background-color:#303030' onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#ffc354'" >Update Details</button>
                                </div>
 
                                
        
                                

                            </div>
                        </form>
                    </div>
                    
                    
                    
                    
                    
                    
          
                    
                    
                    
                    
                    
    
                </div>
            </div>                        
                        
                        
                        
                        
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    

        <!---------------------------------------------------------->

@endsection 
<!-- MAIN PAGE CONTENT STOPS -->



<?php $__env->startSection('title', 'Checkout'); ?>


<!-- MAIN PAGE CONTENT STARTS -->
<?php $__env->startSection('content'); ?>

        <!---------------------------------------------------------->
    
<div class="Checkout_section mt-32">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="user-actions">
                        <h3> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning collapsed" href="#checkout_login" data-bs-toggle="collapse" aria-expanded="false">Click here to login</a>     

                        </h3>
                         <div id="checkout_login" class="collapse" data-parent="#accordion" style="">
                            <div class="checkout_info">
                                <p>If you have shopped or registered with us before, please follow the login link below.</p>
                                <!--<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>-->  
                                 <a href="/login"><b>Login Here</b></a>
                                 <!--<form method="post" action="<?php echo e(route('login')); ?>"  enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                    <div class="form_group">
                                        <label>Username or email <span>*</span></label>
                                        <input type="text">     
                                    </div>
                                    <div class="form_group">
                                        <label>Password  <span>*</span></label>
                                        <input type="text">     
                                    </div> 
                                    <div class="form_group group_3 ">
                                        <button type="submit">Login</button>
                                        <label for="remember_box">
                                            <input id="remember_box" type="checkbox">
                                            <span> Remember me </span>
                                        </label>     
                                    </div>
                                    <a href="#">Lost your password?</a>
                                </form>  -->
                                
                            </div>
                        </div>    
                    </div>
                    <div class="user-actions">
                        <h3> 
                            <i class="fa fa-file-o" aria-hidden="true"></i>
                            Returning customer?
                            <a class="Returning collapsed" href="#checkout_coupon" data-bs-toggle="collapse" aria-expanded="false">Click here to enter your code</a>     

                        </h3>
                         <div id="checkout_coupon" class="collapse" data-parent="#accordion" style="">
                            <div class="checkout_info coupon_info">
                                <form action="#">
                                    <input placeholder="Coupon code" type="text">
                                    <button type="submit">Apply coupon</button>
                                </form>
                            </div>
                        </div>    
                    </div> 
                </div>
            </div>
            
            
            
            
            
            
            <div class="checkout_form">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form method="post" action="<?php echo e(route('paystack_payment_processing')); ?>"  enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                                            
                            <h3>Billing & Shipping Details</h3>
                            <div class="row">

                                <div class="col-lg-6 mb-20">
                                    <label>First Name <span>*</span></label>
                                    <input type="text" name='first_name' value="<?php echo e(Auth::user()->first_name ?? ''); ?>" required>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Last Name <span>*</span></label required>
                                    <input type="text" name='last_name' value="<?php echo e(Auth::user()->last_name ?? ''); ?>" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Company Name (Optional)</label>
                                    <input type="text" name='company_name' value="<?php echo e(Auth::user()->company_name ?? ''); ?>" >
                                </div>
                                
                                
                                <div class="col-12 mb-20">
                                    <label for="country">country <span>*</span></label>
                            <!-- Country names and Country Name -->
                            <select class="niceselect_option" id="country" name="country" required>
    
    <?php
        $country = Auth::user()->country ?? '' ;
    ?>
    
    <?php if(($country != "") || ($country != null)): ?>
        <option value="<?php echo e(Auth::user()->country ?? ''); ?>" selected><?php echo e(Auth::user()->country ?? ''); ?></option>
    <?php endif; ?>
    
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
                                    <input placeholder="House number and street name" type="text" name='street' value="<?php echo e(Auth::user()->street ?? ''); ?>" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name='apartment' value="<?php echo e(Auth::user()->apartment ?? ''); ?>">
                                </div>
                                <div class="col-12 mb-20">
                                    <label>Town / City <span>*</span></label>
                                    <input type="text" name='city' value="<?php echo e(Auth::user()->city ?? ''); ?>" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label>State  <span>*</span></label>
                                    <input type="text" name='state' value="<?php echo e(Auth::user()->state ?? ''); ?>" required>
                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label>Phone<span>*</span></label>
                                    <input type="text" name='phone' value="<?php echo e(Auth::user()->phone ?? ''); ?>" required>

                                </div>
                                <div class="col-lg-6 mb-20">
                                    <label> Email Address <span>*</span></label>
                                    <input type="text" name='email'  id='email' value="<?php echo e(Auth::user()->email ?? ''); ?>" required>

                                </div>
                                <div class="col-12 mb-20">
                                    <input id="account" type="checkbox" data-target="createp_account">
                                    <label for="account" data-bs-toggle="collapse" href="#collapseOne" aria-controls="collapseOne" class="" aria-expanded="true">Create an account?</label>
                                    <div id="collapseOne" class="one collapse hide" data-parent="#accordion" style="">
                                        <div class="card-body1">
                                            <label> Account password <span>*</span></label>
                                            <input placeholder="password" type="password" name='password'>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <!--
                                <div class="col-12 mb-20">
                                    <input id="address" type="checkbox" data-target="createp_account">
                                    <label class="righ_0 collapsed" for="address" data-bs-toggle="collapse" href="#collapsetwo" aria-controls="collapsetwo" aria-expanded="false">Ship to a different address?</label>

                                    <div id="collapsetwo" class="one collapse" data-parent="#accordion" style="">
                                        <div class="row">
                                            <div class="col-lg-6 mb-20">
                                                <label>First Name <span>*</span></label>
                                                <input type="text">
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <label>Last Name <span>*</span></label>
                                                <input type="text">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>Company Name</label>
                                                <input type="text">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="select_form_select">
                                                    <label for="country">country <span>*</span></label>
                                    
 


                                                    <div class="nice-select niceselect_option" tabindex="0"><span class="current">bangladesh</span><ul class="list"><li data-value="2" class="option selected">bangladesh</li><li data-value="3" class="option">Algeria</li><li data-value="4" class="option">Afghanistan</li><li data-value="5" class="option">Ghana</li><li data-value="6" class="option">Albania</li><li data-value="7" class="option">Bahrain</li><li data-value="8" class="option">Colombia</li><li data-value="9" class="option">Dominican Republic</li></ul></div>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-20">
                                                <label>Street address <span>*</span></label>
                                                <input placeholder="House number and street name" type="text">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>Town / City <span>*</span></label>
                                                <input type="text">
                                            </div>
                                            <div class="col-12 mb-20">
                                                <label>State / County <span>*</span></label>
                                                <input type="text">
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <label>Phone<span>*</span></label>
                                                <input type="text">

                                            </div>
                                            <div class="col-lg-6">
                                                <label> Email Address <span>*</span></label>
                                                <input type="text">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                -->
                                
                                
                                <div class="col-12">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery." name='order_info'></textarea>
                                    </div>
                                </div>
                            </div>
                        <!--</form>-->
                    </div>
                    
                    
                    
                    
                    
                    
          
                    
                    
                    
                    
                    
                    
                    <div class="col-lg-6 col-md-6">
                        <!--<form action="#">-->
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Unit Cost</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <?php echo e($product_name); ?> <strong> × <?php echo e($purchase_quantity); ?></strong></td>
                                            <td> <?php echo e(number_format($product_price)); ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <!--<tr>
                                            <th>Cart Subtotal</th>
                                            <td>$215.00</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td><strong>$5.00</strong></td>
                                        </tr>-->
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td><strong>₦<?php echo e(number_format($total_cost)); ?></strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            
                            
                            
                            <div class="payment_method">
                                
                                
                                <input type='hidden' name='pid_product' value='<?php echo e($pid_product); ?>' />
                                <input type='hidden' name='product_quantity' value='<?php echo e($purchase_quantity); ?>' />
                                <input type='hidden' name='total_cost' value='<?php echo e($total_cost); ?>' />
                                <input type='hidden' name='product_category' value='<?php echo e($product_category); ?>' />

                                
                                <!--<div class="panel-default">
                                    <input id="payment" name="check_method" type="radio" data-target="createp_account">
                                    <label for="payment" data-bs-toggle="collapse" href="#method" aria-controls="method" class="" aria-expanded="true">Create an account?</label>

                                    <div id="method" class="one collapse show" data-parent="#accordion" style="">
                                        <div class="card-body1">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </div>
                                </div>-->
                                
                                <div class="panel-default">
                                    <!--<input id="payment_defult" name="check_method" type="radio" data-target="createp_account">-->
                                    <label for="payment_defult" data-bs-toggle="collapse" href="#collapsedefult" aria-controls="collapsedefult">Paystack &nbsp; <img src="assets/img/icon/paystack.png?a=5" alt=""></label>

                                </div>
                                

                                <hr>

    
                                <div class="order_button">
                                    <button class="button" type="submit" style='color:#252304;' onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#252304'" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pay Now &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                </div>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    
    
    

        <!---------------------------------------------------------->

<?php $__env->stopSection(); ?> 
<!-- MAIN PAGE CONTENT STOPS -->



<?php echo $__env->make('layouts.base_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\accessmydrugs.com\resources\views/pages/shop_checkout.blade.php ENDPATH**/ ?>
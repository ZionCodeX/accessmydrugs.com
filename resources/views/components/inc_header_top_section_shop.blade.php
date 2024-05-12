    <!--header area start-->
    <header class="header_area header_padding">
        <!--header top start-->
        <div class="header_top top_two">
            <div class="container">
                <div class="top_inner">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="follow_us">
                                <label>Follow Us:</label>
                                <ul class="follow_link">
                                    <li><a href="https://web.facebook.com/accessmydrugs" target='_blanc'><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/accessmydrugs" target='_blanc'><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/accessmydrugs" target='_blanc'><i class="ion-social-instagram"></i></a></li>
                                    <!--<li><a href="https://www.instagram.com/#" target='_blanc'><i class="ion-social-googleplus"></i></a></li>-->
                                    <li><a href="https://www.youtube.com/accessmydrugs" target='_blanc'><i class="ion-social-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="top_right text-end">
                                <ul>
                                    <li class="top_links">
                                        
                                        <a href="#">
                                            <i class="ion-android-person"></i> 
                                                @if (Auth::check())
                                                     Hi <b>{{ Auth::user()->first_name ?? '' }}</b>
                                                @else
                                                    My Account
                                                @endif
                                            <i class="ion-ios-arrow-down"></i>
                                        </a>
                                        
                                        <ul class="dropdown_links">

                                            <!--<li><a href="#">Shopping Cart</a></li>-->
                                            <li><a href="#">Checkout </a></li>
                                            @if (Auth::check())
                                                <li><a href="/dashboard">My Account </a></li>
                                                <li><a href="/dashboard#orders">Orders</a></li>
                                                <li><a href="/logout">Logout</a></li>
                                            @else
                                                  <li><a href="/login"><b>Login</b></a></li>
                                                  <li><a href="/register"><b>SignUp</b></a></li>
                                            @endif
                                            <!--<li><a href="wishlist.html">Wishlist</a></li>-->
                                        </ul>
                                    </li>
                                    <li class="language"><a href="#"><img src="assets/img/logo/language.png" alt="">en-gb<i class="ion-ios-arrow-down"></i></a>
                                        <ul class="dropdown_language">
                                            <li><a href="#"><img src="assets/img/logo/language.png" alt=""> English</a></li>
                                            <!--<li><a href="#"><img src="assets/img/logo/language2.png" alt=""> Germany</a></li>-->
                                        </ul>
                                    </li>
                                    <li class="currency"><a href="#">₦ NGN<i class="ion-ios-arrow-down"></i></a>
                                        <ul class="dropdown_currency">
                                            <li><a href="#">NGN – Naira</a></li>
                                            <!--<li><a href="#">EUR – Euro</a></li>
                                            <li><a href="#">GBP – British Pound</a></li>
                                            <li><a href="#">INR – India Rupee</a></li>-->
                                        </ul>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header top start-->




        <!--header middel start-->
        <div class="header_middle middle_two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="/"><img src="../../assets/img/logo/logo.png?k=5" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="middel_right">
                            <div class="search-container search_two">
                                <form method="post" action="{{ route('shop_search'); }}"  enctype="multipart/form-data">
                                     @csrf
                                    <div class="search_box">
                                        <input placeholder="Search entire store here ..." type="text" name='search_key' required>
                                        <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="middel_right_info">

                                <!--<div class="header_wishlist">
                                    <a href="/wishlist"><span class="lnr lnr-heart"></span> Wish list </a>
                                    <span class="wishlist_quantity">3</span>
                                </div>-->
                                <div class="mini_cart_wrapper">
                                    <a REMOVEhref="javascript:void(0)"><span class="lnr lnr-cart"></span>My Cart </a>
                                    <span class="cart_quantity">0</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->



        
        <!--mini cart-->
        <!--<div class="mini_cart">
            <div class="cart_close">
                <div class="cart_text">
                    <h3>cart</h3>
                </div>
                <div class="mini_cart_close">
                    <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">JBL Flip 3 Splasroof Portable Bluetooth 2</a>

                    <span class="quantity">Qty: 1</span>
                    <span class="price_cart">$60.00</span>

                </div>
                <div class="cart_remove">
                    <a href="#"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="cart_item">
                <div class="cart_img">
                    <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                </div>
                <div class="cart_info">
                    <a href="#">Koss Porta Pro On Ear Headphones </a>
                    <span class="quantity">Qty: 1</span>
                    <span class="price_cart">$69.00</span>
                </div>
                <div class="cart_remove">
                    <a href="#"><i class="ion-android-close"></i></a>
                </div>
            </div>
            <div class="mini_cart_table">
                <div class="cart_total">
                    <span>Sub total:</span>
                    <span class="price">$138.00</span>
                </div>
                <div class="cart_total mt-10">
                    <span>total:</span>
                    <span class="price">$138.00</span>
                </div>
            </div>

            <div class="mini_cart_footer">
                <div class="cart_button">
                    <a href="cart.html">View cart</a>
                </div>
                <div class="cart_button">
                    <a class="active" href="checkout.html">Checkout</a>
                </div>

            </div>

        </div>-->
        <!--mini cart end-->
        

    </header>
    <!--header area end-->
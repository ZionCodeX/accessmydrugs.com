  <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <span>MENU</span>
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">

                        <div class="canvas_close">
                            <a href="#"><i class="ion-android-close"></i></a>
                        </div>


                        <div class="top_right text-end">
                            <ul>
                                <li class="top_links">
                                        
                                        <a href="#"><i class="ion-android-person"></i> 
                                            @if (Auth::check())
                                                 Hi <b>{{ Auth::user()->first_name ?? '' }}</b>
                                            @else
                                                My Account
                                            @endif
                                        <i class="ion-ios-arrow-down"></i></a>
                                        
                                        <ul class="dropdown_links">
                                            <li><a href="/dashboard">My Account </a></li>
                                            <li><a href="/orders">Orders</a></li>
                                            <li><a href="#">Shopping Cart</a></li>
                                            <li><a href="#">Checkout </a></li>
                                            @if (Auth::check())
                                                 <li><a href="/logout">Logout</a></li>
                                            @else
                                                  <hr>
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
                        
                        <div class="Offcanvas_follow">
                            <label>Follow Us:</label>
                            <ul class="follow_link">
                                    <li><a href="https://web.facebook.com/accessmydrugs" target='_blanc'><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/accessmydrugs" target='_blanc'><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="https://www.instagram.com/accessmydrugs" target='_blanc'><i class="ion-social-instagram"></i></a></li>
                                    <!--<li><a href="https://www.instagram.com/#" target='_blanc'><i class="ion-social-googleplus"></i></a></li>-->
                                    <li><a href="https://www.youtube.com/accessmydrugs" target='_blanc'><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                        
                        <div class="search-container">
                            <form method="post" action="{{ route('shop_search'); }}"  enctype="multipart/form-data">
                                     @csrf
                                <div class="search_box">
                                    <input placeholder="Search entire store here ..." type="text" name='search_key' required>
                                    <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                </div>
                            </form>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                        <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                            <a href="#">XHome</a>
                                            <ul class="sub-menu" style="display: none;">
                                                        <li><a href="https://accessmydrugs.com" target='_blanc'>Home</a></li>
                                                        <li class="home7new"><a href="https://blog.accessmydrugs.com">Blog</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/about">About</a></li>
                                        <li><a href="/faq">FAQ</a></li>
                                        <li><a href="/contact"> Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    
    
    
    
    
  
  
  
        <!--header bottom satrt-->
        <div class="header_bottom bottom_two sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="header_bottom_container">
                            <div class="categories_menu">
                                
                                <div class="categories_title">
                                    <h2 class="categori_toggle">Browse categories</h2>
                                </div>
                                
                                <div class="categories_menu_toggle">
                                    <ul>
                                        <!--<li><a href="#GOLD_NECKLACES_AND_EARINGS"> Gold Necklaces & Earings </a></li>-->
                                        <!--<li><a href="#GOLD_BRACELETS">Gold Bracelets</a></li>--> 
                                        <li><a href="https://accessmydrugs.com/product/category/GENERAL">General</a></li>
                                        <li><a href="https://accessmydrugs.com/product/category/ANALGESICS">Analgesics</a></li>
                                        <li><a href="https://accessmydrugs.com/product/category/ANTACIDS">Antacids</a></li>
                                        <li><a href="https://accessmydrugs.com/product/category/ANTIANXIETY_DRUGS">Antianxiety_drugs</a></li>
                                        <li><a href="https://accessmydrugs.com/product/category/ANTIARRHYTHMICS">Antiarrhythmics</a></li>
                                        <li><a href="https://accessmydrugs.com/product/category/ANTIBACTERIALS">Antibacterials</a></li>
                                        <li><a href="https://accessmydrugs.com/product/category/ANTIBIOTICS">Antibiotics</a></li>
                                        <li><a href="https://accessmydrugs.com/product/category/ANTICOAGULANTS_AND_THROMBOLYTICS">Anticoagulants_and_thrombolytics</a></li>
                                        <!--<li><a href="#"> Engine Parts</a></li>
                                        <li class="hidden"><a href="shop-left-sidebar.html">New Sofas</a></li>
                                        <li class="hidden"><a href="shop-left-sidebar.html">Sleight Sofas</a></li>
                                        <li><a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a></li>-->
                                    </ul>
                                </div>
                            </div>
                            <div class="main_menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.html">Home<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu">
                                                <li><a href="https://accessmydrugs.com" target='_blanc'>Home</a></li>
                                                <li class="home7new"><a href="https://blog.accessmydrugs.com">Blog</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="/about">About</a></li>
                                        <li><a href="/faq">FAQ</a></li>
                                        <li><a href="/contact"> Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--header bottom end-->

    </header>
    <!--header area end-->
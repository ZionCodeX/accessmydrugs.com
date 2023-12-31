
@extends('layouts.base_shop')


@section('title', "$product->product_name")


<!-- MAIN PAGE CONTENT STARTS -->
@section('content')

        <!---------------------------------------------------------->
        



<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/" _msttexthash="46891" _msthash="137">Home</a></li>
                            <li _msttexthash="429858" _msthash="138">Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>        
        
        
        
<div class="product_details mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">

                        <div id="img-1" class="zoomWrapper single-zoom">
                            <!--<a href="#">-->
                                <img id="zoom1" src='{{ URL::asset('https://admin.accessmydrugs.com/public/storage/images') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp")' data-zoom-image='{{ URL::asset('https://admin.accessmydrugs.com/storage/app/product_image') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp' alt="big-1">
                            <!--</a>-->
                        </div>



                    <!--
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active owl-loaded owl-drag" id="gallery_01">

                                
                            <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(-910px, 0px, 0px); transition: all 0s ease 0s; width: 1456px;"><div class="owl-item cloned" style="width: 167px; margin-right: 15px;"><li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product10.jpg" data-zoom-image="assets/img/product/product10.jpg">
                                        <img src="assets/img/product/product10.jpg" alt="zo-th-1">
                                    </a>

                                </li></div><div class="owl-item cloned" style="width: 167px; margin-right: 15px;"><li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product13.jpg" data-zoom-image="assets/img/product/product13.jpg">
                                        <img src="assets/img/product/product13.jpg" alt="zo-th-1">
                                    </a>

                                </li></div><div class="owl-item" style="width: 167px; margin-right: 15px;"><li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product8.jpg" data-zoom-image="assets/img/product/product8.jpg">
                                        <img src="assets/img/product/product8.jpg" alt="zo-th-1">
                                    </a>

                                </li></div><div class="owl-item" style="width: 167px; margin-right: 15px;"><li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product9.jpg" data-zoom-image="assets/img/product/product9.jpg">
                                        <img src="assets/img/product/product9.jpg" alt="zo-th-1">
                                    </a>

                                </li></div><div class="owl-item" style="width: 167px; margin-right: 15px;"><li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product10.jpg" data-zoom-image="assets/img/product/product10.jpg">
                                        <img src="assets/img/product/product10.jpg" alt="zo-th-1">
                                    </a>

                                </li></div><div class="owl-item active" style="width: 167px; margin-right: 15px;"><li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product13.jpg" data-zoom-image="assets/img/product/product13.jpg">
                                        <img src="assets/img/product/product13.jpg" alt="zo-th-1">
                                    </a>

                                </li></div><div class="owl-item cloned active" style="width: 167px; margin-right: 15px;"><li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product8.jpg" data-zoom-image="assets/img/product/product8.jpg">
                                        <img src="assets/img/product/product8.jpg" alt="zo-th-1">
                                    </a>

                                </li></div><div class="owl-item cloned" style="width: 167px; margin-right: 15px;"><li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="assets/img/product/product9.jpg" data-zoom-image="assets/img/product/product9.jpg">
                                        <img src="assets/img/product/product9.jpg" alt="zo-th-1">
                                    </a>

                                </li></div></div></div><div class="owl-nav"><div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div></div><div class="owl-dots disabled"></div></ul>
                        </div>-->
                    </div>
                </div>
                
                
                
                
                
                
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form method="post" action="{{ route('checkout_form_prox'); }}"  enctype="multipart/form-data">
                            @csrf

                            <h1>{{ $product->product_name }}</h1>
                            <div class="product_nav">
                                <ul>
                                    <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <li><b>Quantity in Stock: </b> {{ $product->product_quantity }}</li>
                            <div class=" product_ratting">
                                <ul>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li><a href="#"><i class="fa fa-star"></i></a></li>
                                    <li class="review"><a href="#"> (customer review ) </a></li>
                                </ul>

                            </div>
                            <div class="price_box">
                                <span class="current_price">₦{{ number_format($product->product_price) }}</span>
                                <!--<span class="old_price">$80.00</span>-->

                            </div>
                            
                                <style>
                                    p {
                                         height: 30%;
                                         overflow: hidden;
                                         text-overflow: ellipsis;
                                        }
                                </style>
                            
                            <div class="product_desc shorten_text">
                                <p>{!! $product->product_description ?? '' !!}</p>
                            </div>
                            
                            <!--<div class="product_variant color">
                                <h3>Available Options</h3>
                                <label>color</label>
                                <ul>
                                    <li class="color1"><a href="#"></a></li>
                                    <li class="color2"><a href="#"></a></li>
                                    <li class="color3"><a href="#"></a></li>
                                    <li class="color4"><a href="#"></a></li>
                                </ul>
                            </div>-->
                            

                            
                            <ul class="list-unstyled" style='font-size:15px;'>
                                
                                @if(($product->product_category == 'x') || 
                                    ($product->product_category == 'x') ||
                                    ($product->product_category == 'x'))
                                        <li><b>Gold Rate: </b> {{ $product->gold_rate }}</li>
                                        <li><b>Weight: </b> {{ $product->product_weight }}</li>
                                        <li><b>Purity: </b> {{ $product->purity }}</li>
                                        <li><b>Workmanship: </b> {{ $product->workmanship }}</li>
                                        <li><b>Tax: </b> {{ $product->tax }}</li>
                                        <li><b>Procurement Fee: </b> {{ $product->procurement_cost }}</li>
                                        <li><b>Shipping: </b> {{ $product->shipping_cost }}</li><hr>
                                @endif
                                


                                <li style='font-size:18px;'><h4><b>TOTAL : </b> ₦{{ number_format($product->product_price) }} </h4></li><hr><br>
                            </ul>
                            

                            
                            
                            <input type='hidden' name='pid_product' value="{{ $product->pid_product }}">
                            <input type='hidden' name='product_name' value="{{ $product->product_name }}">
                            <input type='hidden' name='product_category' value="{{ $product->product_category }}">
                            <input type='hidden' name='product_price' value="{{ $product->product_price }}">
                            <input type='hidden' name='gold_rate' value="{{ $product->gold_rate ?? 'NONE' }}">
                            <input type='hidden' name='product_weight' value="{{ $product->product_weight ?? 'NONE' }}">
                            <input type='hidden' name='purity' value="{{ $product->purity ?? 'NONE' }}">
                            <input type='hidden' name='workmanship' value="{{ $product->workmanship ?? 'NONE' }}">
                            <input type='hidden' name='tax' value="{{ $product->tax }}">
                            <input type='hidden' name='procurement_cost' value="{{ $product->procurement_cost }}">
                            <input type='hidden' name='shipping_cost' value="{{ $product->shipping_cost }}">
                            <input type='hidden' name='total_cost' value="{{ $product->product_price }}">

                            
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input name='purchase_quantity' min="1" max="100" value="1" type="number">
                            </div>
                            
                            <div class="product_variant quantity">
                                <button class="button" type="submit" name="xbutton" value="buy" style='color:#252304;' onMouseOver="this.style.color='#ffffff'" onMouseOut="this.style.color='#252304'" >Buy</button><br>
                            </div>

                            </form>
                            
                            <hr>

                                
                                
                                
                                @if(($product->product_category == 'general') || 
                                    ($product->product_category == 'vitamins_and_supplements') ||
                                    ($product->product_category == 'antibiotics'))
                                    <p>
                                        <i>Estimated Delivery Time is 1 to 2 business days. This length of time is determined by the time of the day the order is made.</i>
                                    </p>
                                @endif
                                
                                
                                
                                
                                

                                                        
                            
                            <div class=" product_d_action">
                                <ul>
                                    <!--<li><a href="#" title="/wishlist">+ Add to Wishlist</a></li>-->
                                    <!--<li><a href="#" title="Add to wishlist">+ Compare</a></li>-->
                                </ul>
                            </div>
                            
                            <div class="product_meta">
                                <span>Category: <a href="#">{{ $product->product_category }}</a></span>
                            </div>

                        
                        
                        <!-- <div class="priduct_social">
                            <ul>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                            </ul>
                        </div>-->

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Product Description</a>
                                </li>
                                <!--<li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                </li>-->
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>{!! $product->product_description ?? '' !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="first_child">Compositions</td>
                                                    <td>Polyester</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Styles</td>
                                                    <td>Girly</td>
                                                </tr>
                                                <tr>
                                                    <td class="first_child">Properties</td>
                                                    <td>Short Dress</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <div class="product_info_content">
                                    <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="reviews_wrapper">
                                    <h2>1 review for Donec eu furniture</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_thmb">
                                            <img src="assets/img/blog/comment2.jpg" alt="">
                                        </div>
                                        <div class="comment_text">
                                            <div class="reviews_meta">
                                                <div class="star_rating">
                                                    <ul>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                        <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                <p><strong>admin </strong>- September 12, 2018</p>
                                                <span>roadthemes</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="comment_title">
                                        <h2>Add a review </h2>
                                        <p>Your email address will not be published. Required fields are marked </p>
                                    </div>
                                    <div class="product_ratting mb-10">
                                        <h3>Your rating</h3>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="review_comment">Your review </label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Name</label>
                                                    <input id="author" type="text">

                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text">
                                                </div>
                                            </div>
                                            <button type="submit">Submit</button>
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
    
    
    
    
    
       <!--RELATED product area start-->
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <div class="section_title">
                        <h2><span> <strong>Related </strong>Products</span></h2>
                    </div>
                    
                    
                    
                    <div class="product_carousel product_column5 owl-carousel">
                        
                        
                    @foreach($products_related as $product)
                        <div class="single_product">
                            
                            <div class="product_name">
                                <h3><a href="{{ route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product]) }}">{{ $product->product_name }}</a></h3>
                                <p class="manufacture_product"><a href="{{ route('product_category_view_index', ['product_category' => $product->product_category]) }}">{{ $product->product_category }}</a></p>
                            </div>
                            
                            <div class="product_thumb">
                                <a class="primary_img" href="{{ route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product]) }}"><img src='{{ URL::asset('https://admin.accessmydrugs.com/public/storage/images') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp' alt=""></a>
                                <!--<a class="secondary_img" href="product-details.html"><img src='{{ URL::asset('storage/app/product_image') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp")' alt=""></a>-->
                                <div class="label_product">
                                    <span class="label_sale">{{ number_format($product->product_quantity) }} in stock</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <!--<li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>-->
                                        <!--<li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>-->
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="product_content">
                                <div class="product_ratings">
                                    <ul>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                        <li><a href="#"><i class="ion-star"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product_footer d-flex align-items-center">
                                    <div class="price_box">
                                        <span class="regular_price">₦{{ number_format($product->product_price) }}</span>
                                    </div>
                                    <div class="add_to_cart">
                                       <!-- <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                        
                        
                        
                    </div>
                    
                </div>
            </div>

        </div>
    </section>
    <!--product area end--> 
    
    

        <!---------------------------------------------------------->

@endsection 
<!-- MAIN PAGE CONTENT STOPS -->



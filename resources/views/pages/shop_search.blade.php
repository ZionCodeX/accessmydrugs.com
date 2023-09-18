
@extends('layouts.base_shop')


@section('title', "Search | $search_key" )


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
                            <li _msttexthash="429858" _msthash="138">Search Result</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    





    
    
<div class="shop_area shop_fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->
                    <div class="shop_title">
                        <h1>Search Result for {{ $search_key ?? ""}}</h1>
                    </div>
                    
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip" title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>

                            <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                        <!--<div class=" niceselect_option" style="display: none;">

                            <form class="select_option" action="#" style="display: none;">
                                <select name="orderby" id="short">

                                    <option selected="" value="1">Sort by average rating</option>
                                    <option value="2">Sort by popularity</option>
                                    <option value="3">Sort by newness</option>
                                    <option value="4">Sort by price: low to high</option>
                                    <option value="5">Sort by price: high to low</option>
                                    <option value="6">Product Name: Z</option>
                                </select>
                            </form><div class="nice-select select_option" tabindex="0"><span class="current">Sort by average rating</span><ul class="list"><li data-value="1" class="option selected">Sort by average rating</li><li data-value="2" class="option">Sort by popularity</li><li data-value="3" class="option">Sort by newness</li><li data-value="4" class="option">Sort by price: low to high</li><li data-value="5" class="option">Sort by price: high to low</li><li data-value="6" class="option">Product Name: Z</li></ul></div>
                            

                        </div>-->
                        
                        <!--<div class="nice-select niceselect_option" tabindex="0"><span class="current">Sort by average rating</span><ul class="list"><li data-value="1" class="option selected focus">Sort by average rating</li><li data-value="2" class="option">Sort by popularity</li><li data-value="3" class="option">Sort by newness</li><li data-value="4" class="option">Sort by price: low to high</li><li data-value="5" class="option">Sort by price: high to low</li><li data-value="6" class="option">Product Name: Z</li></ul></div>
                        <div class="page_amount">
                            <p>Showing 1–9 of 21 results</p>
                        </div>-->
                        
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper">
                        
                        
                    @foreach($products_search as $product)
                        <div class="col-lg-3 col-md-4 col-12 ">
                            <div class="single_product">
                                
                                <div class="product_name grid_name">
                                    <h3><a href="{{ route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product]) }}">{{ $product->product_name }}</a></h3>
                                    <p class="manufacture_product"><a href="{{ route('product_category_view_index', ['product_category' => $product->product_category]) }}">{{ $product->product_category }}</a></p>
                                </div>
                                
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product]) }}"><img src='{{ URL::asset('https://admin.accessmydrugs.com/public/storage/images') }}/{{ $product->product_image }}?r=@php echo(rand()); @endphp")' alt=""></a>
                                    <!--<a class="secondary_img" href="product-details.html"><img src="assets/img/product/product11.jpg" alt=""></a>-->
                                    <div class="label_product">
                                        <span class="label_sale">{{ $product->product_quantity }} in stock</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <!--<li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>-->
                                            <li class="wishlist"><a href="/wishlist" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                            <!--<li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="product_content grid_content">
                                    <div class="content_inner">
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
                                                <span class="current_price">₦{{ number_format($product->product_price) }}</span>
                                                <!--<span class="old_price">$3200.00</span>-->
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="/cart" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <style>
                                    .shorten_text {
                                         height: 30%;
                                         overflow: hidden;
                                         text-overflow: ellipsis;
                                        }
                                </style>
                                
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="product_name">
                                            <h3><a href="{{ route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product]) }}" class='shorten_text'>{!! $product->product_description !!}</a></h3>
                                        </div>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>

                                        <!--<div class="product_desc">
                                            <p>{!! $product->product_description !!}</p>
                                        </div>-->
                                    </div>
                                    
                                    
                                    <div class="right_caption">
                                        <div class="text_available">
                                            <p>Availabe: <span>{{ $product->product_quantity }} in stock</span></p>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">₦{{ number_format($product->product_price) }}</span>
                                            <!--<span class="old_price">$420.00</span>-->
                                        </div>
                                        <div class="cart_links_btn">
                                            <a href="{{ route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product]) }}" title="add to cart">View | Buy</a>
                                        </div>
                                        <div class="action_links_btn">
                                            <ul>
                                                <!--<li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>-->
                                                <li class="wishlist"><a href="/wishlist" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                                <!--<li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    @endforeach
                        
                        
                    </div>
                    
                    
                    
                    

                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                <li class="current">1</li>
                                <!--<li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li class="next"><a href="#">next</a></li>
                                <li><a href="#">&gt;&gt;</a></li>-->
                            </ul>
                        </div>
                    </div>
                    
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>

        <!---------------------------------------------------------->

@endsection 
<!-- MAIN PAGE CONTENT STOPS -->



    <!--product area start-->
    <section class="product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Gold  </strong>Bangles</span></h2>
                    </div>
                    
                    
                    
                    <div class="product_carousel product_column5 owl-carousel">
                        
                        
                    <?php $__currentLoopData = $products3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single_product">
                            
                            <div class="product_name">
                                <h3><a href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><?php echo e($product->product_name); ?></a></h3>
                                <p class="manufacture_product"><a href="<?php echo e(route('product_category_view_index', ['product_category' => $product->product_category])); ?>"><?php echo e($product->product_category); ?></a></p>
                            </div>
                            
                            <div class="product_thumb">
                                <a class="primary_img" href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug,'product_category' => $product->product_category,'pid_product' => $product->pid_product])); ?>"><img src='<?php echo e(URL::asset('https://admin3.spreaditglobal.com/storage/app/product_image')); ?>/<?php echo e($product->product_image); ?>?r=<?php echo(rand()); ?>' alt=""></a>
                                <!--<a class="secondary_img" href="product-details.html"><img src='<?php echo e(URL::asset('storage/app/product_image')); ?>/<?php echo e($product->product_image); ?>?r=<?php echo(rand()); ?>")' alt=""></a>-->
                                <div class="label_product">
                                    <span class="label_sale"><?php echo e(number_format($product->product_quantity)); ?> in stock</span>
                                </div>

                                <div class="action_links">
                                    <ul>
                                        <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <span class="lnr lnr-magnifier"></span></a></li>
                                        <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><span class="lnr lnr-heart"></span></a></li>
                                        <li class="compare"><a href="compare.html" title="compare"><span class="lnr lnr-sync"></span></a></li>
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
                                        <span class="regular_price">₦<?php echo e(number_format($product->product_price)); ?></span>
                                    </div>
                                    <div class="add_to_cart">
                                        <a href="cart.html" title="add to cart"><span class="lnr lnr-cart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        
                        
                    </div>
                    
                </div>
            </div>

        </div>
    </section>
    <!--product area end--><?php /**PATH C:\xampp\htdocs\accessmydrugs.com\resources\views/components/inc_category3_section_shop.blade.php ENDPATH**/ ?>
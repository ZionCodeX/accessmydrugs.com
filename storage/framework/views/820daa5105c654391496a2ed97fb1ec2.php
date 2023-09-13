    <!--product area start-->
    <section class="new_product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_tab_button tab_button2">
                        <ul class="nav" role="tablist" id="nav-tab2">
                            <li>
                                <a class="active" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true"><span>Featured</span> Products</a>
                            </li>
                            <!--<li>
                                <a data-toggle="tab" href="#view" role="tab" aria-controls="view" aria-selected="false"><span>Most</span> View Products</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#bestseller" role="tab" aria-controls="bestseller" aria-selected="false"><span>Bestseller</span> Products</a>
                            </li>-->
                        </ul>
                    </div>

                </div>
            </div>



            <div class="tab-content">
                <div class="tab-pane fade show active" id="featured" role="tabpanel">
                    <div class="new_product_container">
                        
                        
                        <div class="sample_product">
                            <div class="product_name">
                                <h3><a href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product_featured[0]->product_slug, 'product_category' => $product_featured[0]->product_category, 'pid_product' => $product_featured[0]->pid_product])); ?>"><?php echo e($product_featured[0]->product_name ?? ''); ?> </a></h3>
                                <div class="manufacture_product">
                                    <p><a href="#"><?php echo e($product_featured[0]->product_category ?? ''); ?></a></p>
                                </div>
                            </div>
                            <div class="product_thumb">
                                <a href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product_featured[0]->product_slug, 'product_category' => $product_featured[0]->product_category, 'pid_product' => $product_featured[0]->pid_product])); ?>"><img src='<?php echo e(URL::asset('https://admin.accessmydrugs.com/storage/app/product_image')); ?>/<?php echo e($product_featured[0]->product_image); ?>?r=<?php echo(rand()); ?>' alt=""></a>
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
                                <div class="price_box">
                                    <span class="current_price">₦<?php echo e(number_format($product_featured[0]->product_price)); ?></span>
                                    <!--<span class="old_price">$180.00</span>-->
                                </div>
                                <div class="quantity_progress">
                                    <p class="product_sold">Sold: <span>50</span></p>
                                    <p class="product_available">Availabe: <span><?php echo e(number_format($product_featured[0]->product_quantity)); ?></span></p>
                                </div>
                                <div class="bar_percent">

                                </div>
                            </div>

                        </div>
                        
                        
                        
                        
                        
                        
                        
                        <div class="product_carousel product_bg  product_column2 owl-carousel">
                            
                            
                            
                            <div class="small_product">

                                <?php $__currentLoopData = $products_featured1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><?php echo e($product->product_name); ?></a></h3>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">₦<?php echo e(number_format($product->product_price)); ?></span>
                                            <!--<span class="old_price">$180.00</span>-->
                                        </div>
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><img src='<?php echo e(URL::asset('https://admin.accessmydrugs.com/storage/app/product_image')); ?>/<?php echo e($product->product_image); ?>?r=<?php echo(rand()); ?>' alt="" ></a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            
                            
                            
                            
                            <div class="small_product">
                                
                                <?php $__currentLoopData = $products_featured2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><?php echo e($product->product_name); ?></a></h3>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">₦<?php echo e(number_format($product->product_price)); ?></span>
                                            <!--<span class="old_price">$180.00</span>-->
                                        </div>
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><img src='<?php echo e(URL::asset('https://admin.accessmydrugs.com/storage/app/product_image')); ?>/<?php echo e($product->product_image); ?>?r=<?php echo(rand()); ?>' alt="" ></a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                            
                            
                            
                            
                            
                            <div class="small_product">

                                <?php $__currentLoopData = $products_featured4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><?php echo e($product->product_name); ?></a></h3>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">₦<?php echo e(number_format($product->product_price)); ?></span>
                                            <!--<span class="old_price">$180.00</span>-->
                                        </div>
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><img src='<?php echo e(URL::asset('https://admin.accessmydrugs.com/storage/app/product_image')); ?>/<?php echo e($product->product_image); ?>?r=<?php echo(rand()); ?>' alt="" ></a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </div>
                            
                            
                            
                            <div class="small_product">

                                <?php $__currentLoopData = $products_featured5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single_product">
                                    <div class="product_content">
                                        <h3><a href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><?php echo e($product->product_name); ?></a></h3>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                                <li><a href="#"><i class="ion-star"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="price_box">
                                            <span class="current_price">₦<?php echo e(number_format($product->product_price)); ?></span>
                                            <!--<span class="old_price">$180.00</span>-->
                                        </div>
                                    </div>
                                    <div class="product_thumb">
                                        <a class="primary_img" href="<?php echo e(route('shop_product_details_view_index', ['product_slug' => $product->product_slug, 'product_category' => $product->product_category, 'pid_product' => $product->pid_product])); ?>"><img src='<?php echo e(URL::asset('https://admin.accessmydrugs.com/storage/app/product_image')); ?>/<?php echo e($product->product_image); ?>?r=<?php echo(rand()); ?>' alt="" height='300'></a>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            
                            
                             
                             

                            
                            
               

                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
                
                
                
                

            </div>
        </div>
    </section>
    <!--product area end--><?php /**PATH C:\xampp\htdocs\accessmydrugs.com\resources\views/components/inc_featured_products_section_shop.blade.php ENDPATH**/ ?>
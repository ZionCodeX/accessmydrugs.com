<?php $__env->startSection('title', 'Contact'); ?>


<!-- MAIN PAGE CONTENT STARTS -->
<?php $__env->startSection('content'); ?>

        <!---------------------------------------------------------->
        
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="/" _msttexthash="46891" _msthash="137">Home</a></li>
                            <li _msttexthash="429858" _msthash="138">Contact</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>        





<div class="contact_map mt-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="map-area">
                        <centre>
        <iframe src="https://maps.google.com/maps?q=No.31%20Basil%20Ofia%20street,%20satellite%20town%20Abulado,%20Lagos,%20Nigeria.&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="1200" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </centre>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
  
  
 <div class="contact_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content">
                        <h3>contact us</h3>
                        <p>Do you have concerns, complaints or do you want to know more about SpreaditGlobal Shop, you can leave us a message here.</p>
                        <ul>
                            <li><i class="fa fa-fax"></i> Address : No.31 Basil Ofia street, satellite town Abulado, Lagos, Nigeria.</li>
                            <li><i class="fa fa-phone"></i> <a href="mailto:admin@spreaditglobal.com">admin@accessmydrugs.com</a></li>
                            <li><i class="fa fa-envelope-o"></i><a href="tel:+234 813 565 5742">(+234)-813-565-5742</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message form">
                        <h3>Talk to Us</h3>
                        <form id="contact-form" method="POST" action="assets/mail.php">
                            <p>
                                <label> Your Name (required)</label>
                                <input name="name" placeholder="Name *" type="text">
                            </p>
                            <p>
                                <label> Your Email (required)</label>
                                <input name="email" placeholder="Email *" type="email">
                            </p>
                            <p>
                                <label> Subject</label>
                                <input name="subject" placeholder="Subject *" type="text">
                            </p>
                            <div class="contact_textarea">
                                <label> Your Message</label>
                                <textarea placeholder="Message *" name="message" class="form-control2"></textarea>
                            </div>
                            <button type="submit"> Send</button>
                            <p class="form-messege"></p>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div> 
  
    
    

        <!---------------------------------------------------------->

<?php $__env->stopSection(); ?> 
<!-- MAIN PAGE CONTENT STOPS -->



<?php echo $__env->make('layouts.base_shop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\accessmydrugs.com\resources\views/pages/contact.blade.php ENDPATH**/ ?>
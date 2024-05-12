                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">

                            <div class="widget_list widget_categories">
                                <i> Welcome &nbsp; <b>{{ Auth::user()->first_name ?? '' }}</b></i>
                                 <hr>
                                <ul>
                                    <li>
                                        <a href="/"><b>-&nbsp;</b> Shop </a>
                                    </li>
                                    <li>
                                        <a href="/orders"><b>-&nbsp;</b> Orders (<b>{{ $my_orders_count ?? 0}}</b>)</a>
                                    </li>
                                    <!--<li>
                                        <a href="#"><b>-&nbsp;</b> Wishlist (<b>0</b>)</a>
                                    </li>-->

                                    <li>
                                        <a href="/tranchepay"><b>-&nbsp;</b> Tranchepay: (<b>None</b>)</a>
                                    </li>
                                    
                                    <!--<li>
                                        <a href="#"><b>-&nbsp;</b> My Profile </a>
                                    </li>-->


                                </ul>
                            </div>

                        </div>
                        
                    </aside>
                    <!--sidebar widget end-->
                </div>
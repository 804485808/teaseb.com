
<div class="copyrights">Collect from <a href="http://www.mycodes.net/" target="_blank">源码之家</a></div>
<div class="header_bootm">
    <div class="col-sm-4 span_1">
        <div class="logo">
            <a href="index.html"><img src="<?php echo base_url('/skin/images/logo.png')?>" alt=""/></a>
        </div>
    </div>
    <div class="col-sm-8 row_2">
        <div class="header_bottom_right">
            <div class="search">
                <input type="text" value="Your email address" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Your email address';}">
                <input type="submit" value="">
            </div>
            <ul class="bag">
                <a href="cart.html"><i class="bag_left"> </i></a>
                <a href="cart.html"><li class="bag_right"><p>205.00 $</p> </li></a>
                <div class="clearfix"> </div>
            </ul>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="grid_1">
    <div class="col-md-3 banner_left">
        <img src="images/pic1.png" class="<?php echo base_url('/skin/img-responsive')?>" alt=""/>
        <div class="banner_desc">
            <h1>Slim Fit Men </h1>
            <h2>Roundcheck T-Shirt</h2>
            <h5>$125
                <small>Only</small>
            </h5>
            <a href="#" class="btn1 btn4 btn-1 btn1-1b">Add To Cart</a>
        </div>
    </div>
    <div class="col-md-9 banner_right">
        <!-- FlexSlider -->
        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <li><img src="<?php echo base_url('/skin/images/banner.jpg')?>" alt=""/></li>
                    <li><img src="<?php echo base_url('/skin/images/banner.jpg')?>" alt=""/></li>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clearfix"></div>
</div>
<div class="content">
    <div class="content_box">
        <ul class="grid_2">
            <?php foreach(array_slice($LastProducts,0,5) as $k=>$v){?>
            <a href="single.html">
                <li><img src="<?php echo $site['image_domain'].$v['thumb']?>" class="img-responsive" alt=""/>
                    <span class="btn5">¥<?php echo $v['price']?></span>
                    <p><?php echo $v['title']?></p>
                </li>
            </a>
            <?php }?>
            <div class="clearfix"> </div>
        </ul>
        <div class="grid_3">
            <div class="col-md-6 box_2">
                <div class="section_group">
                    <div class="col_1_of_2 span_1_of_2">
                        <img src="<?php echo base_url('/skin/images/pic7.jpg')?>" class="img-responsive" alt=""/>
                    </div>
                    <div class="col_1_of_2 span_1_of_2">
                        <img src="<?php echo base_url('/skin/images/pic8.jpg')?>" class="img-responsive" alt=""/>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box_3">
                    <div class="col_1_of_2 span_1_of_2 span_3">
                        <h3>Paul Slim Fit Men
                            Roundneck
                            T-Shirt</h3>
                        <h4>$156</h4>
                        <p>Offer Available till Sunday 12 Nov 2014.</p>
                        <a href="#" class="btn1 btn6 btn-1 btn1-1b">Add To Cart</a>
                    </div>
                    <div class="col_1_of_2 span_1_of_2 span_4">
                        <div class="span_5">
                            <img src="<?php echo base_url('/skin/images/pic9.png')?>" class="img-responsive" alt=""/>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="footer_top">
            <div class="span_of_4">
                <div class="col-md-3 box_4">
                    <h4>Shop</h4>
                    <ul class="f_nav">
                        <li><a href="#">new arrivals</a></li>
                        <li><a href="#">men</a></li>
                        <li><a href="#">women</a></li>
                        <li><a href="#">accessories</a></li>
                        <li><a href="#">kids</a></li>
                        <li><a href="#">brands</a></li>
                        <li><a href="#">trends</a></li>
                        <li><a href="#">sale</a></li>
                        <li><a href="#">style videos</a></li>
                    </ul>
                </div>
                <div class="col-md-3 box_4">
                    <h4>help</h4>
                    <ul class="f_nav">
                        <li><a href="#">frequently asked  questions</a></li>
                        <li><a href="#">men</a></li>
                        <li><a href="#">women</a></li>
                        <li><a href="#">accessories</a></li>
                        <li><a href="#">kids</a></li>
                        <li><a href="#">brands</a></li>
                    </ul>
                </div>
                <div class="col-md-3 box_4">
                    <h4>account</h4>
                    <ul class="f_nav">
                        <li><a href="#">login</a></li>
                        <li><a href="#">create an account</a></li>
                        <li><a href="#">create wishlist</a></li>
                        <li><a href="#">my shopping bag</a></li>
                        <li><a href="#">brands</a></li>
                        <li><a href="#">create wishlist</a></li>
                    </ul>
                </div>
                <div class="col-md-3 box_4">
                    <h4>popular</h4>
                    <ul class="f_nav">
                        <li><a href="#">new arrivals</a></li>
                        <li><a href="#">men</a></li>
                        <li><a href="#">women</a></li>
                        <li><a href="#">accessories</a></li>
                        <li><a href="#">kids</a></li>
                        <li><a href="#">brands</a></li>
                        <li><a href="#">trends</a></li>
                        <li><a href="#">sale</a></li>
                        <li><a href="#">style videos</a></li>
                        <li><a href="#">login</a></li>
                        <li><a href="#">brands</a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- start span_of_2 -->
            <div class="span_of_2">
                <div class="span1_of_2">
                    <h5>need help? <a href="#">contact us <span> &gt;</span> </a> </h5>
                    <p>(or) Call us: +22-34-2458793</p>
                </div>
                <div class="span1_of_2">
                    <h5>follow us </h5>
                    <div class="social-icons">
                        <ul>
                            <li><a href="#" target="_blank"></a></li>
                            <li><a href="#" target="_blank"></a></li>
                            <li><a href="#" target="_blank"></a></li>
                            <li><a href="#" target="_blank"></a></li>
                            <li class="last2"><a href="#" target="_blank"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="copy">
                <p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
            </div>
        </div>
    </div>
</div>
<link href="<?php echo base_url('/skin/css/flexslider.css')?>" rel='stylesheet' type='text/css' />
<script defer src="<?php echo base_url('/skin/js/jquery.flexslider.js')?>"></script>
<script type="text/javascript">
    $(function(){
        SyntaxHighlighter.all();
    });
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
</body>
</html>		
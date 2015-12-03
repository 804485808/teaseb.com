<link rel="stylesheet" href="<?php echo base_url('skin/css/etalage.css')?>">
<script src="<?php echo base_url('skin/js/jquery.etalage.min.js')?>"></script>
<script>
    jQuery(document).ready(function($){

        $('#etalage').etalage({
            thumb_image_width: 300,
            thumb_image_height: 400,
            source_image_width: 900,
            source_image_height: 1200,
            show_hint: true,
            click_callback: function(image_anchor, instance_id){
                alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
            }
        });

    });
</script>
<div class="content">
    <div class="content_box">
        <div class="men">
            <div class="single_top">
                <div class="col-md-9 single_right">
                    <div class="grid images_3_of_2">
                        <ul id="etalage">
                            <?php if($product['thumb']){?>
                            <li>
                                <a href="optionallink.html">
                                    <img class="etalage_thumb_image" src="<?php echo $site['image_domain'].$product['thumb']?>" class="img-responsive" />
                                    <img class="etalage_source_image" src="<?php echo $site['image_domain'].$product['thumb']?>" class="img-responsive" title="" />
                                </a>
                            </li>
                            <?php }?>
                            <?php if($product['thumb1']){?>
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_thumb_image" src="<?php echo $site['image_domain'].$product['thumb1']?>" class="img-responsive" />
                                        <img class="etalage_source_image" src="<?php echo $site['image_domain'].$product['thumb1']?>" class="img-responsive" title="" />
                                    </a>
                                </li>
                            <?php }?>
                            <?php if($product['thumb2']){?>
                                <li>
                                    <a href="optionallink.html">
                                        <img class="etalage_thumb_image" src="<?php echo $site['image_domain'].$product['thumb2']?>" class="img-responsive" />
                                        <img class="etalage_source_image" src="<?php echo $site['image_domain'].$product['thumb2']?>" class="img-responsive" title="" />
                                    </a>
                                </li>
                            <?php }?>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="desc1 span_3_of_2">
                        <h1><?php echo $product['title']?></h1>
                        <p class="m_5">¥. <?php echo $product['price']?></p>
                        <div class="btn_form">
                            <form>
                                <input type="submit" value="buy" title="">
                            </form>
                        </div>
                        <span class="m_link"><a href="#">login to save in wishlist</a> </span>
                        <?php foreach($product['attr'] as $k=>$v){?>
                        <p class="m_text2"><font color="#8a2be2"><?php echo $k?>:</font>&nbsp;&nbsp;<?php echo $v['value']?></p>
                        <?php }?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3">
                    <!-- FlexSlider -->
                    <section class="slider_flex">
                        <div class="flexslider">
                            <ul class="slides">
                                <li><img src="images/m2.jpg" class="img-responsive" alt=""/></li>
                                <li><img src="images/m3.jpg" class="img-responsive" alt=""/></li>
                                <li><img src="images/m4.jpg" class="img-responsive" alt=""/></li>
                                <li><img src="images/m5.jpg" class="img-responsive" alt=""/></li>
                            </ul>
                        </div>
                    </section>
                    <!-- FlexSlider -->
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="toogle">
                <h2>Product Details</h2>
                <p class="m_text2">
                    <?php echo $product['content']?>
                </p>
            </div>
            <div class="toogle">
                <h2>More Information</h2>
                <p class="m_text2">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
            </div>
            <h4 class="head_single">Related Products</h4>
            <div class="single_span_3">
                <div class="col-sm-3 span_4">
                    <img src="images/m6.jpg" class="img-responsive" alt=""/>
                    <h3>parum clari</h3>
                    <p>Duis autem vel eum iriure</p>
                    <h4>Rs.399</h4>
                </div>
                <div class="col-sm-3 span_4">
                    <img src="images/m1.jpg" class="img-responsive" alt=""/>
                    <h3>parum clari</h3>
                    <p>Duis autem vel eum iriure</p>
                    <h4>Rs.399</h4>
                </div>
                <div class="col-sm-3 span_4">
                    <img src="images/pic7.jpg" class="img-responsive" alt=""/>
                    <h3>parum clari</h3>
                    <p>Duis autem vel eum iriure</p>
                    <h4>Rs.399</h4>
                </div>
                <div class="col-sm-3 span_4">
                    <img src="images/pic8.jpg" class="img-responsive" alt=""/>
                    <h3>parum clari</h3>
                    <p>Duis autem vel eum iriure</p>
                    <h4>Rs.399</h4>
                </div>
                <div class="clearfix"></div>
            </div>
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
<link href="<?php echo base_url('skin/css/flexslider.css')?>" rel='stylesheet' type='text/css' />
<script defer src="<?php echo base_url('skin/js/jquery.flexslider.js')?>"></script>
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
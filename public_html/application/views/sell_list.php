
<div class="content">
<div class="content_box">
<div class="men">
<div class="col-md-3 sidebar">
    <div class="block block-layered-nav">
        <div class="block-title">
            <strong><span>Shop By</span></strong>
        </div>
        <div class="block-content">

            <dl id="narrow-by-list">
                <dt class="odd">processus</dt>
                <dd class="odd">
                    <ol>
                        <?php foreach($category as $k=>$v){?>
                        <li>
                            <a href="#"><?php echo $v['catname']."(".$v['num'].")"?></a>
                        </li>
                        <?php }?>
                    </ol>
                </dd>
                <dt class="even">Manufacturer</dt>
                <dd class="even">
                    <ol>
                        <?php foreach(array_slice($brand,0,5) as $k=>$v){?>
                        <li>
                            <a href="#"><?php echo $v['name']?></a>
                            (<?php echo $v['num']?>)
                        </li>
                        <?php }?>
                    </ol>
                </dd>
                <dt class="last odd">Color</dt>
                <dd class="last odd">
                    <ol>
                        <li>
                            Black                        (0)
                        </li>
                        <li>
                            <a href="#">Blue</a>
                            (2)
                        </li>
                        <li>
                            <a href="#">Green</a>
                            (1)
                        </li>
                        <li>
                            <a href="#">Grey</a>
                            (1)
                        </li>
                        <li>
                            <a href="#">Red</a>
                            (1)
                        </li>
                        <li>
                            <a href="#">White</a>
                            (1)
                        </li>
                    </ol>
                </dd>
            </dl>

        </div>
    </div>
    <div class="block block-cart">
        <div class="block-title">
            <strong><span>Carrello</span></strong>
        </div>
        <div class="block-content">
            <p class="empty">You have no items in your shopping cart.</p>
        </div>
    </div>
    <div class="block block-list block-compare">
        <div class="block-title">
            <strong><span>Compare Products                    </span></strong>
        </div>
        <div class="block-content">
            <p class="empty">You have no items to compare.</p>
        </div>
    </div>
</div>
<div class="col-md-9">
    <div class="mens-toolbar">
        <div class="sort">
            <div class="sort-by">
                <label>Sort By</label>
                <select>
                    <option value="">
                        Popularity               </option>
                    <option value="">
                        Price : High to Low               </option>
                    <option value="">
                        Price : Low to High               </option>
                </select>
            </div>
        </div>
        <div class="pager">
            <div class="limiter visible-desktop">
                <label>Show</label>
                <select>
                    <option value="" selected="selected">
                        9                </option>
                    <option value="">
                        15                </option>
                    <option value="">
                        30                </option>
                </select> per page
            </div>
            <ul class="dc_pagination dc_paginationA dc_paginationA06">
                <li><a href="#" class="previous">Pages</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="span_2">
        <?php foreach($products as $k=>$v){?>
        <div class="col_1_of_single1 span_1_of_single1">
            <a href="<?php echo site_url('sell_detail/index/itemid_'.$v['itemid'])?>">
                <img src="<?php echo $site['image_domain'].$v['thumb']?>" class="img-responsive" alt=""/>
                <h3><?php echo $v['brand']?></h3>
                <p><?php echo mb_substr($v['title'],0,25)?></p>
                <h4>¥.<?php echo $v['price']?></h4>
            </a>
        </div>
        <?php }?>
        <div class="clearfix"></div>
    </div>
        <?php echo $pages?>
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
</body>
</html>		
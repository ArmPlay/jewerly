<?php ?>
<!---->
<div class="content">
    <div class="container">
        <div class="slider">
            <ul class="rslides" id="slider1">
                <li><img src="images/banner2.jpg" alt=""></li>
                <li><img src="images/banner1.jpg" alt=""></li>
                <li><img src="images/banner3.jpg" alt=""></li>
            </ul>
        </div>
    </div>
</div>
<!---->
<div class="bottom_content">
    <div class="container">
        <div class="sofas">
            <div class="col-md-6 sofa-grid">
                <img src="images/t1.jpg" alt=""/>
                <h3>IMPORTED DINING SETS</h3>
                <h4><a href="products.html">SPECIAL ACCENTS OFFER</a></h4>
            </div>
            <div class="col-md-6 sofa-grid sofs">
                <img src="images/t2.jpg" alt=""/>
                <h3>SPECIAL DESIGN SOFAS</h3>
                <h4><a href="products.html">FABFURNISHING MELA</a></h4>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<div class="new">
    <div class="container">
        <h3>specially designed for Furnyish</h3>
        <div class="new-products">
            <div class="new-items">
                <div class="item1">
                    <a href="products.html"><img src="images/s1.jpg" alt=""/></a>
                    <div class="item-info">
                        <h4><a href="products.html">Brown Furny Seater</a></h4>
                        <span>ID: SR5421</span>
                        <a href="single.html">Buy Now</a>
                    </div>
                </div>
                <div class="item4">
                    <a href="products.html"><img src="images/s4.jpg" alt=""/></a>
                    <div class="item-info4">
                        <h4><a href="products.html">Dream Furniture Bed</a></h4>
                        <span>ID: SR5421</span>
                        <a href="single.html">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="new-items new_middle">
                <div class="item2">
                    <div class="item-info2">
                        <h4><a href="products.html">Georgia Sofa Set</a></h4>
                        <span>ID: GS7641</span>
                        <a href="single.html">Buy Now</a>
                    </div>
                    <a href="products.html"><img src="images/s2.jpg" alt=""/></a>
                </div>
                <div class="item5">
                    <a href="products.html"><img src="images/s5.jpg" alt=""/></a>
                    <div class="item-info5">
                        <h4><a href="products.html">BlackBurn Law Set</a></h4>
                        <span>ID: SR5421</span>
                        <a href="single.html">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="new-items new_last">
                <div class="item3">
                    <a href="products.html"><img src="images/s3.jpg" alt=""/></a>
                    <div class="item-info3">
                        <h4><a href="products.html">Shefan Dinning Set</a></h4>
                        <span>ID: SR5421</span>
                        <a href="single.html">Buy Now</a>
                    </div>
                </div>
                <div class="item6">
                    <a href="products.html"><img src="images/s6.jpg" alt=""/></a>
                    <div class="item-info6">
                        <h4><a href="products.html">Irony Sofa Set</a></h4>
                        <span>ID: SR5421</span>
                        <a href="single.html">Buy Now</a>
                    </div>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!---->
<?php  ?>
<?php if($brands):?>
<div class="top-sellers">
    <div class="container">
        <h3>TOP - SELLERS</h3>
        <div class="seller-grids">
            <?php foreach($brands as $brand): ?>
            <div class="col-md-3 seller-grid">
                <a href="products/<?php $brand->alias?>"><img src="images/<?=$brand->img; ?>" alt=""/></a>
                <h4><a href="products/<?php $brand->alias?>"><?=$brand->title;?></a></h4>
                <span>ID: <?=$brand->id;?></span>
                <p>Цена <?=$brand->price;?></p>
            </div>
            <?php endforeach; ?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<?php endif; ?>
<!---->
<div class="recommendation">
    <div class="container">
        <div class="recmnd-head">
            <h3>RECOMMENDATIONS FOR YOU</h3>
        </div>
        <div class="bikes-grids">
            <ul id="flexiselDemo1">
                <li>
                    <a href="products.html"><img src="images/ts1.jpg" alt=""/></a>
                    <h4><a href="products.html">King Size Bed</a></h4>
                    <p>ID: KS3989</p>
                </li>
                <li>
                    <a href="products.html"><img src="images/r2.jpg" alt=""/></a>
                    <h4><a href="products.html">Elite Diwan Seater</a></h4>
                    <p>ID: KS3989</p>
                </li>
                <li>
                    <a href="products.html"><img src="images/r3.jpg" alt=""/></a>
                    <h4><a href="products.html">Dior Corner Sofa</a></h4>
                    <p>ID: KS3989</p>
                </li>
                <li>
                    <a href="products.html"><img src="images/r4.jpg" alt=""/></a>
                    <h4><a href="products.html">Alia Modular Sofa</a></h4>
                    <p>ID: KS3989</p>
                </li>
                <li>
                    <a href="products.html"><img src="images/r5.jpg" alt=""/></a>
                    <h4><a href="products.html">King Size Bed</a></h4>
                    <p>ID: KS3989</p>
                </li>
            </ul>

        </div>
    </div>
</div>
<!---->
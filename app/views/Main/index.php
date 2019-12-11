<div id="slider">
    <ul>
        <li style="background-image: url(/images/0.jpg)">
            <h3>Сделай свою жизнь лучше</h3>
            <h2>Подлинные бриллианты</h2>
            <a href="#" class="btn-more">Подробнее</a>
        </li>
        <li class="yellow" style="background-image: url(/images/01.jpg)">
            <h3>Она скажет «да»</h3>
            <h2>Обручальное кольцо</h2>
            <a href="#" class="btn-more">Подробнее</a>
        </li>
        <li class="yellow" style="background-image: url(/images/02.jpg)">
            <h3>Вы достойны быть красавицей</h3>
            <h2>Золотые браслеты</h2>
            <a href="#" class="btn-more">Подробнее</a>
        </li>
    </ul>
</div>
<!-- / body -->

<div id="body">
    <div class="container">
        <div class="last-products"> <!-- 5шт -->
            <h2>Последние добавленные товары</h2>
            <section class="products">
                <?php $curr = \mobel\App::$app->getProperty('currency');
                foreach($lastprods as $lastprod): ?>
                <article>
                    <img src="images/<?=$lastprod->img;?>" width="200" height="222" alt="">
                    <h3><?=$lastprod->title;?></h3>
                    <h4><?php echo $curr['symbol_left'] . ' ';
                        echo $lastprod->price*$curr['value'];
                        echo ' ' . $curr['symbol_right'];
                        if($lastprod->old_price): ?>
                        <span style="text-decoration: line-through; font-size: 16px; color: darkred;">
                            <?php echo $curr['symbol_left'] . ' ';
                            echo $lastprod->old_price*$curr['value'];
                            echo ' ' . $curr['symbol_right'];?>
                        </span>
                        <?php endif; ?>
                    </h4>
                    <a href="cart.html" class="btn-add">Add to cart</a>
                </article>
                <?php endforeach; ?>
            </section>
        </div>
        <section class="quick-links">
            <article style="background-image: url(images/2.jpg)">
                <a href="#" class="table">
                    <div class="cell">
                        <div class="text">
                            <h4>Lorem ipsum</h4>
                            <hr>
                            <h3>Dolor sit amet</h3>
                        </div>
                    </div>
                </a>
            </article>
            <article class="red" style="background-image: url(/images/3.jpg)">
                <a href="#" class="table">
                    <div class="cell">
                        <div class="text">
                            <h4>consequatur</h4>
                            <hr>
                            <h3>voluptatem</h3>
                            <hr>
                            <p>Accusantium</p>
                        </div>
                    </div>
                </a>
            </article>
            <article style="background-image: url(images/4.jpg)">
                <a href="#" class="table">
                    <div class="cell">
                        <div class="text">
                            <h4>culpa qui officia</h4>
                            <hr>
                            <h3>magnam aliquam</h3>
                        </div>
                    </div>
                </a>
            </article>
        </section>
    </div>
    <!-- / container -->
</div>
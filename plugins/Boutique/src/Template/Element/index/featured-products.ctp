<section class="featured">
    <div class="container">

        <div class="row">
            <div class="col-sm-9">
                <!-- Products list -->
                <ul class="product-list isotope">
                    <?php
                        $count = 0;
                    foreach ($products as $product): ?>
                        <li class="standard clearfix" data-price="<?= $currency_unit . $product->price ?>">
                            <a href="<?= Cake\Routing\Router::url([ 'controller' => 'Products', 'action' => 'view', $product->id]); ?>" title="<?= $product->title ?>">
                                <div class="image">
                                    <?= $this->Html->image($product->image_dir.explode(',', $product->image)[0], [
                                        'class' => 'primary'
                                    ]); ?>
                                </div>
                                <div class="title">
                                    <div class="prices">
                                        <span class="price"><?= $currency_unit . $product->price?></span>
                                    </div>
                                    <h3><?= $product->title ?></h3>
                                </div>
                            </a>
                            <span class="price btn btn-xs btn-primary" style="width: 100%; color: white;" title="Add to Cart"><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                        </li>
                    <?php
                        $count++;
                    if($count == 10){
                        break;
                    }
                    endforeach; ?>
                </ul>
                <!-- End class="product-list isotope" -->
            </div>

            <div class="col-sm-3">
                <!-- Categories widget -->
                <div class="widget Categories">
                    <h3 class="widget-title widget-title ">Categories</h3>
                    <ul>
                        <li>
                            <a href='category.html' class="title">Mens</a>

                            <ul>
                                <li>
                                    <a href='category.html' class="title">T-Shirts</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Jackets</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Jumpers</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Shoes</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Shirts</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Accessories</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href='category.html' class="title">Womens</a>
                            <ul>
                                <li>
                                    <a href='category.html' class="title">Shoes</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Dresses</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Bags</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Trousers</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Tops</a>
                                </li>
                                <li>
                                    <a href='category.html' class="title">Accessories</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End class="widget Categories" -->

                <!-- This month only! widget -->
                <div class="widget Text">
                    <h3 class="widget-title widget-title ">This month only!</h3>
                    <h5>Free UK shipping!</h5>
                    <h6><i class="fa fa-gift"> &nbsp; </i> Free gift wrap</h6>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque beatae tempore porro
                        officiis!</p>
                    <a class="btn btn-primary btn-block-xs" href="#">
                        BUY NOW <em>for</em> $85
                    </a>
                </div>
                <!-- End class="widget Text" -->

            </div>
        </div>

    </div>
</section>
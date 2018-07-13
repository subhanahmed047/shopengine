



<?= $this->start("css");
$this->Html->css(["flexslider/flexslider.css,chosen/chosen.css,http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700"]);
$this->end();
?>
<?= $this->start("script");
$this->Html->script(["jquery.flexslider-min.js",""]);
$this->end();
?>
<div role="main" class="main shop with-sidebar">

    <section class="main-content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9 main-content">

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="product-preview">
                                <div class="flexslider flexsliderPro">
                                    <ul class="slides">
                                        <?= $this->Html->image($product->image, [
                                            'class' => 'img-responsive'
                                        ]); ?>                                                                                     </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="thumb-item thumb-item-list summary">
                                <div class="thumb-item-content">
                                    <h3><?= $product->title ?></h3>

                                    <p class="product-price"><ins><?= '$'."".$product->price ?></ins></p>
                                    <p><?= $product->description ?></p>
                                    <p class="quan">
                                        <label>Qty:</label>
                                        <input type="text" name="quantity" value="1" title="Qty" class="input-text qty">
                                    </p>
                                    <p class="thumb-act thumb-act-more">
                                        <a href="#" class="btn-cart"><i class="fa fa-shopping-cart"></i> <span>Add to Cart</span></a>

                                    </p>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="accordion" class="panel-group">
                        <div class="panel panel-default pgl-panel">
                            <div class="panel-heading">
                                <h4 class="panel-title"> <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse">Description</a> </h4>
                            </div>
                            <div class="panel-collapse collapse in" id="collapseOne">
                                <div class="panel-body">
                                    <hr>
                                    <p><?= $product->description ?></p>
                                </div>
                            </div>
                        </div>
</div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<script>
    $(document).ready(function () {
        $(".thumbnails").magnificPopup({
            type: "image",
            delegate: "a",
            gallery: {
                enabled: true
            }
        });
    });
    $('.addToCart').click(function () {
        var id = $(this).data("id");
        var title = $(this).data("title");
        var price = $(this).data("price");
        var src = $(this).data("src");
        var product = id + ',' + title + ',' + price + ',' + src;


        $.ajax({
            type: "POST",
            data: {data: product},
            url: "<?= Cake\Routing\Router::url(["prefix" => false, "controller" => "Products", "action" => "addToCart"]);?>",
            success: function (data, textStatus, jqXHR) {
                $('#cartPrice').html(parseInt($('#cartPrice').html(), 10) + price);
                $('#cartCount').html(parseInt($('#cartCount').html(), 10) + 1);
            },
            error: function (data, textStatus, jqXHR) {
                alert("Error: " + data + " status: " + textStatus + " jqXHR: " + jqXHR);
            }
        });

    });
</script>
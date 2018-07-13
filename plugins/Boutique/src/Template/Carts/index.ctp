<div class="row">

    <div id="content" class="col-sm-12">
        <h3>Shopping Cart (<?= count($cart) . ' items'?>)</h3>
        <form>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <td class="text-left">Image</td>
                        <td class="text-left">Product Name</td>
                        <td class="text-left">Quantity</td>
                        <td class="text-right">Unit Price</td>
                        <td class="text-right">Total</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cart as $item): ?>
                        <tr>
                            <td class="text-left">
                                <a href="#">
                                    <?= $this->Html->image($item['src'], [
                                        'alt' => 'cart image',
                                        'title' => 'cart image',
                                        'class' => 'thumbnail',
                                        'width' => '100px'
                                    ]); ?>
                                </a>
                            </td>
                            <td class="text-left">
                                <?= $this->Html->Link($item['title'], [
                                    'controller' => 'Products',
                                    'action' => 'view',
                                    $item['id']
                                ]); ?>
                            </td>
                            <td class="text-left">
                                <div class="input-group btn-block" style="max-width: 200px;">
                                    <input type="text" name="quantity" value="1" size="1" class="form-control">
                        <span class="input-group-btn">
                          <button type="submit" data-toggle="tooltip" title="Update" class="btn btn-default"><i
                                  class="fa fa-refresh"></i></button>
                          <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-default"><i
                                  class="fa fa-times-circle" id="remove"></i></button>
                        </span>
                                </div>
                            </td>
                            <td class="text-right"><?= $currency_unit. " " . $item['price']?></td>
                            <td class="text-right"><?= $currency_unit. " " . $item['price']?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
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

                                    <input type='text'  class="input-text qty text" value="1"  name='qty' id='qty' />
                                    <input type='button' class="plus"  name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'/>

                                    <input type='button' class="minus"  name='subtract' onclick='javascript:document.getElementById("qty").value--;' value='-'/>
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


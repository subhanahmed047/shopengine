<div class="row">

    <div id="content" class="col-sm-12">

            <!-- Billing Details -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#collapse-billing" class="accordion-toggle" data-toggle="collapse"
                                               data-parent="#accordion">Step 1: Billing Details <i
                                class="fa fa-angle-down"></i></a></h4>
                </div>
                <div id="collapse-billing" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <fieldset id="account">
                                    <legend>Your personal details</legend>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-firstname">First Name</label>

                                        <?php echo $this->Form->input('customer.first_name', [
                                            'class' => 'form-control',
                                            'id' => 'input-billing-firstname',
                                            'placeholder' => 'First Name',
                                            'label' => false,
                                            'required' => true

                                        ]);
                                        ?>
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-lastname">Last Name</label>
                                        <?php echo $this->Form->input('customer.last_name', [
                                            'class' => 'form-control',
                                            'id' => 'input-billing-lastname',
                                            'placeholder' => 'Last Name',
                                            'label' => false,
                                            'required' => true

                                        ]);
                                        ?>
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-email">Email</label>
                                        <?php echo $this->Form->input('customer.email', [
                                            'class' => 'form-control',
                                            'id' => 'input-billing-email',
                                            'placeholder' => 'Email',
                                            'label' => false,
                                            'type' => 'email',
                                            'required' => true
                                        ]);
                                        ?> </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-phone">Phone</label>
                                        <?php echo $this->Form->input('customer.phone', [
                                            'class' => 'form-control',
                                            'id' => 'input-billing-phone',
                                            'placeholder' => 'Phone',
                                            'label' => false,
                                            'required' => true
                                        ]);
                                        ?>       </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                                <fieldset id="address">
                                    <legend>Your address</legend>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-address-1">Billing Address</label>
                                        <?php echo $this->Form->input('customer.email', [
                                            'class' => 'form-control',
                                            'id' => 'input-billing-address-1',
                                            'placeholder' => 'Email',
                                            'label' => false,
                                            'required' => true
                                        ]);
                                        ?>           </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-city">City/Town</label>
                                        <?php echo $this->Form->input('customer.city', [
                                            'class' => 'form-control',
                                            'id' => 'input-billing-city',
                                            'placeholder' => 'City',
                                            'label' => false,
                                            'required' => true
                                        ]);
                                        ?>                                </div>
                                    <div class="form-group required">
                                        <?php echo $this->Form->input('customer.country', ['options' => ['Pakistan' => 'Pakistan', 'China' => 'China', 'United States of America' => 'United States of America'], [
                                            'class' => 'form-control',
                                            'label'=>false
                                        ]]);?>
                                    </div>
                                </fieldset>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Billing Details -->
        <div id="collapse-payment-method" class="panel-collapse collapse">
            <div class="panel-body">
                <p>Please select a prefered payment method to use on this order.</p>
                <div class="radio">
                    <label>
                        <?php echo $this->Form->radio(
                            'Cash',
                            [
                                ['value' => 'Cash on Delevery']                                            ]
                        );?>
                    </label>
                    <label>
                        <?php echo $this->Form->radio(
                            'Online',
                            [
                                ['value' => 'Online']                                            ]
                        );?>
                    </label>
                </div>
                <div class="buttons">
                    <div class="pull-right">
                        <?php    echo $this->Form->button('Continue', [
                            'id'=>"button-deliver-method", 'data-loading-text'=>"Loading...", 'class'=>"btn btn-primary",
                            'type' => 'button']);?>                                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Payment Method -->
<!-- Confirm Order -->
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title"><a href="#collapse-confirm"
                                   class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Step 2: Confirm Order <i class="fa fa-angle-down"></i></a></h4>
    </div>
    <div id="collapse-confirm" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Model</td>
                    <td class="text-right">Quantity</td>
                    <td class="text-right">Unit Price</td>
                    <td class="text-right">Total</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-left">
                        <a href="#">Waxed canvas laptop bag Navy</a>
                    </td>
                    <td class="text-left">LB002</td>
                    <td class="text-right">1</td>
                    <td class="text-right">$1,178.00</td>
                    <td class="text-right">$1,178.00</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="4" class="text-right"><strong>Sub-Total:</strong></td>
                    <td class="text-right">$980.00</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><strong>Flat Shipping Rate:</strong></td>
                    <td class="text-right">$5.00</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><strong>Eco Tax (-2.00):</strong></td>
                    <td class="text-right">$4.00</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><strong>VAT (20%):</strong></td>
                    <td class="text-right">$197.00</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right"><strong>Total:</strong></td>
                    <td class="text-right">$1,186.00</td>
                </tr>
                </tfoot>
            </table>
            <div class="buttons">
                <div class="pull-right">
                    <?php    echo $this->Form->button('Comfirm Payment', [
                        'id'=>"button-deliver-method", 'data-loading-text'=>"Loading...", 'class'=>"btn btn-primary",
                        'type' => 'button']);?>                                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--/ Confirm Order -->

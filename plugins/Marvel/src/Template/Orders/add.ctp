<?= $this->Form->create($order) ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
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
                                    <?php echo $this->Form->input('customer.billing_address', [
                                        'class' => 'form-control',
                                        'id' => 'input-billing-address-1',
                                        'placeholder' => 'Address',
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
                                <div class="form-group required">
                                    <?php echo $this->Form->input('payment_method', ['options' => ['Payment on Delivery' => 'Payment on Delivery', 'Stripe' => 'Stripe', 'Paypal' => 'Paypal'], [
                                        'class' => 'form-control',
                                        'label'=>false
                                    ]]);?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>

                <?php
                echo '<hr><label>Your Order:</label>';
                echo '<div class="row">
                    <div class="col-sm-8">';
                foreach ($products as $product) {
                    echo '<div class="col-sm-12 form-control">' . $product['title'] . ' X ' . $product['quantity'] . '</div>';
                }
                echo '<div class="col-sm-12 form-control">Total Quantity:' . $quantity . ' | Total Price: ' . $price . '</div>';
                echo '</div></div><hr>';
                ?>

                <?= $this->Form->button(__('Proceed to Checkout'), [
                    'class' => 'btn btn-lg btn-primary'
                ]) ?>
            </div>
        </div>
    </div>

<?= $this->Form->end() ?>
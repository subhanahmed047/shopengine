<div class="row">

    <div id="content" class="col-sm-12">

        <h1>Checkout</h1>
        <div class="panel-group" id="accordion">

            <!-- Login & Register -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#collapse-login" class="accordion-toggle" data-toggle="collapse"
                                               data-parent="#accordion">Step 1: Checkout options <i
                                class="fa fa-angle-down"></i></a></h4>
                </div>
                <div id="collapse-login" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>New Customer</h2>
                                <p>Checkout options</p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="account" value="register">
                                        Register account
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="account" value="guest" checked="checked">
                                        Guest checkout
                                    </label>
                                </div>
                                <p>By creating an account you will be able to shop faster, be up to date on an order's
                                    status, and keep track of the orders you have previously made.</p>
                                <input type="button" value="Continue" id="button-account" data-loading-text="Loading..."
                                       class="btn btn-primary">
                            </div>
                            <div class="col-sm-6">
                                <h2>Returning Customer</h2>
                                <p>I am a returning customer</p>
                                <div class="form-group">
                                    <label class="control-label" for="input-email">E-Mail</label>
                                    <input type="text" name="email" value="" placeholder="E-Mail" id="input-email"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Password</label>
                                    <input type="password" name="password" value="" placeholder="Password"
                                           id="input-password" class="form-control">
                                    <a href="#">Forgotten Password</a>
                                </div>
                                <input type="button" value="Login" id="button-login" data-loading-text="Loading..."
                                       class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Login & Register -->

            <!-- Billing Details -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#collapse-billing" class="accordion-toggle" data-toggle="collapse"
                                               data-parent="#accordion">Step 2: Billing Details <i
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
                                        <input type="text" name="firstname" value="" placeholder="First Name"
                                               id="input-billing-firstname" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-lastname">Last Name</label>
                                        <input type="text" name="lastname" value="" placeholder="Last Name"
                                               id="input-billing-lastname" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-email">Email</label>
                                        <input type="text" name="email" value="" placeholder="Email"
                                               id="input-billing-email" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-phone">Phone</label>
                                        <input type="text" name="phone" value="" placeholder="Phone"
                                               id="input-billing-phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="input-billing-fax">Fax</label>
                                        <input type="text" name="fax" value="" placeholder="Fax" id="input-billing-fax"
                                               class="form-control">
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                                <fieldset id="address">
                                    <legend>Your address</legend>
                                    <div class="form-group">
                                        <label class="control-label" for="input-billing-company">Company</label>
                                        <input type="text" name="company" value="" placeholder="Company"
                                               id="input-billing-company" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-address-1">Address 1</label>
                                        <input type="text" name="address_1" value="" placeholder="Address 1"
                                               id="input-billing-address-1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="input-billing-address-2">Address 2</label>
                                        <input type="text" name="address_2" value="" placeholder="Address 2"
                                               id="input-billing-address-2" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-city">City</label>
                                        <input type="text" name="city" value="" placeholder="City"
                                               id="input-billing-city" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-postcode">Postcode</label>
                                        <input type="text" name="postcode" value="" placeholder="Postcode"
                                               id="input-billing-postcode" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-country">Country</label>
                                        <select name="country_id" id="input-billing-country" class="form-control">
                                            <option value="">United Kingdom</option>
                                        </select>
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-billing-zone">Region / State</label>
                                        <select name="zone_id" id="input-billing-zone" class="form-control">
                                            <option value="">--- Please Select ---</option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Billing Details -->

            <!-- Delivery Details -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#collapse-delivery" class="accordion-toggle" data-toggle="collapse"
                                               data-parent="#accordion">Step 3: Delivery Details <i
                                class="fa fa-angle-down"></i></a></h4>
                </div>
                <div id="collapse-delivery" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-delivery-firstname">First Name</label>
                                        <input type="text" name="firstname" value="" placeholder="First Name"
                                               id="input-delivery-firstname" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-delivery-lastname">Last Name</label>
                                        <input type="text" name="lastname" value="" placeholder="Last Name"
                                               id="input-delivery-lastname" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="input-delivery-company">Company</label>
                                        <input type="text" name="company" value="" placeholder="Company"
                                               id="input-delivery-company" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-delivery-address-1">Address 1</label>
                                        <input type="text" name="address_1" value="" placeholder="Address 1"
                                               id="input-delivery-address-1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="input-delivery-address-2">Address 2</label>
                                        <input type="text" name="address_2" value="" placeholder="Address 2"
                                               id="input-delivery-address-2" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-delivery-city">City</label>
                                        <input type="text" name="city" value="" placeholder="City"
                                               id="input-delivery-city" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-delivery-postcode">Postcode</label>
                                        <input type="text" name="postcode" value="" placeholder="Postcode"
                                               id="input-delivery-postcode" class="form-control">
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-delivery-country">Country</label>
                                        <select name="country_id" id="input-delivery-country" class="form-control">
                                            <option value="">United Kingdom</option>
                                        </select>
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-delivery-zone">Region / State</label>
                                        <select name="zone_id" id="input-delivery-zone" class="form-control">
                                            <option value="">--- Please Select ---</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Delivery Details -->

            <!-- Delivery Method -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#collapse-delivery-method" class="accordion-toggle"
                                               data-toggle="collapse" data-parent="#accordion">Step 4: Delivery Method
                            <i class="fa fa-angle-down"></i></a></h4>
                </div>
                <div id="collapse-delivery-method" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Please select a prefered shipping method to use on this order.</p>
                        <p><strong>Flat Rate</strong></p>
                        <div class="radio">
                            <label>
                                <input type="radio" name="shipping_method" value="" checked="checked">
                                Flat Shipping Rate - $8.00
                            </label>
                        </div>
                        <p><strong>Add comments about your order</strong></p>
                        <p>
                            <textarea name="comment" rows="8" class="form-control"></textarea>
                        </p>
                        <div class="buttons">
                            <div class="pull-right">
                                <input type="button" value="Continue" id="button-delivery-method"
                                       data-loading-text="Loading..." class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Delivery Method -->

            <!-- Payment Method -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#collapse-payment-method" class="accordion-toggle"
                                               data-toggle="collapse" data-parent="#accordion">Step 5: Payment Method <i
                                class="fa fa-angle-down"></i></a></h4>
                </div>
                <div id="collapse-payment-method" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>Please select a prefered payment method to use on this order.</p>
                        <div class="radio">
                            <label>
                                <input type="radio" name="shipping_method" value="" checked="checked">
                                Cash On Delivery
                            </label>
                        </div>
                        <p><strong>Add comments about your order</strong></p>
                        <p>
                            <textarea name="comment" rows="8" class="form-control"></textarea>
                        </p>
                        <div class="buttons">
                            <div class="pull-right">
                                I have read and agree to the <a href="#">Terms & Conditions</a>
                                <input type="checkbox" name="agree" value="1">&nbsp;
                                <input type="button" value="Continue" id="button-payment-method"
                                       data-loading-text="Loading..." class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Payment Method -->

            <!-- Confirm Order -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#collapse-confirm" class="accordion-toggle" data-toggle="collapse"
                                               data-parent="#accordion">Step 6: Confirm Order <i
                                class="fa fa-angle-down"></i></a></h4>
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
                                <input type="button" value="Confirm Order" id="button-confirm"
                                       data-loading-text="Loading..." class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Confirm Order -->

        </div>

    </div>

</div>

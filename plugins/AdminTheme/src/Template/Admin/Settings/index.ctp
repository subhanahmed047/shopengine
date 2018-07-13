<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Settings</h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-6">
                        <?= $this->Form->create('settings', ['url' => ['action' => 'update']]); ?>
                        <?= $this->Form->input('sitename', ['value' => $this->Settings->getSiteName(), 'class' => 'form-control']); ?>
                        <?= $this->Form->input('currency', ['value' => $this->Settings->getCurrencyUnit(), 'class' => 'form-control']); ?>
                        <?= $this->Form->button('Update', ['id' => 'updateSite', 'class' => 'btn btn-success pul-right margin-top-5']); ?>
                        <?= $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
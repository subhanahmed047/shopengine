<?php
function dateToFormate($date, $format = 'd-M-Y h:m a')
{
    return date($format, strtotime($date));
}

$this->assign('title', 'Orders | Flatland Analytics');

echo $this->Html->css([
    'https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css',
    'datatables/tools/css/dataTables.tableTools.css',
]);

echo $this->Html->script([
    'https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js',
    'https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js',
    'datatables/tools/js/dataTables.tableTools.js',
    '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js'
]);

?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>All Orders
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="orders_table" class="table table-bordered table-striped responsive-utilities jambo_table"
                       width="100%">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Orderd By</td>
                        <td>Created At</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($orders as $order) {
                        echo "<tr>";
                            echo "<td>" . $order['id'] . "</td>";
                            echo "<td>" . $order['email'] . "</td>";
                            echo "<td>" . dateToFormate($order['created_at']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(document).ready(function () {
        var oTable = $('#orders_table').dataTable({
            "order": [[0, "desc"]]
        });
    });
</script>
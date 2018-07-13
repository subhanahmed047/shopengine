<?= $this->element('home/welcome', [
    'authUser' => $authUser
]); ?>

<?= $this->element('home/stats', [
    'total_sales' => $total_sales,
    'orders_count' => $orders_count,
    'products_count' => $products_count,
    'users_count' => $users_count
]); ?>
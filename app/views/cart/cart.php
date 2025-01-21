<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>
<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($user_cart)) foreach ($user_cart["items"] as $key => $items): ?>
                            <tr>
                                <th scope="row"><?php echo $key + 1 ?></th>
                                <td><?php echo $items["name"] ?></td>
                                <td>$<?php echo $items["price"] ?></td>
                                <td>
                                    <!-- <input type="number" value=""> -->
                                    <?php echo $items["quantity"] ?>
                                </td>
                                <td>$<?php echo $items["subtotal"] ?></td>
                                <td>
                                    <form class="remove-from-cart-form" data-product-id="<?php echo $items['product_id']; ?>" method="post">
                                        <a class="btn btn-danger remove-from-cart-button">Delete</a>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2">
                                Total Price
                            </td>
                            <td colspan="3">
                                <h3 class="total-price"><?php echo $user_cart['total'] ?? 0 ?> $</h3>
                            </td>
                            <td>
                                <a href="<?= !isset($_SESSION['user']) ?  "login" : "checkout" ?>" class="btn btn-primary">Checkout</a>
                            </td>
                        </tr>
                </table>
            </div>
        </div>
    </div>
</section>
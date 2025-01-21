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
            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <?php foreach ($_SESSION['cart']['items'] as $product): ?>
                            <ul class="list-unstyled">
                                <li class="border p-2 my-1"> <?php echo $product['name']; ?> -
                                    <span class="text-success mx-2 mr-auto bold"><?php echo $product['quantity'] . " x " . $product['price'] . "$"; ?></span>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                    <h3>Total : <?= $_SESSION['cart']['total'] ?> $</h3>
                </div>
            </div>
            <div class="col-8">
                <?php if (isset($_SESSION['statusType'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['statusType']; ?>" role="alert">
                        <?php echo $_SESSION['status']; ?>
                    </div>
                <?php
                    unset($_SESSION['statusType']);
                    unset($_SESSION['status']);
                endif;
                ?>
                <form action="checkout" method="post" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Notes</label>
                            <input type="text" name="notes" id="notes" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="submit" value="Send" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
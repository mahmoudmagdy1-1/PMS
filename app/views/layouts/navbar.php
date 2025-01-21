<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href=".">EraaSoft PMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href=".">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
                <?php if (isset($_SESSION["user"]) && $_SESSION["user"]["role"] == "admin"): ?>
                    <li class="nav-item"><a class="nav-link" href="add-product">Add Product</a></li>
                <?php endif; ?>
            </ul>
            <div class="d-flex align-items-center">
                <?php if (!isset($_SESSION["user"])): ?>
                    <a class="nav-link me-4" href="login">Login</a>
                    <a class="nav-link me-4" href="signup">Sign Up</a>
                <?php else: ?>
                    <a class="nav-link me-4" href="logout">Logout</a>
                <?php endif; ?>
                <a class="btn btn-outline-dark" type="submit" href="cart">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill cart-count">
                        <?php
                        $count = 0;
                        foreach ($_SESSION['cart']['items'] as $item) {
                            $count += $item['quantity'];
                        }
                        echo $count;
                        ?>
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>
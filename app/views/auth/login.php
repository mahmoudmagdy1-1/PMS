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
            <?php if (isset($_SESSION['errors'])): foreach ($_SESSION['errors'] as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
            <?php
                endforeach;
                unset($_SESSION['errors']);
            endif; ?>
            <div class="card p-4 shadow mx-auto" style="width: 22rem;">
                <h4 class="text-center mb-4">Login</h4>
                <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p class="mt-2">Don't have an account? <a href="#">Sign up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
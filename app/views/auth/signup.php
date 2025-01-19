<!-- Header-->
<?php
if (isset($_SESSION["user"])) {
    header("Location: .");
    exit;
}
?>
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
                <h4 class="text-center mb-4">Sign Up</h4>
                <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your full name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p>Already have an account? <a href="#">Log in</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
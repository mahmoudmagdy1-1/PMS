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
            <div class="col-8 mx-auto">
                <?php if (isset($_SESSION['statusType'])): ?>
                    <div class="alert alert-<?php echo $_SESSION['statusType']; ?>" role="alert">
                        <?php echo $_SESSION['status']; ?>
                    </div>
                <?php
                    unset($_SESSION['statusType']);
                    unset($_SESSION['status']);
                endif;
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post" class="form border my-2 p-3">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Message</label>
                            <textarea name="message" id="" class="form-control" rows="7"></textarea>
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
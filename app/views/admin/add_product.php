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
                <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post" class="form border my-2 p-3" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="image">Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <!-- <div class="mb-3">
                        <label for="image_link">Image URL</label>
                        <input type="url" name="image_link" id="image_link" class="form-control">
                    </div> -->
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="7"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sale_percentage">Sale Percentage</label>
                        <input type="number" name="sale_percentage" id="sale_percentage" value="0" class="form-control" min="0" max="100">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Add" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
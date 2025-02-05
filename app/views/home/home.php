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
         <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
             <?php foreach ($products as $product): ?>
                 <div class="col mb-5">
                     <div class="card h-100">
                         <!-- Sale badge-->
                         <?php if ($product['sale_percentage'] > 0): ?>
                             <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                         <?php endif; ?>
                         <!-- Product image-->
                         <img class="card-img-top" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                         <!-- Product details-->
                         <div class="card-body p-4">
                             <div class="text-center">
                                 <!-- Product name-->
                                 <h5 class="fw-bolder"><?php echo $product['name']; ?></h5>
                                 <!-- Product price-->
                                 <?php if ($product['sale_percentage'] > 0): ?>
                                     <span class="text-muted text-decoration-line-through"><?php echo $product['price'] . "$"; ?></span>
                                     <?php
                                        echo $product['price'] - ceil($product['price'] * $product['sale_percentage'] / 100)  . "$"; ?>
                                 <?php else: echo $product['price']  . "$"; ?>
                                 <?php endif; ?>
                             </div>
                         </div>
                         <!-- Product actions-->
                         <form class="add-to-cart-form card-footer p-4 pt-0 border-top-0 bg-transparent mx-auto" data-product-id="<?php echo $product['id']; ?>" method="POST">
                             <input type="number" name="quantity" value="1" min="1" class=" mx-auto mb-2">
                             <div class="text-center"><button type="button" class="btn btn-outline-dark mx-auto add-to-cart-button">Add to cart</button></div>
                         </form>
                     </div>
                 </div>
             <?php endforeach; ?>
         </div>
     </div>
 </section>
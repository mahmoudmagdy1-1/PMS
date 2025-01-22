/*!
* EraaSoft PMS - Shop Homepage v5.0.6 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2023 EraaSoft PMS
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project

// cart.js

document.addEventListener("DOMContentLoaded", function () {
    initCart();
});

function initCart() {
    const addToCartForms = document.querySelectorAll(".add-to-cart-form");
    const removeFromCartForms = document.querySelectorAll(".remove-from-cart-form");

    addToCartForms.forEach(form => {
        const addButton = form.querySelector(".add-to-cart-button");

        addButton.addEventListener("click", function () {
            const productId = form.dataset.productId;
            const quantity = form.querySelector("input[name='quantity']").value;
            if(quantity > 10){
                alert("Maximum quantity is 10");
            }
            else if(quantity < 1){
                alert("Minimum quantity is 1");
            }
            else addToCart(productId, quantity);
        });
    });
    
    removeFromCartForms.forEach(form => {
        const removeButton = form.querySelector(".remove-from-cart-button");

        removeButton.addEventListener("click", function () {
            const productId = form.dataset.productId;
            removeFromCart(productId, form);
        });
    });
}

function addToCart(productId, quantity) {
    const payload = { product_id: productId, quantity: quantity };

    fetch("cart/add", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(payload)
    })
    .then(response => {
        return response.json();
    })
    .then(data => handleResponse(data, "add"))
    .catch(error => handleError(error, "add"));
}

function removeFromCart(productId, form) {

    fetch("cart/remove", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ product_id: productId })
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        handleResponse(data, "remove");
        productRemove(form);
     })
    .catch(error => handleError(error, "remove"));
}

function handleResponse(data, operation) {
    if (data.success) {
        updateCartUI(data);
        if(operation === "remove") updateTotal(data);
    } else {
        alert(`Failed to ${operation} product to cart: " + data.message`);
    }
}

function handleError(error, operation) {
    console.error(error);
    alert(`An error occurred while ${operation}ing the product to the cart. Please try again.`);
}

function productRemove(form) {
    const el = form.closest("tr");
    el.remove();
}

function updateTotal(data){
    const totalPriceElement = document.querySelector(".total-price");
    totalPriceElement.textContent = data.total , " $";
}
function updateCartUI(data) {
    const cartCountElement = document.querySelector(".cart-count");
    cartCountElement.textContent = data.count;
}

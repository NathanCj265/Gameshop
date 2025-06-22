let cart = [];

function addToCart(itemName) {
    cart.push(itemName);
    renderCart();
}

function renderCart() {
    const cartItems = document.getElementById('cart-items');
    const cartCount = document.getElementById('cart-count');
    cartItems.innerHTML = '';
    cart.forEach((item, idx) => {
        const li = document.createElement('li');
        li.textContent = item;
        const removeBtn = document.createElement('button');
        removeBtn.textContent = 'Remove';
        removeBtn.onclick = (e) => {
            e.stopPropagation();
            cart.splice(idx, 1);
            renderCart();
        };
        li.appendChild(removeBtn);
        cartItems.appendChild(li);
    });
    if (cartCount) cartCount.textContent = cart.length;
}

document.addEventListener('DOMContentLoaded', function() {
    const cartToggle = document.getElementById('cart-toggle');
    const cartDiv = document.getElementById('cart');
    if (cartToggle && cartDiv) {
        cartToggle.addEventListener('click', function(e) {
            e.preventDefault();
            cartDiv.classList.toggle('active');
        });
    
        document.addEventListener('click', function(e) {
            if (!cartDiv.contains(e.target) && !cartToggle.contains(e.target)) {
                cartDiv.classList.remove('active');
            }
        });
    }
    renderCart();
});
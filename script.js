
  // Function to add a product to the cart
  function addToCart(productName, price) {
    // Create a new cart item element
    const cartItem = document.createElement('div');
    cartItem.classList.add('cart-item');
    cartItem.innerHTML = `
      <span class="product-name">${productName}</span>
      <span class="product-price">€${price.toFixed(2)}</span>
      <button class="delete-button" onclick="deleteCartItem(this)">Delete</button>
    `;

    // Append the cart item to the cart container
    const cartContainer = document.getElementById('cartContainer');
    cartContainer.appendChild(cartItem);

    // Update total price and cart display
    updateCartDisplay();

    // Save cart data to a cookie
    saveCartData();
  }

  // Function to update the total price and cart display
  function updateCartDisplay() {
    // Update total price
    updateTotalPrice();

    // Slide down the cart container
    const cartContainer = document.getElementById('cartContainer');
    cartContainer.classList.add('show-cart');

    // Update the red circle banner
    updateRedCircleBanner();
  }

  // Function to update the red circle banner
  function updateRedCircleBanner() {
    const cartItems = document.getElementsByClassName('cart-item');
    const redCircleBanner = document.getElementById('redCircleBanner');
    redCircleBanner.textContent = cartItems.length;
  }

  // Function to toggle the visibility of the cart
  function toggleCart() {
    const cartContainer = document.getElementById('cartContainer');
    cartContainer.classList.toggle('show-cart');

    // Update the red circle banner when hiding the cart
    if (!cartContainer.classList.contains('show-cart')) {
      updateRedCircleBanner();
    }
  }

  // Function to delete a cart item
  function deleteCartItem(button) {
    const cartItem = button.closest('.cart-item');
    cartItem.remove();

    // Update total price and cart display after deletion
    updateCartDisplay();

    // Save cart data to a cookie after deletion
    saveCartData();
  }

  // Function to update the total price in the cart
  function updateTotalPrice() {
    const cartItems = document.getElementsByClassName('cart-item');
    let totalPrice = 0;

    // Calculate the total price
    Array.from(cartItems).forEach(item => {
      const priceString = item.querySelector('.product-price').textContent;
      const price = parseFloat(priceString.replace('€', ''));
      totalPrice += price;
    });

    // Display the total price
    const totalElement = document.getElementById('totalPrice');
    totalElement.textContent = `Total: €${totalPrice.toFixed(2)}`;
  }

  // Function to save cart data to a cookie
  function saveCartData() {
    const cartContainer = document.getElementById('cartContainer');
    const cartItems = cartContainer.getElementsByClassName('cart-item');

    // Extract product names and prices from cart items
    const products = Array.from(cartItems).map(item => {
      const productName = item.querySelector('.product-name').textContent;
      const priceString = item.querySelector('.product-price').textContent;
      const price = parseFloat(priceString.replace('€', ''));
      return { productName, price };
    });

    // Save products to a cookie
    document.cookie = `cart=${JSON.stringify(products)}; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
  }

  // Function to load cart data from a cookie
  function loadCartData() {
    const cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)cart\s*=\s*([^;]*).*$)|^.*$/, "$1");
    if (cookieValue) {
      const cartContainer = document.getElementById('cartContainer');
      const products = JSON.parse(cookieValue);

      // Create cart items based on saved products
      products.forEach(product => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
          <span class="product-name">${product.productName}</span>
          <span class="product-price">€${product.price.toFixed(2)}</span>
          <button class="delete-button" onclick="deleteCartItem(this)">Delete</button>
        `;
        cartContainer.appendChild(cartItem);
      });

      // Update total price after loading data
      updateTotalPrice();
    }
  }

  // Load cart data when the page loads
  loadCartData();


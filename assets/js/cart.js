
function updateTotalPrice() {
  let totalPrice = 0;

  // Tính tổng giá tiền của toàn bộ giỏ hàng
  for (let i = 0; i < cartItems.length; i++) {
      totalPrice += cartItems[i].price * cartItems[i].quantity;
  }

  // Hiển thị tổng giá tiền lên trang web
  document.getElementById("total-price").textContent = totalPrice.toLocaleString();
}

function updateQuantity(index, quantity) {
  cartItems[index].quantity = parseInt(quantity);
  updateTotalPrice();
}

function increaseQuantity(index) {
  const quantityInput = document.getElementById(`quantity-product${index + 1}`);

  // Tăng số lượng lên 1
  const currentValue = parseInt(quantityInput.value);
  const newValue = currentValue + 1;

  // Giới hạn số lượng tối đa là 10
  if (newValue <= 10) {
      quantityInput.value = newValue;
      updateQuantity(index, newValue);
  }
}

function decreaseQuantity(index) {
  const quantityInput = document.getElementById(`quantity-product${index + 1}`);

  // Giảm số lượng xuống 1
  const currentValue = parseInt(quantityInput.value);
  const newValue = currentValue - 1;

  // Giới hạn số lượng tối thiểu là 1
  if (newValue >= 1) {
      quantityInput.value = newValue;
      updateQuantity(index, newValue);
  }
}

// Tính tổng giá tiền ban đầu khi trang web được tải xong
document.addEventListener("DOMContentLoaded", function() {
  updateTotalPrice();
});


function increaseQuantity(index) {
  const quantityInput = document.getElementById(`quantity-product${index + 1}`);

  // Tăng số lượng lên 1
  const currentValue = parseInt(quantityInput.value);
  const newValue = currentValue + 1;

  // Giới hạn số lượng tối đa là 10
  if (newValue <= 10) {
      quantityInput.value = newValue;
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
  }
}


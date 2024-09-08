document.addEventListener('DOMContentLoaded', function () {

  // form logic
  const sizebuttons = document.querySelectorAll('.size-option');
  const totalPriceField = document.querySelector('.product-price');
  const colorbuttons = document.querySelectorAll('.color-option');
  const selectedSizeInput = document.getElementById('selectedSize');
  const selectedColorInput = document.getElementById('selectedColor');

  sizebuttons.forEach((btn) => {
    btn.addEventListener('click', function () {
      sizebuttons.forEach((btn) => btn.classList.remove('active'));
      btn.classList.add('active');
      const optionValue = Number(btn.getAttribute('data-option-value'));
      const selectedSize = this.getAttribute('data-size');
      console.log('🚀 ~ selectedSize:', selectedSize);
      totalPriceField.textContent = optionValue;
      if (selectedSize) selectedSizeInput.value = selectedSize;
    });
  });

  colorbuttons.forEach((btn) => {
    btn.addEventListener('click', function () {
      const colorValue = btn.getAttribute('data-option-value');
      const selectedColor = btn.getAttribute('name');
      if (selectedColor)
        selectedColorInput.value = selectedColor + ':' + colorValue;
    });
  });

  function validatePhoneNumber(phoneNumber) {
    const phonePattern = /^(\+?7|8)?9\d{9}$/;
    return phonePattern.test(phoneNumber);
  }

  function validateForm() {
    const phone = document.getElementById('phone').value;

    if (!validatePhoneNumber(phone)) {      console.log('🚀 ~ validateForm ~ phone:', phone);
      alert(
        'Неверный формат номера телефона. Введите номер в формате +79171234567.'
      );
      return false; // Не отправляем форму
    }
    return true;
  }

  try {
    document
      .getElementById('contactForm')
      .addEventListener('submit', function (e) {
        e.preventDefault();

        // Валидация формы
        if (validateForm()) {
          const formData = new FormData(this);

          fetch('/wp-content/themes/your-theme/functions.php', {
            method: 'POST',
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.success) {
                window.location.href = data.whatsapp_link;
              } else {
                alert('Ошибка при отправке данных: ' + data.message);
              }
            })
            .catch((error) => console.error('Ошибка:', error));
        }
      });
  } catch (error) {
    console.error('There has been a problem with your fetch operation:', error);
  }


})

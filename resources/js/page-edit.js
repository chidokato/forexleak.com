function delete_row(e) {
    e.parentElement.remove();
}

document.querySelectorAll('.price-input').forEach(function (input) {
    input.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, ''); // Loại bỏ ký tự không phải số
        value = new Intl.NumberFormat('vi-VN').format(value); // Định dạng số theo kiểu Việt Nam
        e.target.value = value;
    });
});

document.querySelector('.price-input').addEventListener('input', function() {
    let price = this.value.replace(/\./g, ''); // Bỏ dấu chấm để lấy giá trị số
    if (price) {
        let priceInWords = numberToWords(Number(price));
        document.querySelector('.viewprice').textContent = priceInWords;
    } else {
        document.querySelector('.viewprice').textContent = '';
    }
});
function numberToWords(number) {
    const units = [
        { value: 1E9, suffix: " tỷ" },
        { value: 1E6, suffix: " triệu" },
        { value: 1E3, suffix: " nghìn" },
        { value: 1, suffix: " đồng" }
    ];
    for (let i = 0; i < units.length; i++) {
        if (number >= units[i].value) {
            let value = (number / units[i].value).toFixed(1).replace('.0', '');
            return value + units[i].suffix;
        }
    }
}

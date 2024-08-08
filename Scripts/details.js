const urlParams = new URLSearchParams(window.location.search);
const bookId = urlParams.get('id');

fetch(`details.php?id=${bookId}`)
    .then(response => response.json())
    .then(data => {
        let output = `
            <h2>${data.title}</h2>
            <p><strong>Yazar:</strong> ${data.author}</p>
            <p><strong>Fiyat:</strong> ${data.price} TL</p>
            <p>${data.description}</p>
        `;
        document.getElementById('bookDetails').innerHTML = output;
    });

document.getElementById('addToCart').addEventListener('click', function () {
    fetch('php/Cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `id=${bookId}`
    })
        .then(response => response.json())
        .then(data => {
            alert('Kitap sepete eklendi.');
        });
});

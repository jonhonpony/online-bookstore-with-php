function searchBooks() {
    const query = document.getElementById('searchBox').value;
    fetch(`search_books.php?query=${query}`)
        .then(response => response.json())
        .then(data => {
            const resultsDiv = document.getElementById('searchResults');
            resultsDiv.innerHTML = '';
            data.forEach(book => {
                const bookDiv = document.createElement('div');
                bookDiv.innerHTML = `<h3>${book.title}</h3><p>${book.author}</p><button onclick="viewDetails(${book.id})">Detaylar</button>`;
                resultsDiv.appendChild(bookDiv);
            });
        })
        .catch(error => console.error('Error:', error));
}
document.addEventListener('DOMContentLoaded', () => {
    fetch('php/get_all_books.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            displayBooks(data, 'allBooks');
        })
        .catch(error => console.error('Error:', error));
});

function searchBooks() {
    const query = document.getElementById('searchBox').value;
    if (query.trim() === '') {
        fetch('php/get_all_books.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                displayBooks(data, 'results');
            })
            .catch(error => console.error('Error:', error));
    } else {
        fetch(`php/search.php?query=${query}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                displayBooks(data, 'results');
            })
            .catch(error => console.error('Error:', error));
    }
}

function displayBooks(books, elementId) {
    const resultsDiv = document.getElementById(elementId);
    resultsDiv.innerHTML = '';
    books.forEach(book => {
        const bookDiv = document.createElement('div');
        bookDiv.className = 'col-md-4 mb-4';
        bookDiv.innerHTML = `
                <div class="card h-100">
                    <img src="${book.cover_image}" class="card-img-top" alt="${book.title}">
                    <div class="card-body">
                        <h5 class="card-title">${book.title}</h5>
                        <p class="card-text">${book.author}</p>
                        <p class="card-text">${book.price} TL</p>
                        <button class="btn btn-primary" onclick="viewDetails(${book.id})">Detaylar</button>
                        <button class="btn btn-success" onclick="addToCart(${book.id})">Sepete Ekle</button>
                    </div>
                </div>
            `;
        resultsDiv.appendChild(bookDiv);
    });
}

function viewDetails(bookId) {
    fetch(`php/get_book_details.php?id=${bookId}`)
        .then(response => response.json())
        .then(data => {
            const bookDetailsContent = document.getElementById('bookDetailsContent');
            bookDetailsContent.innerHTML = `
                    <h5>${data.title}</h5>
                    <p><strong>Yazar:</strong> ${data.author}</p>
                    <p><strong>Fiyat:</strong> ${data.price} TL</p>
                    <p><strong>Açıklama:</strong> ${data.description}</p>
                `;
            const bookDetailsModal = new bootstrap.Modal(document.getElementById('bookDetailsModal'));
            bookDetailsModal.show();
        })
        .catch(error => console.error('Error:', error));
}

// Sepet sayısını tutmak için bir değişken
let cartCount = 0;

function addToCart(bookId) {
    $.post('php/cart.php', { action: 'add', book_id: bookId }, function (response) {
        const data = JSON.parse(response);
        if (data.status === 'success') {
            alert('Kitap sepete eklendi!');
            cartCount++; // Sepet sayısını artır
            updateCartCounter(); // Sepet sayacını güncelle
        } else if (data.status === 'already_added') {
            alert('Kitap zaten sepette!');
        } else {
            alert('Bir hata oluştu!');
        }
    });
}

function updateCartCounter() {
    $('#cart-counter').text(cartCount); // Sepet sayacını güncelle
}

// Sayfa yüklendiğinde sepet sayısını sıfırla
$(document).ready(function () {
    cartCount = parseInt($('#cart-counter').text(), 10) || 0;
});




// remove items from cart
function removeFromCart(bookId) {
    fetch('php/cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `action=remove&book_id=${bookId}`
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Kitap sepetten kaldırıldı!');
                location.reload();
            } else {
                alert('Kitap sepetten kaldırılamadı.');
            }
        })
        .catch(error => console.error('Error:', error));
}
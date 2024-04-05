document.addEventListener('DOMContentLoaded', function() {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartTotal = document.getElementById('cart-total');
    const notification = document.querySelector('.notification');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            const itemId = button.closest('.cart-item').getAttribute('data-id');
            const itemPrice = parseFloat(button.getAttribute('data-price'));

            // Adicionar item ao carrinho
            addToCart(itemId, itemPrice);

            // Atualizar o total de itens no cabeçalho
            cartTotal.textContent = parseInt(cartTotal.textContent) + 1;

            // Exibir mensagem de confirmação
            notification.style.display = 'block';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 2000);
        });
    });

    function addToCart(itemId, itemPrice) {
        // Aqui você pode implementar a lógica para adicionar o item ao carrinho no backend
        // Por enquanto, vamos apenas armazenar no localStorage para fins de demonstração
        let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : {};
        cart[itemId] = cart[itemId] ? cart[itemId] + 1 : 1;
        localStorage.setItem('cart', JSON.stringify(cart));
    }
});

document.addEventListener('keydown', function(event) {
    if (event.shiftKey) {
        switch (event.key.toLowerCase()) {
            case 'd':
                document.getElementById('dinheiro').checked = true;
                break;
            case 'p':
                document.getElementById('pix').checked = true;
                break;
            case 'c':
                document.getElementById('cartao_credito').checked = true;
                break;
            case 'b':
                document.getElementById('cartao_debito').checked = true;
                break;
            default:
                break;
        }
    }

    if (event.shiftKey && event.key.toLowerCase() === 'pageup') {
        document.getElementById('form_pagamento').submit();
    }
});
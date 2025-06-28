function generateProductNumber() {
    const now = new Date();

    const year   = now.getFullYear();           // 2025
    const month  = String(now.getMonth() + 1).padStart(2, '0'); // 06
    const day    = String(now.getDate()).padStart(2, '0');      // 12
    const hour   = String(now.getHours()).padStart(2, '0');     // 16
    const minute = String(now.getMinutes()).padStart(2, '0');   // 30
    const second = String(now.getSeconds()).padStart(2, '0');   // 45

    // Sufixo aleatório de 3 dígitos
    const random = Math.floor(Math.random() * 900 + 100); // 100–999

    // Monta o código: AAAAMMDDHHMMSS + random
    const productNumber = `${year}${month}${day}${hour}${minute}${second}${random}`;

    document.getElementById('product_number').value = productNumber;
}

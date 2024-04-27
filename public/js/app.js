

document.addEventListener("alpine:init", () => {
    Alpine.data("products", () => ({
      items: [
        { id: 1, name: "Blue Plaid Blazer", img: "1.jpg", price: 200000 },
        { id: 2, name: "Green Blazer", img: "2.jpg", price: 250000 },
        { id: 3, name: "Red Blazer", img: "3.jpg", price: 300000 },
        { id: 4, name: "Striped Gray Blazer", img: "4.jpg", price: 350000 },
        { id: 5, name: "Bright Blue Blazer", img: "5.jpg", price: 300000 },
      ],
    }));
  
    Alpine.store("cart", {
      items: [],
      total: 0,
      quantity: 0,
      add(newItem) {
        // cek apakah ada barang sama di cart
        const cariItem = this.items.find((item) => item.id === newItem.id);
  
        // jika belum ada / cart kosong
        if (!cariItem) {
          this.items.push({ ...newItem, quantity: 1, total: newItem.price });
          this.quantity++;
          this.total += newItem.price;
        } else {
          // jika barang sudah ada, cek barang sama atau beda dengan yg ada di cart
          this.items = this.items.map((item) => {
            // jika barang berbeda
            if (item.id !== newItem.id) {
              return item;
            } else {
              // jika barang sudah ada tambah quantity dan total
              item.quantity++;
              item.total = item.price * item.quantity;
              this.quantity++;
              this.total += item.price;
              return item;
            }
          });
        }
      },
      remove(id) {
        // ambil iitem yang akan dihapus
        const cariItem = this.items.find((item) => item.id === id);
  
        // jika item lebih dari 1
        if (cariItem.quantity > 1) {
          this.items -
            this.items.map((item) => {
              // jika buakan barang yg di klik
              if (item.id !== id) {
                return item;
              } else {
                item.quantity--;
                item.total = item.price * item.quantity;
                this.quantity--;
                this.total -= item.price;
                return item;
              }
            });
        } else if (cariItem.quantity === 1) {
          // jika barang sisa 1
          this.items = this.items.filter((item) => item.id !== id);
          this.quantity--;
          this.total -= cariItem.price;
        }
      },
    });
  });
  
  // konversi rupiah
  const rupiah = (number) => {
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
      minimumFractionDigits: 0,
    }).format(number);
  };
  
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JazOrJas</title>

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Feather Icon -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- AlpineJs -->
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"
    ></script>

    <!-- App -->
    <script src="js/app.js"></script>
  </head>
  <body>
    <!-- Navbar start -->
    <nav class="navbar" x-data>
      <a href="#" class="navbar-logo">Jazz<span>Or</span><span1>Jas</span1></a>

      <div class="navbar-nav">
        <a href="#home">Beranda</a>
        <a href="#about">Tentang Kami</a>
        <a href="#products">Produk</a>
        <a href="#contact">Kontak</a>
        <!-- Authentication start -->
        @if (Route::has('login'))
          @auth
            @php
              header("Location: /dashboard");
              exit();
            @endphp
          @else
            <a href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}">Register</a>
            @endif
          @endauth
        @endif
        <!-- Authentication end -->
      </div>

      <div class="navbar-extra">
        <a href="#" id="search-button"><i data-feather="search"></i></a>

        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>

      <div class="search-form">
        <input type="search" id="search-box" placeholder="Cari disini..." />
        <label for="search-box"><i data-feather="search"></i></label>
      </div>
      <!-- Search Form end -->

      <!-- Shopping Cart start -->
      <div class="shopping-cart">
        <template x-for="(item, index) in $store.cart.items" x-key="index">
          <div class="cart-item">
            <img :src="'img/products/' + item.img" :alt="item.name" />
            <div class="item-detail">
              <h3 x-text="item.name"></h3>
              <div class="item-price">
                <span x-text="rupiah(item.price)"></span> &times;
                <button id="remove" @click="$store.cart.remove(item.id)">
                  &minus;
                </button>
                <span x-text="item.quantity"></span>
                <button id="add" @click="$store.cart.add(item)">&plus;</button>
                &equals;
                <span x-text="rupiah(item.total)"></span>
              </div>
            </div>
          </div>
        </template>
        <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem">
          Keranjang Kosong
        </h4>
        <h4 x-show="$store.cart.items.length">
          Total : <span x-text="rupiah($store.cart.total)"></span>
        </h4>

        <div class="form-container" x-show="$store.cart.items.length">
          <form action="" id="checkoutForm">
            <h5>Detail Pembeli</h5>
            <label for="name">
              <span>Nama</span>
              <input type="text" name="name" id="name" />
            </label>
            <label for="email">
              <span>Email</span>
              <input type="email" name="email" id="email" />
            </label>
            <label for="phone">
              <span>NO HP</span>
              <input type="number" name="phone" id="phone" autocomplete="off" />
            </label>

            <button
              class="checkout-button"
              type="submit"
              id="checkout-button"
              value="Checkout"
            >
              Checkout
            </button>
          </form>
        </div>
      </div>
      <!-- Shopping Cart end -->
    </nav>
    <!-- Navbar end -->

    <!-- Hero Section start -->
    <section class="hero" id="home">
      <main class="content">
        <h1><span>Harmoni</span> Dalam Setiap <span1>Jahitan</span1></h1>
        <p>
          Harmoni yang sempurna memberikan pengalaman berpakaian yang elegan dan
          memuaskan, setiap jahitan memberikan kesempurnaan dan kepercayaan diri
          kepada pemakainya.
        </p>
        <a href="#" class="cta" id=beli-sekarang>Beli Sekarang</a>
        <div class="alert alert-success" id="success-alert" style="display: none; margin-top: 10px;">
          Anda harus login untuk melakukan pembelian
        </div>
        <script>
            var beliButton = document.getElementById('beli-sekarang');

            // Get the alert element
            var successAlert = document.getElementById('success-alert');

            // Add a click event listener to the button
            beliButton.addEventListener('click', function(event) {
                event.preventDefault();

                // Show the alert
                successAlert.style.display = 'block';

                // Hide the alert after 3 seconds (3000 milliseconds)
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 3000); // 3000 milliseconds = 3 seconds
            });
        </script>
      </main>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start-->
    <section id="about" class="about">
      <h2><span>Tentang</span> Kami</h2>

      <div class="row">
        <div class="about-img">
          <img src="img/tentang-kami.jpg" alt="Tentang Kami" />
        </div>
        <div class="content">
          <h3>Kenapa harus JazzOrJas?</h3>
          <p>
            JazzOrJas menggunakan bahan berkualitas tinggi dan teknik jahitan
            yang presisi. Setiap produk dibuat dengan standar kualitas yang
            tinggi, sehingga Anda dapat yakin bahwa Anda mendapatkan produk yang
            tahan lama dan berkualitas.
          </p>
          <p>
            JazzOrJas menawarkan koleksi stelan jas yang tidak hanya elegan,
            tetapi juga sesuai dengan tren mode terkini. Dari gaya klasik hingga
            yang lebih modern, Anda akan menemukan pilihan yang sesuai dengan
            preferensi dan gaya Anda.
          </p>
        </div>
      </div>
    </section>
    <!-- About Section end-->

    <!-- Product Section start -->
    <section id="products" class="products" x-data="products">
      <h2><span>Produk</span> Kami</h2>
      <p>Berikut produk-produk jas pria maupun wanita yang kami tawarkan.</p>

      <div class="row">
        <template x-for="(item, index) in items" x-key="index">
          <div class="product-card">

            <div class="product-image">
              <img :src="'img/products/' + item.img" :alt="item.name" />
            </div>
            <div class="product-content">
              <h3 x-text="item.name"></h3>
              <div class="product-stars">
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
                <svg
                  width="24"
                  height="24"
                  fill="currentColor"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#star" />
                </svg>
              </div>
              <div class="product-price">
                <span x-text="rupiah(item.price)"></span>
              </div>
            </div>
          </div>
        </template>
      </div>
    </section>
    <!-- Products Section end -->

    <!-- Contact Section start -->
    <section id="contact" class="contact">
      <h2><span>Kontak</span> Kami</h2>
      <p>Hubungi kami jika anda memerlukan sesuatu.</p>

      <div class="row">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.466070126556!2d107.69547067504405!3d-6.954219293046064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c39eda4d8f51%3A0xb9f602de908f32fb!2sSummarecon%20Mall%20Bandung!5e0!3m2!1sid!2sid!4v1710987784600!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="map"
        ></iframe>

        <form action="">
          <div class="input-group">
            <i data-feather="user"></i>
            <input type="text" placeholder="nama" />
          </div>
          <div class="input-group">
            <i data-feather="mail"></i>
            <input type="text" placeholder="email" />
          </div>
          <div class="input-group">
            <i data-feather="phone"></i>
            <input type="text" placeholder="no hp" />
          </div>
          <div class="input-group">
            <i data-feather="message-square"></i>
            <input type="text" placeholder="pesan" />
          </div>
          <button type="submit" class="btn">Kirim pesan</button>
        </form>
      </div>
    </section>
    <!-- Contact Section end -->

    <!-- Footer start -->
    <footer>
      <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
      </div>

      <div class="links">
        <a href="#home">Beranda</a>
        <a href="#about">Tentang Kami</a>
        <a href="#product">Produk</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="credit">
        <p>Created by <a href="">JazzOrJas</a>. | &copy; 2024.</p>
      </div>
    </footer>
    <!-- Footer start -->

    <!-- Modal Box Item Detail start -->
    <div class="modal" id="item-detail-modal">
      <div class="modal-container">
        <a href="#" class="close-icon"><i data-feather="x"></i></a>
        <div class="modal-content">
          <img src="img/products/1.jpg" alt="Product 1" />
          <div class="product-content">
            <h3>Product 1</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit.
              Provident, tenetur cupiditate facilis obcaecati ullam maiores
              minima quos perspiciatis similique itaque, esse rerum eius
              repellendus voluptatibus!
            </p>
            <div class="product-stars">
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star" class="star-full"></i>
              <i data-feather="star"></i>
            </div>
            <div class="product-price">IDR 200K <span>IDR 55K</span></div>
            <a href="#"
              ><i data-feather="shopping-cart"></i> <span>add to cart</span></a
            >
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Box Item Detail end -->

    <!-- Feather Icon -->
    <script>
      feather.replace();
    </script>

    <!-- Script -->
    <script src="js/script.js"></script>
  </body>
</html>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JazOrJas</title>
    <!-- midtrans connect -->
    <script type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="<?php echo htmlspecialchars(config('midtrans.client_key')); ?>"></script>
    <!-- ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
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
  <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>
    <!-- Authentication -->
    <?php if(auth()->guard()->check()): ?>
      <?php else: ?>
          <?php
                  header("Location: /index");
                  exit();
          ?>
    <?php endif; ?>
    <!-- Authentication end -->
    <!-- Navbar start -->
    <nav class="navbar" x-data>
      <a href="#" class="navbar-logo">Jazz<span>Or</span><span1>Jas</span1></a>

      <div class="navbar-nav">
        <a href="#home">Beranda</a>
        <a href="#about">Tentang Kami</a>
        <a href="#products">Produk</a>
        <a href="#contact">Kontak</a>
      </div>

      <div class="navbar-extra">
        <a href="#" id="search-button"><i data-feather="search"></i></a>
        <a href="#" id="shopping-cart-button"
          ><i data-feather="shopping-cart"></i>
          <span
            class="quantity-badge"
            x-show="$store.cart.quantity"
            x-text="$store.cart.quantity"
          ></span>
        </a>
        <!-- profile start -->
        <a href="#" id="profile-button"><i data-feather="user"></i></a>
        <div class="profile-dropdown">
                <ul class="profile-dropdown-list">
                  <li class="profile-dropdown-list-item">
                    <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('profile.edit')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('profile.edit'))]); ?>
                      <i class="fa-regular fa-user"></i>
                      Edit Profile
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                  </li>



                  <li class="profile-dropdown-list-item">
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                      <?php echo csrf_field(); ?>
                      <?php if (isset($component)) { $__componentOriginald69b52d99510f1e7cd3d80070b28ca18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.responsive-nav-link','data' => ['href' => route('logout'),'onclick' => 'event.preventDefault();
                                          this.closest(\'form\').submit();']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('responsive-nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('logout')),'onclick' => 'event.preventDefault();
                                          this.closest(\'form\').submit();']); ?>
                          <i class="fa-solid fa-arrow-right-from-bracket"></i>
                          Log out
                       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $attributes = $__attributesOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__attributesOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18)): ?>
<?php $component = $__componentOriginald69b52d99510f1e7cd3d80070b28ca18; ?>
<?php unset($__componentOriginald69b52d99510f1e7cd3d80070b28ca18); ?>
<?php endif; ?>
                    </form>
                  </li>


                  
                </ul>
              </div>
        <!-- profile end-->      
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>

      </div>

      

      <div class="search-form">
        <input type="search" id="search-box" placeholder="Cari disini..." />
        <label for="search-box"><i data-feather="search"></i></label>
      </div>
      <!-- Search Form end -->
      <!-- profile dropdown -->

      
      <!-- profile dropdown end -->
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
          
          <form action="<?php echo e(url('checkout')); ?>" method="POST" id="checkoutForm">
            <?php echo csrf_field(); ?>
            <h5></h5>
            <label for="qty" style="display: none;">
                <input type="hidden" name="qty" id="qty" x-bind:value="$store.cart.quantity" />
            </label>
            <label for="total_price" style="display: none;">
                <input type="hidden" name="total_price" id="total_price" x-bind:value="$store.cart.total"/>
            </label>
            <label for="status" style="display: none;">
                <input type="hidden" name="status" id="status" value="Unpaid"/>
            </label>
            

            <div>
              <input class="checkout-button" type="submit" value="Checkout">
            </div>
          </form>
          <!-- button script checkout -->
          <script type="text/javascript">
            $(document).ready(function()
              {
                $('#checkoutForm').on('submit',function(event)
                {
                  event.preventDefault();
                  jQuery.ajax
                  ({
                    url:"<?php echo e(url('checkout')); ?>",
                    data:jQuery('#checkoutForm').serialize(),
                    type:'post',
                    success:function(result){
                      window.snap.pay(result.snapToken,{
                        onSuccess: function(result){
                          /* You may add your own implementation here */
                        },
                        onPending: function(result){
                          /* You may add your own implementation here */
                          
                        },
                        onError: function(result){
                          /* You may add your own implementation here */
                        },
                        onClose: function(){
                          /* You may add your own implementation here */

                        }

                      });
                    }

                  })

                });

              });
          </script>
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
        <a href="#" class="cta">Beli Sekarang</a>
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
            <div class="product-icons">
              <a href="#" @click.prevent="$store.cart.add(item)">
                <svg
                  width="24"
                  height="24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <use href="img/feather-sprite.svg#shopping-cart" />
                </svg>
              </a>

            </div>
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
<?php /**PATH H:\Kuliah\Semester 6\APLIKASI_BERBASIS_PLATFORM_IF-45-08_[TRK]\Tubes_1\JazzOrJas\resources\views/dashboard.blade.php ENDPATH**/ ?>
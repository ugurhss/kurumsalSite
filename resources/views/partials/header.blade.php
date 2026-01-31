<header class="navbar">
  <div class="navbar-container">
    <!-- Left: Logo -->
    <div class="nav-left">
      <a href="/" class="navbar-logo">
        <img src="{{ asset('images/logo.jpg') }}" alt="Göksu Kağıt Logo" class="logo-img">
      </a>
    </div>

    <!-- Center: Main navigation (desktop) / collapsible (mobile) -->
    <nav class="nav-center navbar-menu" id="navbarMenu">
      <ul class="navbar-list">
        <li><a href="/" class="navbar-link">Anasayfa</a></li>
        <li><a href="/about" class="navbar-link">Hakkımızda</a></li>
        <li><a href="/products" class="navbar-link">Ürünler</a></li>
        <li><a href="/reference" class="navbar-link">Referanslar</a></li>
        <li><a href="/contact" class="navbar-link">İletişim</a></li>
      </ul>
    </nav>

    <!-- Right: Action buttons + mobile toggle -->
    <div class="nav-right">
      <a href="/quote" class="btn btn-primary">Teklif Oluştur</a>
      <a href="/supplier" class="btn btn-outline">Tedarikçi Başvurusu</a>

      <div class="navbar-toggle" id="navbarToggle">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
</header>





<div class="product-cards-wrapper">

  <div class="product-card">
    <div class="product-overflow">
      <div class="product-model">
        <model-viewer src="https://assets.codepen.io/3421562/leaves_keyboard.glb"
                      shadow-intensity="0.4"></model-viewer>
      </div>
    </div>

    <div class="product-glass">
      <div class="product-gradient-blur">
        <div></div><div></div><div></div><div></div><div></div><div></div>
      </div>
    </div>

   
  </div>

  <div class="product-card">
    <div class="product-overflow">
      <div class="product-model">
        <model-viewer src="https://assets.codepen.io/3421562/topo_keyboard.glb"
                      shadow-intensity="0.4"></model-viewer>
      </div>
    </div>

    <div class="product-glass">
      <div class="product-gradient-blur">
        <div></div><div></div><div></div><div></div><div></div><div></div>
      </div>
    </div>

   
  </div>

  <div class="product-card">
    <div class="product-overflow">
      <div class="product-model">
        <model-viewer src="https://assets.codepen.io/3421562/panda_keyboard.glb"
                      shadow-intensity="0.4"></model-viewer>
      </div>
    </div>

    <div class="product-glass">
      <div class="product-gradient-blur">
        <div></div><div></div><div></div><div></div><div></div><div></div>
      </div>
    </div>

   
  </div>

</div>

<div class="logo-marquee-wrapper">

  <!-- Fade efektleri -->
  <div class="logo-marquee-fade logo-marquee-fade-left"></div>
  <div class="logo-marquee-fade logo-marquee-fade-right"></div>

  <!-- Slider -->
  <div class="logo-marquee-track">

    <div class="logo-marquee-group">
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/mastercard-4.svg" alt="Mastercard"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/fiverr-2.svg" alt="Fiverr"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/amlin-1.svg" alt="Amlin"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/enkei-wheels-1.svg" alt="Enkei"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/hoyer.svg" alt="Hoyer"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/meritrust-credit-union.svg" alt="Meritrust"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/general-electric.svg" alt="GE"></div>
    </div>

    <div class="logo-marquee-group">
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/mastercard-4.svg" alt="Mastercard"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/fiverr-2.svg" alt="Fiverr"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/amlin-1.svg" alt="Amlin"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/enkei-wheels-1.svg" alt="Enkei"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/hoyer.svg" alt="Hoyer"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/meritrust-credit-union.svg" alt="Meritrust"></div>
      <div class="logo-marquee-item"><img src="https://cdn.worldvectorlogo.com/logos/general-electric.svg" alt="GE"></div>
    </div>

  </div>
</div>

<style>

.product-cards-wrapper,
.logo-marquee-wrapper {
  margin-top: 0 !important;
  margin-bottom: 0 !important;
  padding-top: 0 !important;
}

/* --- Logo marquee --- */
.logo-marquee-wrapper {
  position: relative;
  overflow: hidden;
  width: 100%;
  padding: 12px 0;
  margin: 0 !important;
}

.logo-marquee-fade {
  position: absolute;
  top: 0;
  width: 80px;
  height: 100%;
  z-index: 5;
  pointer-events: none;
}

.logo-marquee-fade-left {
  left: 0;
  background: linear-gradient(to right, #fff, transparent); /* 🔧 daha temiz */
}

.logo-marquee-fade-right {
  right: 0;
  background: linear-gradient(to left, #fff, transparent);  /* 🔧 daha temiz */
}

.logo-marquee-track {
  display: flex;
  width: max-content;
  animation: logoMarqueeScroll 20s linear infinite;
}

.logo-marquee-group {
  display: flex;
  align-items: center;
  flex-shrink: 0;
}

.logo-marquee-item {
  width: 128px;
  height: 64px;
  margin: 0 32px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.logo-marquee-item img {
  max-height: 48px;
  width: 100%;
  object-fit: contain;
  filter: grayscale(100%);
  opacity: 0.8;
  transition: all 0.3s ease;
}

.logo-marquee-item img:hover {
  filter: grayscale(0%);
  opacity: 1;
}

@keyframes logoMarqueeScroll {
  from { transform: translateX(0); }
  to   { transform: translateX(-50%); }
}

@media (max-width: 768px) {
  .logo-marquee-item { width: 100px; margin: 0 16px; }
  .logo-marquee-fade { width: 40px; }
}

/* --- Product cards --- */
.product-cards-wrapper {
  display: flex;
  justify-content: center;
  gap: 32px;
  padding: 16px 0;
  margin: 0 !important;
  flex-wrap: wrap;
}

.product-card {
  --clr:#7da072;
  --fclr:#f0ffe2;
  width: 260px;
  height: 360px;
  background: var(--clr);
  border-radius: 10px;
  position: relative;
  display: flex;
  justify-content: flex-end;
  box-shadow: 0 20px 40px rgba(0,0,0,.15);
}

.product-card:nth-child(2){ --clr:#2e2e2e; --fclr:#fff; }
.product-card:nth-child(3){ --clr:#fff; --fclr:#000; }

.product-content {
  padding: 16px;
  color: var(--fclr);
  z-index: 2;
}

.product-content h2 { margin: 0 0 6px; font-size: 20px; }
.product-content p { font-size: 13px; opacity: .85; }

.product-glass {
  position: absolute;
  inset: auto 0 0 0;
  height: 70%;
  background: linear-gradient(transparent, var(--clr));
  border-radius: 0 0 10px 10px;
}

.product-overflow {
  position: absolute;
  inset: 0;
  overflow: hidden;
}

.product-model {
  position: absolute;
  inset: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.product-model model-viewer {
  width: 360px;
  height: 360px;
  opacity: 0;
  transition: opacity .8s ease;
}

.product-model model-viewer.loaded {
  opacity: 1;
}
</style>

<script>
(() => {
  const cards = document.querySelectorAll(".product-card");

  const defaultOrbit = "64deg 25deg 64m";
  const hoverOrbit   = "90deg -42deg 50m";
  const defaultTarget = "8m 1m 1m";
  const hoverTarget   = "4m 1m 1m";

  const apply = (mv, orbit, target) => {
    mv.setAttribute("camera-orbit", orbit);
    mv.setAttribute("camera-target", target);
    mv.setAttribute("interpolation-decay", "124");
  };

  cards.forEach(card => {
    const mv = card.querySelector("model-viewer");
    if (!mv) return;

    apply(mv, defaultOrbit, defaultTarget);

    card.addEventListener("mouseenter", () => apply(mv, hoverOrbit, hoverTarget));
    card.addEventListener("mouseleave", () => apply(mv, defaultOrbit, defaultTarget));

    mv.addEventListener("load", () => mv.classList.add("loaded"));
  });
})();
</script>

<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
 
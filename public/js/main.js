  let $slides, interval, $selectors, $btns, currentIndex, nextIndex;

let cycle = (index) => {
  let $currentSlide, $nextSlide, $currentSelector, $nextSelector;

  nextIndex = index !== undefined ? index : nextIndex;

  $currentSlide = $($slides.get(currentIndex));
  $currentSelector = $($selectors.get(currentIndex));

  $nextSlide = $($slides.get(nextIndex));
  $nextSelector = $($selectors.get(nextIndex));

  $currentSlide.removeClass("active").css("z-index", "0");

  $nextSlide.addClass("active").css("z-index", "1");

  $currentSelector.removeClass("current");
  $nextSelector.addClass("current");

  currentIndex =
    index !== undefined
      ? nextIndex
      : currentIndex < $slides.length - 1
      ? currentIndex + 1
      : 0;

  nextIndex = currentIndex + 1 < $slides.length ? currentIndex + 1 : 0;
};

$(() => {
  currentIndex = 0;
  nextIndex = 1;

  $slides = $(".slide");
  $selectors = $(".selector");
  $btns = $(".btn");

  $slides.first().addClass("active");
  $selectors.first().addClass("current");

  interval = window.setInterval(cycle, 6000);

  $selectors.on("click", (e) => {
    let target = $selectors.index(e.target);
    if (target !== currentIndex) {
      window.clearInterval(interval);
      cycle(target);
      interval = window.setInterval(cycle, 6000);
    }
  });

  $btns.on("click", (e) => {
    window.clearInterval(interval);
    if ($(e.target).hasClass("prev")) {
      let target = currentIndex > 0 ? currentIndex - 1 : $slides.length - 1;
      cycle(target);
    } else if ($(e.target).hasClass("next")) {
      cycle();
    }
    interval = window.setInterval(cycle, 6000);
  });
});


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


/* --- Navbar JS (moved from header.blade.php) --- */
document.addEventListener('DOMContentLoaded', function() {
  const toggle = document.getElementById('navbarToggle');
  const menu = document.getElementById('navbarMenu');

  if (toggle && menu) {
    toggle.addEventListener('click', function() {
      toggle.classList.toggle('active');
      menu.classList.toggle('active');
    });

    const links = document.querySelectorAll('.navbar-link');
    links.forEach(link => {
      link.addEventListener('click', function() {
        toggle.classList.remove('active');
        menu.classList.remove('active');
      });
    });
  }
});



// Swiper
function swiper() {
  const swiper = new Swiper(".swiper", {
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      // коли ширина екрану >= 320px
      320: {
        slidesPerView: 1,
      },
      // коли ширина екрану >= 480px
      480: {
        slidesPerView: 2,
      },
      // коли ширина екрану >= 640px
      640: {
        slidesPerView: 3,
      },
      // коли ширина екрану >= 768px
      768: {
        slidesPerView: 4,
      },
      // коли ширина екрану >= 1024px
      1024: {
        slidesPerView: 5,
      },
    },
  });
}

function swiperHero() {
  const swiper = new Swiper(".swiper-hero", {
    slidesPerView: 1,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
}

function scrollEvents() {
  const menu = document.querySelector(".header_list");
  const headerHeight = document.querySelector(".header").offsetHeight;

  menu.addEventListener("click", (e) => {
    if (e.target.classList.contains("header_link")) {
      e.preventDefault();
      const sectionId = e.target.getAttribute("href").replace("#", "");

      window.scrollTo({
        top: document.getElementById(sectionId).offsetTop - headerHeight,
        behavior: "smooth",
      });
    }
  });
}

function showNumber() {
  const btnTel = document.querySelector(".header_tel_btn");
  const headerTel = document.querySelector(".header_tel_span");

  btnTel.addEventListener("click", function () {
    if (headerTel.textContent === "***") {
      headerTel.textContent = "000";
    } else {
      headerTel.textContent = "***";
    }
  });
}

function scroolToContact(selector) {
  const btnCLick = document.querySelector(selector);
  const contactSection = document.querySelector("#contacts");

  btnCLick.addEventListener("click", () => {
    window.scrollTo({
      top: contactSection.offsetTop,
      behavior: "smooth",
    });
  });
}

function selectProductScroll(selector) {
  const products = Array.prototype.slice.call(
    document.querySelectorAll(selector),
    1
  );

  const contactSection = document.querySelector("#contacts");

  products.forEach((product) =>
    product.addEventListener("click", () => {
      // product.style.border = "2px solid green";
      setTimeout(() => {
        window.scrollTo({
          top: contactSection.offsetTop,
          behavior: "smooth",
        });
        product.style.border = "";
      }, 300);
    })
  );
}

swiper();
swiperHero();
scrollEvents();
showNumber();
scroolToContact(".popular_services_request_btn");
scroolToContact(".availability_service_repair_box_left_text");
scroolToContact(".availability_service_repair_box_right_text");
selectProductScroll(".popular_services_table_row");

jQuery(function ($) {
  /*****************************
   ページトップボタン
  *****************************/
  var topBtn = $(".js-pagetop");
  topBtn.hide();

  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
  });

  topBtn.click(function () {
    $("body,html").animate({ scrollTop: 0 }, 300, "swing");
    return false;
  });

  /*****************************
   スムーススクロール
  *****************************/
  $(document).on("click", 'a[href*="#"]', function () {
    let time = 400;
    let header = $("header").innerHeight();
    let target = $(this.hash);
    if (!target.length) return;
    let targetY = target.offset().top - header;
    $("html,body").animate({ scrollTop: targetY }, time, "swing");
    return false;
  });

  /*****************************
   ハンバーガーボタン
  *****************************/
  $(".js-hamburger").on("click", function () {
    $(this).toggleClass("is-active");
    $(".js-drawer").toggleClass("is-active");
    $("body").toggleClass("is-drawer-open");
  });

  $(".js-drawer-overlay, .js-drawer a").on("click", function () {
    $(".js-hamburger").removeClass("is-active");
    $(".js-drawer").removeClass("is-active");
    $("body").removeClass("is-drawer-open");
  });

  /*****************************
   FVアニメーション
  *****************************/
  const $typingParts = $(".typing-part");
  let partIndex = 0;
  let charIndex = 0;

  function startUnderlineAndFade() {
    const subText = document.querySelector(".p-front-fv-text__catch3");
    if (subText) subText.classList.add("is-animated");
  }

  function typeNextChar() {
    const $el = $typingParts.eq(partIndex);
    if ($el.length === 0) return;
    const text = $el.data("text");
    if (typeof text !== "string") {
      partIndex++;
      charIndex = 0;
      if (partIndex < $typingParts.length) setTimeout(typeNextChar, 100);
      return;
    }
    const span = $("<span>").text(text.charAt(charIndex)).css({
      opacity: 0,
      display: "inline-block",
    });
    $el.append(span);
    span.animate({ opacity: 1 }, 300);
    charIndex++;
    if (charIndex < text.length) {
      setTimeout(typeNextChar, 100);
    } else {
      partIndex++;
      charIndex = 0;
      if (partIndex < $typingParts.length) {
        setTimeout(typeNextChar, 100);
      } else {
        setTimeout(startUnderlineAndFade, 300);
      }
    }
  }

  if ($typingParts.length > 0) {
    $typingParts.each(function () {
      $(this).empty();
    });
    typeNextChar();
  }

  /*****************************
   Swiper 初期化 ← DOMReady内に統合
  *****************************/
  if (document.querySelector(".swiper")) {
    new Swiper(".swiper", {
      loop: true,
    });
  }

  if (document.querySelector(".js-front-fv-swiper")) {
    new Swiper(".p-front-fv-swiper", {
      loop: true,
      autoplay: { delay: 3000, disableOnInteraction: false },
      effect: "slide",
      speed: 1000,
    });
  }

  if (document.querySelector(".p-front-works-swiper")) {
    new Swiper(".p-front-works-swiper", {
      loop: true,
      speed: 500,
      allowTouchMove: false,
      spaceBetween: 20,
      autoplay: { delay: 3000, disableOnInteraction: true },
      breakpoints: {
        0: {
          spaceBetween: 20,
          centeredSlides: false,
          slidesPerView: 1.1,
        },
        768: {
          slidesPerView: 3.85,
          centeredSlides: false,
          spaceBetween: 0,
        },
      },
      navigation: {
        nextEl: ".p-front-works-swiper-nav__prev",
        prevEl: ".p-front-works-swiper-nav__next",
      },
    });
  }

  if (document.querySelector(".c-related-swiper")) {
    new Swiper(".c-related-swiper", {
      loop: true,
      speed: 500,
      allowTouchMove: false,
      spaceBetween: 20,
      autoplay: { delay: 3000, disableOnInteraction: true },
      breakpoints: {
        0: {
          spaceBetween: 20,
          centeredSlides: false,
          slidesPerView: 1.1,
        },
        768: {
          slidesPerView: 3.85,
          centeredSlides: false,
          spaceBetween: 0,
        },
      },
      navigation: {
        nextEl: ".c-related-swiper-nav__next",
        prevEl: ".c-related-swiper-nav__prev",
      },
    });
  }

  /*****************************
   service faq アコーディオン
  *****************************/
  $(".js-faq-toggle").on("click", function () {
    const $item = $(this).closest(".p-service-faq-list__item");
    const $answer = $item.find(".p-service-faq-list__item-answer");

    if ($item.hasClass("is-open")) {
      const currentHeight = $answer[0].scrollHeight;
      $answer.css("max-height", currentHeight + "px");
      setTimeout(() => $answer.css("max-height", 0), 20);
      const transitionDuration = 500;
      setTimeout(() => $item.removeClass("is-open"), transitionDuration + 20);
    } else {
      $item.addClass("is-open");
      setTimeout(() => {
        const scrollHeight = $answer[0].scrollHeight;
        $answer.css("max-height", scrollHeight + "px");
      }, 20);
    }
  });

  $(".js-faq-more").on("click", function () {
    const $faqItems = $(".p-service-faq-list__item");
    $faqItems.each(function (index) {
      if (index >= 7 && index < 15) {
        $(this).hide().removeClass("is-hidden").slideDown(400);
      }
    });
    $(this).fadeOut();
  });

  /*****************************
   フロントページの流れるテキスト
  *****************************/
  var $lines = $(".p-frontService-bgText");
  var shuffled = $lines.toArray().sort(() => Math.random() - 0.5);
  $(shuffled.slice(0, 2)).addClass("is-reverse");
});

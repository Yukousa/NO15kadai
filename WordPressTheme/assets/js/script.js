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
    const subText = document.querySelector(".p-fv-text__catch3");
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
   Swiper 初期化
*****************************/

  if (document.querySelector(".js-fv-swiper")) {
    new Swiper(".p-fv-swiper", {
      loop: true,
      effect: "fade", // フェード切り替え
      centeredSlides: true,
      slidesPerView: "auto",
      autoplay: {
        delay: 4000, // 4秒後に次のスライドへ
        disableOnInteraction: false, // ユーザーが操作しても自動再生を継続
      },
      speed: 2000, // 2秒かけてフェード
      // ページネーション
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }

  if (document.querySelector(".p-top-works-swiper")) {
    new Swiper(".p-top-works-swiper", {
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
        nextEl: ".p-top-works-swiper-nav__prev",
        prevEl: ".p-top-works-swiper-nav__next",
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
          spaceBetween: 0,
          centeredSlides: false,
          slidesPerView: "auto",
        },
        768: {
          slidesPerView: "auto",
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

// FAQを開閉する処理（1つだけ開く）
$(".js-faq-toggle").on("click", function () {
  const $item = $(this).closest(".p-service-faq-list__item");
  const $answer = $item.find(".p-service-faq-list__item-answer");

  if ($item.hasClass("is-open")) {
    const currentHeight = $answer[0].scrollHeight;
    $answer.css("max-height", currentHeight + "px");
    setTimeout(() => $answer.css("max-height", 0), 20);
    setTimeout(() => $item.removeClass("is-open"), 520);
  } else {
    // 他を閉じる
    $(".p-service-faq-list__item.is-open").each(function () {
      const $otherItem = $(this);
      const $otherAnswer = $otherItem.find(".p-service-faq-list__item-answer");
      const otherHeight = $otherAnswer[0].scrollHeight;
      $otherAnswer.css("max-height", otherHeight + "px");
      setTimeout(() => $otherAnswer.css("max-height", 0), 20);
      setTimeout(() => $otherItem.removeClass("is-open"), 520);
    });

    // 自分を開く
    $item.addClass("is-open");
    setTimeout(() => {
      const scrollHeight = $answer[0].scrollHeight;
      $answer.css("max-height", scrollHeight + "px");

      // ✅ 高さ固定を解除してテキスト切れ防止
      $answer[0].addEventListener("transitionend", function handler(e) {
        if (e.propertyName === "max-height") {
          $answer.css("max-height", "none");
          $answer[0].removeEventListener("transitionend", handler);
        }
      });
    }, 20);
  }
});

// 「もっと見る」ボタン
$(".js-faq-more").on("click", function () {
  const $faqItems = $(".p-service-faq-list__item");
  $faqItems.each(function (index) {
    if (index >= 7 && index < 15) {
      $(this).hide().removeClass("is-hidden").slideDown(400);
    }
  });
  $(this).fadeOut();
});

// ✅ 初期状態で最初のFAQだけ開く（1件だけ）
$(window).on("load", function () {
  const $firstItem = $(".p-service-faq-list__item").first();
  const $firstAnswer = $firstItem.find(".p-service-faq-list__item-answer");

  $firstItem.addClass("is-open");
  const height = $firstAnswer[0].scrollHeight;
  $firstAnswer.css("max-height", height + "px");

  // ✅ 初期表示でも max-height を解除
  $firstAnswer[0].addEventListener("transitionend", function handler(e) {
    if (e.propertyName === "max-height") {
      $firstAnswer.css("max-height", "none");
      $firstAnswer[0].removeEventListener("transitionend", handler);
    }
  });
});

  /*****************************
   フロントページの流れるテキスト
*****************************/
  var $lines = $(".p-frontService-bgText");
  var shuffled = $lines.toArray().sort(() => Math.random() - 0.5);
  $(shuffled.slice(0, 2)).addClass("is-reverse");

  /*****************************
 フロントページはFVを超えたら、下層ページはヘッダーを超えたら背景色追加 
*****************************/
  const header = $(".p-header__inner");
  const fv = $(".p-fv"); // フロントページだけ存在

  $(window)
    .on("scroll", function () {
      // FVがあればその高さ、なければヘッダー高さを基準に
      const baseHeight =
        fv.length && fv.is(":visible")
          ? fv.outerHeight()
          : header.outerHeight();
      const scrollTop = $(this).scrollTop();

      if (scrollTop > baseHeight) {
        header.addClass("is-scrolled");
      } else {
        header.removeClass("is-scrolled");
      }
    })
    .trigger("scroll");

  /*****************************
見出しのアニメーション
*****************************/
  const $targets = $(".c-heading02--up, .c-heading02--left");

  const observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          $(entry.target).addClass("is-inview");
        }
      });
    },
    {
      threshold: 0.1,
    }
  );

  $targets.each(function () {
    observer.observe(this);
  });

/*****************************
  serviceのカウントアニメーション
*****************************/

let countStarted = false;
const $countArea = $(".p-service-price__list");

function triggerCountAnimation() {
  if (countStarted || $countArea.length === 0) return;

  const windowBottom = $(window).scrollTop() + $(window).height();
  const targetTop = $countArea.offset().top;

  if (windowBottom > targetTop) {
    countStarted = true;

    // カウントダウン（お見積もり）
    const $estimateNum = $(".p-service-price__card--estimate .js-count-num");
    let count = 100;
    const countdown = setInterval(() => {
      $estimateNum.text(count);
      count--;
      if (count < 0) {
        clearInterval(countdown);
        $estimateNum.text("0");
      }
    }, 30);

    // カウントアップ（各金額・週数）
    const countUpTargets = [
      {
        selector: ".p-service-price__card--basic .p-service-price__card-top",
        to: 80000,
      },
      {
        selector: ".p-service-price__card--basic .p-service-price__card-bottom",
        to: 20000,
      },
      {
        selector: ".p-service-price__card--animation .p-service-price__card-price",
        to: 30000,
      },
      {
        selector: ".p-service-price__card--responsive .p-service-price__card-text--responsive",
        to: 25000,
      },
      {
        selector: ".p-service-price__card--term .p-service-price__card-term",
        to: 3,
      },
    ];

    function animateCountUp($el, toValue, duration = 800, delay = 0) {
      setTimeout(() => {
        const isNumber = Number.isInteger(toValue);
        $({ countNum: 0 }).animate(
          { countNum: toValue },
          {
            duration: duration,
            easing: "swing",
            step: function () {
              const val = isNumber
                ? Math.floor(this.countNum).toLocaleString()
                : this.countNum.toFixed(0);
              $el.text(val);
            },
            complete: function () {
              const val = isNumber
                ? Math.floor(toValue).toLocaleString()
                : toValue.toFixed(0);
              $el.text(val);
            },
          }
        );
      }, delay);
    }

    countUpTargets.forEach((item, index) => {
      const $target = $(item.selector);
      if ($target.length > 0) {
        animateCountUp($target, item.to, 800, index * 300);
      }
    });
  }
}

// スクロール・ロード・リサイズ時にチェック
$(window).on("scroll load resize", triggerCountAnimation);

/*****************************
 ヘッダーメールリンクの遷移先をデバイス幅によって切り替え
 PC：#contact（ページ内遷移） / SP：/contact/（ページ遷移）
*****************************/
  $(document).on("click", "#js-mail-link", function (e) {
    const isDrawerOpen = $(".js-drawer").hasClass("is-active");
    const scrollTarget = $("#contact");

    e.preventDefault();

    if (isDrawerOpen) {
      // ✅ ドロワーが開いているとき → 閉じて、フェードアウトしてから遷移
      $(".js-drawer").removeClass("is-active");
      $(".p-header__nav").removeClass("is-active");
      $("body").removeClass("is-fixed");

      // 少し待ってからフェードアウト
      setTimeout(() => {
        $("body").addClass("fade-out");

        setTimeout(() => {
          window.location.href = "/contact/";
        }, 600); // CSSのtransition時間と一致
      }, 200); // ドロワー閉じるまで少し待つ
    } else {
      // ✅ ドロワーが開いていないとき → スムーススクロール
      if (scrollTarget.length) {
        const position = scrollTarget.offset().top;
        $("html, body").animate({ scrollTop: position }, 600);
      }
    }
  });
});

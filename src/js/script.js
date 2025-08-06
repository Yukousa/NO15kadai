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
$(function () {
  // アコーディオン開閉
  $(".js-faq-toggle").on("click", function () {
    const $toggle = $(this);
    const $item = $toggle.closest(".p-service-faq-list__item");
    const $answer = $item.find(".js-faq-answer");
    const isOpen = $item.hasClass("is-open");

    const expanded = $toggle.attr("aria-expanded") === "true";
    $toggle.attr("aria-expanded", !expanded);

    if (!isOpen) {
      $item.addClass("is-open");
      const scrollHeight = $answer[0].scrollHeight;
      $answer.css({ maxHeight: scrollHeight + "px", opacity: 1 });
      setTimeout(() => $answer.css("maxHeight", "none"), 400);
    } else {
      const currentHeight = $answer[0].scrollHeight;
      $answer.css("maxHeight", currentHeight + "px");
      void $answer[0].offsetHeight;
      $answer.css({ maxHeight: 0, opacity: 0 });
      setTimeout(() => {
        $item.removeClass("is-open");
        $answer.css("maxHeight", "");
      }, 400);
    }
  });

  $(".js-faq-more").on("click", function () {
    const $hiddenItems = $(".p-service-faq-list__item.is-hidden");
  
    $hiddenItems
      .css({ display: "block", opacity: 0 }) // まず表示（透明で）
      .removeClass("is-hidden")
      .addClass("is-visible");
  
    // 少し間をおいてふわっと表示
    setTimeout(() => {
      $hiddenItems.css({ opacity: 1 });
    }, 10);
  
    // アニメーション終了後に is-visible を外し、max-height をリセット
    setTimeout(() => {
      $hiddenItems.css({ maxHeight: "" }).removeClass("is-visible");
    }, 600); // CSSとタイミングを合わせる
  
    // ボタンを非表示
    $(this).fadeOut();
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
  serviceのカウントアニメーション（個別トリガー方式）
*****************************/

    // カウント済みの要素に付けるクラス
    const countedClass = "is-counted";

    // カウントダウン（お見積もり）
    function triggerCountdown($target) {
      if ($target.hasClass(countedClass)) return;

      $target.addClass(countedClass);
      let count = 100;
      const countdown = setInterval(() => {
        $target.text(count);
        count--;
        if (count < 0) {
          clearInterval(countdown);
          $target.text("0");
        }
      }, 30);
    }

    // カウントアップ処理
    function animateCountUp($el, toValue, duration = 1500) {
      if ($el.hasClass(countedClass)) return;

      $el.addClass(countedClass);

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
    }

    // 対象が画面内に入ったかチェック
    function isInViewport($el) {
      const windowTop = $(window).scrollTop();
      const windowBottom = windowTop + $(window).height();
      const elTop = $el.offset().top;
      const elBottom = elTop + $el.outerHeight();

      return elBottom > windowTop && elTop < windowBottom;
    }

    // スクロール or 読み込み時にアニメーションをチェック
    function checkCountAnimations() {
      // カウントダウン
      const $estimate = $(".p-service-price__card--estimate .js-count-num");
      if ($estimate.length && isInViewport($estimate)) {
        triggerCountdown($estimate);
      }

      // カウントアップ対象リスト
      const countUpTargets = [
        {
          selector: ".p-service-price__card--basic .p-service-price__card-top",
          to: 80000,
        },
        {
          selector:
            ".p-service-price__card--basic .p-service-price__card-bottom",
          to: 20000,
        },
        {
          selector:
            ".p-service-price__card--animation .p-service-price__card-price",
          to: 30000,
        },
        {
          selector:
            ".p-service-price__card--responsive .p-service-price__card-text--responsive",
          to: 25000,
        },
        {
          selector: ".p-service-price__card--term .p-service-price__card-term",
          to: 3,
        },
      ];

      countUpTargets.forEach((item) => {
        const $el = $(item.selector);
        if ($el.length && isInViewport($el)) {
          animateCountUp($el, item.to);
        }
      });
    }

    // イベント登録
    $(window).on("scroll load resize", checkCountAnimations);

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
});

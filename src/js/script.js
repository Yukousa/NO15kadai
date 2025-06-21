jQuery(function ($) {
/*****************************
   ページトップボタン
*****************************/
var topBtn = $(".js-pagetop");
  topBtn.hide();

  // ページトップボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ページトップボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      300,
      "swing"
    );
    return false;
  });

/*****************************
スムーススクロール (絶対パスのリンク先が現在のページであった場合でも作動。ヘッダーの高さ考慮。)
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
});

/*****************************
ハンバーガーボタン
*****************************/
$(".js-hamburger").on("click", function () {
  $(this).toggleClass("is-active");
  $(".js-drawer").toggleClass("is-active");
  $("body").toggleClass("is-drawer-open");
});

// ナビリンクをクリックで閉じる
$(".js-drawer-overlay, .js-drawer a").on("click", function () {
  $(".js-hamburger").removeClass("is-active");
  $(".js-drawer").removeClass("is-active");
  $("body").removeClass("is-drawer-open");
});

/*****************************
FVアニメーション - タイピング風＋フェード
*****************************/
const $typingParts = $(".typing-part");
let partIndex = 0;
let charIndex = 0;

function startUnderlineAndFade() {
  const subText = document.querySelector(".p-front-fv-text__catch3");
  if (subText) {
    subText.classList.add("is-animated");
  }
}

function typeNextChar() {
  const $el = $typingParts.eq(partIndex);
  // 🔒 安全対策：存在しない .typing-part を参照しないようにする
  if ($el.length === 0) {
    console.warn(
      "存在しない .typing-part にアクセスしました（partIndex: " +
        partIndex +
        "）"
    );
    return;
  }
  const text = $el.data("text");
  // 🔒 data-text が設定されていない場合もスキップして次へ
  if (typeof text !== "string") {
    console.warn(
      "data-text が設定されていない .typing-part が見つかりました:",
      $el
    );
    partIndex++;
    charIndex = 0;
    if (partIndex < $typingParts.length) {
      setTimeout(typeNextChar, 100);
    }
    return;
  }
  const span = $("<span>").text(text.charAt(charIndex)).css({
    opacity: 0,
    display: "inline-block",
  });
  $el.append(span);
  span.animate(
    {
      opacity: 1,
    },
    300
  );
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
//  .typing-part があるページのみアニメーション処理を実行
if ($typingParts.length > 0) {
  $typingParts.each(function () {
    $(this).empty();
  });
  typeNextChar();
}

/*****************************
swiper
*****************************/
// 共通Swiper（.swiperに使っているもの）
if (document.querySelector(".swiper")) {
  new Swiper(".swiper", {
    loop: true,
  });
}

// フロントページ FV の Swiper
if (document.querySelector(".js-front-fv-swiper")) {
  new Swiper(".p-front-fv-swiper", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    effect: "slide",
    speed: 1000,
    // navigation: {
    //   nextEl: '.swiper-fv .swiper-button-next',
    //   prevEl: '.swiper-fv .swiper-button-prev',
    // },
  });
}

// フロントページ　worksの Swiper
if (document.querySelector(".p-front-works-swiper")) {
  new Swiper(".p-front-works-swiper", {
    loop: true,
    // autoplay: {
    //   delay: 4000,
    //   disableOnInteraction: false,
    // },

    navigation: {
      nextEl: ".p-front-works-swiper-nav__next",
      prevEl: ".p-front-works-swiper-nav__prev",
    },
    breakpoints: {
      0: {
        spaceBetween: 20,
        slidesPerView: 1.18,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 3.9,
        centeredSlides: false,
        spaceBetween: 0,
      },
    },
  });
}

// 関連記事の Swiper（works・voice共通）
// フロントページ専用の Swiper（.c-swiper-related--front）が存在しない場合のみ実行することで、初期化の重複を防ぐ
if (
  document.querySelector(".c-swiper-related") && // Swiperの共通クラスが存在する場合
  !document.querySelector(".c-swiper-related--front") // フロントページではないことを確認
) {
  new Swiper(".c-swiper-related", {
    loop: true,
    // autoplay: {
    //   delay: 4000,
    //   disableOnInteraction: false,
    // },

    navigation: {
      nextEl: ".c-swiper-related-nav__next",
      prevEl: ".c-swiper-related-nav__prev",
    },
    breakpoints: {
      0: {
        spaceBetween: 20,
        slidesPerView: 1.42,
        centeredSlides: false,
      },
      768: {
        slidesPerView: 3.85,
        centeredSlides: false,
        spaceBetween: 50,
      },
    },
  });
}

/*****************************
service faq アコーディオンの開閉
*****************************/
$(".js-faq-toggle").on("click", function () {
  const $item = $(this).closest(".p-service-faq-list__item");
  $item.toggleClass("is-open");
});
// 「もっと見る」ボタンの処理
$(".js-faq-more").on("click", function () {
  $(".p-service-faq-list__item.is-hidden").each(function () {
    const $item = $(this);

    // ① 一旦非表示 → アニメでふわっと表示
    $item
      .hide()
      .removeClass("is-hidden") // 表示状態にする
      .slideDown(400); // ← アコーディオンと同じようにふわっと

    // ② is-open クラスは付けない（閉じた状態のまま）
  });

  // ③ ボタンをフェードアウトで非表示に
  $(this).fadeOut();
});

/*****************************
フロントページの流れるテキスト
*****************************/

  // 対象を .p-frontService-bgText（かつ lineクラスが付いてる）に変更
  var $lines = $(".p-frontService-bgText");

  // シャッフルして2つ選び、.is-reverse を追加
  var shuffled = $lines.toArray().sort(() => Math.random() - 0.5);
  $(shuffled.slice(0, 2)).addClass("is-reverse");

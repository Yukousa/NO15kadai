<?php get_header(); ?>



<div class="swiper p-front-__swiper p-front-works-swiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <a href="">
                <span class="p-front-swiper__label"></span>
                <div class="p-front-swipe__image">
                    <img src="sample.png">
                </div>
                <div class="p-front-swiper__text">
                    <p>テキストテキストテキストテキストテキスト</p>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="p-front-swiper__nav">
    <button class="p-front-swiper-nav__prev" aria-label="前へ"></button>
    <button class="p-front-swiper-nav__next" aria-label="次へ"></button>
</div>



<div class="p-form">
    <ul class="p-form__list">
        <li class="p-form__item">
            <div class="p-form__title">
                <label>お問い合わせ内容</label>
                <span>必須</span>
            </div>
            <div class="p-form__input p-formSelect">
                [select your-select first_as_label "選択してください" "選択肢1" "選択肢2" "選択肢3"]
            </div>
        </li>
        <li class="p-form__item">
            <div class="p-form__title">
                <label>お名前</label>
                <span>必須</span>
            </div>
            <div class="p-form__input p-formInput">[text* your-name placeholder "例）山田太郎"]</div>
        </li>
        <li class="p-form__item">
            <div class="p-form__title p-form__title--type02">
                <label>ふりがな</label>
                <span>必須</span>
            </div>
            <div class="p-form__input p-formInput p-formInput--sm">[text* your-name-kana placeholder "例）やまだ　たろう"]</div>
        </li>
        <li class="p-form__item">
            <div class="p-form__title">
                <label>電話番号</label>
            </div>
            <div class="p-form__input p-formInput">[tel your-tel-1 placeholder "例）012-345-6789"]</div>
        </li>
        <li class="p-form__item">
            <div class="p-form__title">
                <label>メールアドレス</label>
                <span>必須</span>
            </div>
            <div class="p-form__input p-formInput">
                [email your-email placeholder "例）XXX@XXXXXXXX.com" ]
            </div>
        </li>
        <li class="p-form__item ">
            <div class="p-form__title p-form__title--aiStart">
                <label>お問い合わせ内容</label>
            </div>
            <div class="p-form__input p-formTextarea">[textarea placeholder "例）ご自由にご記入ください。"]</div>
        </li>
        <li class="p-form__item ">
            <div class="p-form__title p-form__title--aiStart">
                <label>個人情報の取り扱いについて</label>
            </div>
            <div class="p-form__input p-formTextarea">ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</div>
        </li>
    </ul>
    <p class="p-form__privacy">
        <a href="https://www.google.com/" target="_blank">プライバシーポリシーに同意する</a>
    </p>
    <div class="p-form__acceptance p-formCheckbox">
        [acceptance acceptance-1]プライバシーポリシーに同意します。[/acceptance]
    </div>
    <div class="p-form__submit p-formBtn">
        [submit "入力内容の確認"]
    </div>
</div>




<?php get_template_part('template-parts/sections/section-cta'); ?>
<?php get_footer(); ?>




<div class="p-form">
    <ul class="p-form__list p-form-list">
        <li class="p-form-list__item p-form-list-item">
            <div class="p-form-list-item__title">
                <label>お問い合わせ内容</label>
                <span>必須</span>
            </div>
            <div class="p-formSelect-wrap">
                [select* your-select first_as_label "選択してください" "選択肢1" "選択肢2" "選択肢3"]
                <svg class="select-arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 9l6 6 6-6" />
                </svg>
            </div>
        </li>
        <li class="p-form-list__item p-form-list-item">
            <div class="p-form-list-item__title">
                <label>お名前</label>
                <span>必須</span>
            </div>
            <div class="p-form__input p-formInput">[text* your-name placeholder "例）山田太郎"]</div>
        </li>
        <li class="p-form-list__item p-form-list-item">
            <div class="p-form-list-item__title p-form__title--type02">
                <label>ふりがな</label>
                <span>必須</span>
            </div>
            <div class="p-form__input p-formInput">[text* your-name-kana placeholder "例）やまだ　たろう"]</div>
        </li>
        <li class="p-form-list__item p-form-list-item">
            <div class="p-form-list-item__title">
                <label>電話番号</label>
            </div>
            <div class="p-form__input p-formInput">[tel* your-tel-1 placeholder "例）012-345-6789"]</div>
        </li>
        <li class="p-form-list__item p-form-list-item">
            <div class="p-form-list-item__title">
                <label>メールアドレス</label>
                <span>必須</span>
            </div>
            <div class="p-form__input p-formInput">[email* your-email placeholder "例）XXX@XXXXXXXX.com" ]</div>
        </li>
        <li class="p-form-list__item p-form-list-item">
            <div class="p-form-list-item__title p-form__title--aiStart">
                <label>お問い合わせ</label>
            </div>
            <div class="p-form__input p-formTextarea">[textarea* your-message placeholder "例）ご自由にご記入ください。" ]</div>
        </li>
        <li class="p-form-list__item p-form-list-item">
            <div class="p-form-list-item__title p-formPrivacy">
                <label>個人情報の取り扱いについて</label>
                <span>必須</span>
            </div>
            <div class="p-formPrivacy__container p-formPrivacy-container">

                <div class="p-formPrivacy-container_inner p-formPrivacy-container-inner">
                    <div class="p-formPrivacy-container-inner__text">
                        <p>ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        <p>ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        <p>ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                        <p>ここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入るここにテキスト入る</p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <div class="p-form__acceptance p-formCheckbox">
        [acceptance acceptance-1]プライバシーポリシーに同意する[/acceptance]
    </div>
    <p class="p-form__submit-wrap">
        [submit class:p-form__submit class:p-formBtn "入力内容の確認"]
    </p>
    [multistep multistep-365 first_step "/contact/confirm"]
</div>
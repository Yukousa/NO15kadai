<?php
$faq_group = SCF::get('faq_group');
$index = 1;

foreach ($faq_group as $faq) :
    $is_open   = ($index === 1) ? 'is-open' : '';
    $is_hidden = ($index > 7) ? 'is-hidden' : ''; // 8以降を非表示
?>
    <div class="p-service-faq-list__item <?php echo $is_open . ' ' . $is_hidden; ?>">
        <div class="p-service-faq-list__body js-faq-toggle"
             aria-expanded="<?php echo ($index === 1) ? 'true' : 'false'; ?>"
             aria-controls="answer<?php echo $index; ?>">
            <span class="p-service-faq-list__label">Q<?php echo $index; ?></span>
            <p class="p-service-faq-list__question"><?php echo esc_html($faq['question']); ?></p>
            <span class="p-service-faq-list__icon" aria-hidden="true"></span>
        </div>

        <div class="p-service-faq-list__answer js-faq-answer" id="answer<?php echo $index; ?>">
            <div class="p-service-faq-list__answer-inner">
                <p><?php echo nl2br(esc_html($faq['answer'])); ?></p>
            </div>
        </div>
    </div>
<?php
    $index++;
endforeach;
?>

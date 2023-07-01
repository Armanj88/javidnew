<style>
    :root {
        --dir: <?php if (is_rtl()): echo 'right'; else: echo 'left'; endif; ?>
        --opposite-dir: <?php if (is_rtl()): echo 'left'; else: echo 'right'; endif; ?>
        --flex-direction: <?php if (is_rtl()): echo 'row-reverse'; else: echo 'row'; endif; ?>;
        --flex-direction-opposite: <?php if (is_rtl()): echo 'row'; else: echo 'row-reverse'; endif; ?>;
    }
</style>
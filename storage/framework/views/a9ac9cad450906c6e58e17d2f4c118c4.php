<?php if (! $__env->hasRenderedOnce('f270394b-c25c-4716-9257-d71838905338')): $__env->markAsRenderedOnce('f270394b-c25c-4716-9257-d71838905338');
$__env->startPush(config('pagebuilder.site_style_var')); ?>
    <style>
        iframe {
            width: 100% !important;
            height: 100% !important;
        }
        .google_map{
            height: 200px;
        }
    </style>
<?php $__env->stopPush(); endif; ?>
<div class="contacts_info mt-5">
    <p><?php echo pagesetting('google_map_editor'); ?></p>
    <div class="google_map w-100">
        <?php echo pagesetting('google_map_key'); ?>

    </div>
</div>
<?php /**PATH D:\xampp\htdocs\resources\views/themes/edulia/pagebuilder/google-map/view.blade.php ENDPATH**/ ?>
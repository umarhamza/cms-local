<?php if (count($errors) > 0) : ?>
    <div class="error" style="font-size: 0.875em;color: #dc3545;">
        <?php foreach ($errors as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
<ul class="<?= $class; ?>">
    <?php foreach ($array as $elem): ?>
        <li><a <?= ($url == $elem['path'] ? 'class="active"' : '') ?> href="<?= $elem['path']; ?>"><?= subStringFunction($elem['title']); ?></a></li>
    <?php endforeach; ?>
</ul>
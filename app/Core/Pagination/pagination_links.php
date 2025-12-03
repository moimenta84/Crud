<div>
    <?php if($paginator->hasPages()): ?>

        <?php if(!$paginator->onFirstPage()): ?>
            <a href="<?= $paginator->previousPageUrl() ?>">Anterior</a>
        <?php endif; ?>

        <span>Página <?= $paginator->currentPage() ?> de <?= $paginator->lastPage() ?></span>

        <?php if($paginator->hasMorePages()): ?>
            <a href="<?= $paginator->nextPageUrl() ?>">Siguiente</a>
        <?php endif; ?>

    <?php endif; ?>
</div>
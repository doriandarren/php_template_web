<?php require('views/partials/head.php') ?>

<?php require('views/partials/nav.php') ?>

<?php require('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        <!-- Your content -->

        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">Go back</a>
        </p>

        <p>Contenido: <?= htmlspecialchars($note['body']) ?></p>

    </div>
</main>

<?php require('views/partials/footer.php') ?>
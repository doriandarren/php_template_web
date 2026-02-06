<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

        <p class="mb-6">
            <a href="/notes" class="text-blue-500 hover:underline">Go back</a>
        </p>

        <p>Contenido: <?= htmlspecialchars($note['body']) ?></p>

        <footer class="mt-6">
            <a 
                class="text-gray-500 border border-current px-3 py-1 rounded hover:bg-gray-50" 
                href="/note/edit?id=<?= $note['id'] ?>"
            >Edit</a>
        </footer>



        <!-- <form 
            method="POST" 
            class="mt-5"
        >
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="< ?= $note['id'] ?>">
            <button class="text-sm text-red-500" >Delete</button>
        </form> -->

    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
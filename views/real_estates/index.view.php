<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($real_estates as $real_estate) : ?>
                <li>
                    <a href="/real_estate?id=<?=$real_estate['id']?>" class="text-blue-500 hover:underline" >
                    <?php foreach ($real_estate as $key => $value) : ?>
                        <strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?>; 
                    <?php endforeach; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/real_estates/create" class="text-blue-500 hover:underline">Create estate</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>

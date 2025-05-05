<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4">Your Real Estates</h2>

        <?php if (empty($real_estates)) : ?>
            <p class="text-gray-600">You haven't added any properties yet.</p>
        <?php else : ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($real_estates as $real_estate) : ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden p-4">
                        <?php if (!empty($real_estate['image'])) : ?>
                            <img src="/public/uploads/<?= htmlspecialchars($real_estate['image']) ?>" 
                                 alt="Property image"
                                 class="w-full h-48 object-cover rounded mb-4">
                        <?php endif; ?>

                        <h2 class="text-lg font-semibold mb-2"><?= htmlspecialchars($real_estate['name']) ?></h2>

                        <p class="text-gray-700 text-sm mb-1">
                            <strong>Price:</strong> <?= htmlspecialchars($real_estate['price']) ?> €
                        </p>
                        <p class="text-gray-700 text-sm mb-1">
                            <strong>Location:</strong> <?= htmlspecialchars($real_estate['location']) ?>
                        </p>
                        <p class="text-gray-600 text-sm mb-3">
                            <strong>Description:</strong> <?= htmlspecialchars($real_estate['description']) ?>
                        </p>

                        <a href="/real_estate?id=<?= $real_estate['id'] ?>" 
                           class="text-indigo-600 hover:underline text-sm">View details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>

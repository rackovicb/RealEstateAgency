<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4">Real estate by city:</h2>

        <?php if (!empty($locationStats)) : ?>
            <ul class="mb-6 list-disc list-inside text-gray-800">
                <?php foreach ($locationStats as $stat): ?>
                    <li>
                        <strong><?= htmlspecialchars($stat['location']) ?>:</strong>
                        <?= htmlspecialchars($stat['count']) ?> Real estate
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-gray-600">No location data.</p>
        <?php endif; ?>

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

                    <!-- <a href="/real_estate?id=<?= $real_estate['id'] ?>" 
                       class="text-indigo-600 hover:underline text-sm">View details</a> -->
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-8 text-right">
            <a href="/real_estates/create" 
               class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded">
                + Create new estate
            </a>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>

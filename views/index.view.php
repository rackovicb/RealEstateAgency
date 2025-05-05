<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="GET" class="mb-6 text-center">
            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Filter by location:</label>
            <select name="location" id="location" class="rounded border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Show all</option>
                <option value="Beograd" <?= $_GET['location'] ?? '' === 'Beograd' ? 'selected' : '' ?>>Beograd</option>
                <option value="Novi Sad" <?= $_GET['location'] ?? '' === 'Novi Sad' ? 'selected' : '' ?>>Novi Sad</option>
                <option value="Kragujevac" <?= $_GET['location'] ?? '' === 'Kragujevac' ? 'selected' : '' ?>>Kragujevac</option>
                <option value="Cacak" <?= $_GET['location'] ?? '' === 'Cacak' ? 'selected' : '' ?>>Cacak</option>
                <option value="Nis" <?= $_GET['location'] ?? '' === 'Nis' ? 'selected' : '' ?>>Niš</option>
            </select>
            <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 text-sm">Search</button>
        </form>

        <h2 class="text-2xl font-bold mb-4 text-center">Estates by city:</h2>
        <?php if (!empty($locationStats)) : ?>
            <ul class="mb-6 list-disc list-inside text-gray-800 text-center">
                <?php foreach ($locationStats as $stat): ?>
                    <li>
                        <strong><?= htmlspecialchars($stat['location']) ?>:</strong>
                        <?= htmlspecialchars($stat['count']) ?>Estate
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p class="text-center text-gray-600">No location data.</p>
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

                    <a href="/real_estate?id=<?= $real_estate['id'] ?>" 
                       class="text-indigo-600 hover:underline text-sm">View details</a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>

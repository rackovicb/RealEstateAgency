<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/real_estate" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?= $real_estate['id'] ?>">

                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <input type="text" id="name" name="name"
                                       value="<?= htmlspecialchars($real_estate['name']) ?>"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                       placeholder="Property name" required>
                                <?php if (isset($errors['name'])) : ?>
                                    <p class="text-red-500 text-xs mt-2"><?= $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="description" name="description" rows="3"
                                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                          placeholder="Property description" required><?= htmlspecialchars($real_estate['description']) ?></textarea>
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" id="price" name="price"
                                       value="<?= htmlspecialchars($real_estate['price']) ?>"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                       placeholder="Enter the price" required>
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                                <select id="location" name="location"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="">Select a city</option>
                                    <option value="Beograd" <?= $real_estate['location'] === 'Beograd' ? 'selected' : '' ?>>Beograd</option>
                                    <option value="Novi Sad" <?= $real_estate['location'] === 'Novi Sad' ? 'selected' : '' ?>>Novi Sad</option>
                                    <option value="Kragujevac" <?= $real_estate['location'] === 'Kragujevac' ? 'selected' : '' ?>>Kragujevac</option>
                                    <option value="Cacak" <?= $real_estate['location'] === 'Cacak' ? 'selected' : '' ?>>Cacak</option>
                                    <option value="Nis" <?= $real_estate['location'] === 'Nis' ? 'selected' : '' ?>>Niš</option>
                                </select>
                            </div>

                            <?php if (!empty($real_estate['image'])): ?>
                                <div>
                                    <p class="block text-sm font-medium text-gray-700">Current Image:</p>
                                    <img src="/public/uploads/<?= htmlspecialchars($real_estate['image']) ?>" alt="Current image"
                                         class="mt-2 w-48 h-32 object-cover rounded shadow">
                                </div>
                            <?php endif; ?>

                            <div>
                                <label for="image" class="block text-sm font-medium text-gray-700">Upload new image</label>
                                <input type="file" id="image" name="image"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <p class="text-xs text-gray-500 mt-1">Leave empty if you don't want to change the image.</p>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end">
                            <a href="/real_estates"
                               class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>

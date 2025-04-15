<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/nav.php'); ?>
<?php require base_path('views/partials/banner.php'); ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">             
       
    <p class="mb-6">
        <a href="/real_estates" class="text-blue-500 hover:underline">go back</a>
    </p>
    <p>
        <?=$real_estate['id']?>
        <?=$real_estate['name']?>
        <?=$real_estate['description']?>
        <?=$real_estate['price']?>
        <?=$real_estate['location']?>  
    </p>
                 
        
    </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>

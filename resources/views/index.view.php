<?php require_once base_path('/resources/views/layouts/user/header.php') ?>

<section class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 ">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">

        <?php foreach ($users as $user): ?>
            <div class="bg-blue-300 p-2 rounded-lg text-ellipsis transition duration-300 hover:bg-blue-100">
                <h1>Hello there master you look happy, <?= $user['email'] ?> </h1>
            </div>
        <?php endforeach; ?>

    </div>
</section>

<?php require_once base_path('/resources/views/layouts/user/footer.php') ?>
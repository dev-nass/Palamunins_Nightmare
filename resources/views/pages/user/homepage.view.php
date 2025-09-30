<?php require_once base_path('resources/views/layouts/user/header.php') ?>

<section class="pm-container">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2">

        <h1>Hello There from HomePage here, <?= $_SESSION['__credentials']['email'] ?? "Guest" ?></h1>

        <?php if (isset($_SESSION['__credentials'])): ?>
            <form method="POST" action="../user/logout">
                <button class="py-2 px-3 rounded-lg bg-red-500">Logout</button>
            </form>
        <?php endif; ?>

    </div>
</section>

<?php require_once base_path('resources/views/layouts/user/footer.php') ?>
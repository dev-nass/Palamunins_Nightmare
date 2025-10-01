<?php require_once base_path('resources/views/layouts/user/header.php') ?>

<section class="pm-container  pt-[10rem]">
    <form class=" grid grid-cols-1 items-center gap-3 max-w-[30rem] mx-auto" method="POST"
        action="../user/registration">
        <h1 class="text-3xl font-bold text-center mb-3">Registration Page</h1>
        <div class="space-y-12">
            <div class="sm:col-span-4">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" type="email" name="email" autocomplete="email"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
                <div>
                    <?= errors('email') ?>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="mt-2">
                    <input id="password" type="password" name="password" autocomplete="password"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
                <div>
                    <?= errors('password') ?>
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Confirm
                    Password</label>
                <div class="mt-2">
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        autocomplete="password_confirmation"
                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                </div>
            </div>


            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>
</section>


<?php require_once base_path('resources/views/layouts/user/footer.php') ?>
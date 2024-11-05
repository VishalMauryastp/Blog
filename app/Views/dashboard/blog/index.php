<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>

<div class="p-7 ">
    <div class="flex justify-between">
        <h1 class="text-3xl font-[600]">Blog Posts</h1>
        <button
            class="font-semibold hover:shadow hover:text-black group hover:bg-[#f8f4f3] transition-all bg-black px-6 text-white rounded-[7px] py-2">
            <a class="flex gap-[10px]" href="<?= site_url('dashboard/blog/create'); ?>"><svg
                    class="inline-block text-white fill-white group-hover:fill-black transition-all"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4z"></path>
                    <path
                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z">
                    </path>
                </svg> Add New Blog</a>
        </button>
    </div>
    <div class="mt-4">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white uppercase bg-black dark:bg-gray-800">
                    <tr>
                        <th scope="col" class="px-6 py-4">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-4">
                            Category
                        </th>

                        <th scope="col" class="px-6 py-4">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($blogs as $blog): ?>
                        <tr class="border-b bg-gray-50 hover:bg-gray-100 border-gray-200 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap  dark:text-white">
                                <?= esc($blog['title']); ?>
                            </th>
                            <td class="px-6 py-4  ">

                                category
                            </td>

                            <td class="px-6 py-4 flex space-x-2 ">
                                <a href="<?= site_url('dashboard/blog/edit/' . $blog['id']); ?>"
                                    class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                    <svg class="fill-blue-600 hover:fill-blue-900 transition-all" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                                        <path
                                            d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                                        </path>
                                    </svg>
                                </a>
                                <a href="<?= site_url('dashboard/blog/delete/' . $blog['id']); ?>"
                                    class="">
                                    <svg class="fill-red-600 hover:fill-red-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px">
                                        <path
                                            d="M 10.806641 2 C 10.289641 2 9.7956875 2.2043125 9.4296875 2.5703125 L 9 3 L 4 3 A 1.0001 1.0001 0 1 0 4 5 L 20 5 A 1.0001 1.0001 0 1 0 20 3 L 15 3 L 14.570312 2.5703125 C 14.205312 2.2043125 13.710359 2 13.193359 2 L 10.806641 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?= $this->endSection() ?>
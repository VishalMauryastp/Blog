<?= $this->extend('layout/dashboardLayout') ?>

<?= $this->section('content') ?>
<div class="p-7">
    <?php if (session()->getFlashdata('error')): ?>
        <div class="text-red-500"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="text-green-500"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <h1 class="text-3xl font-[600]">Edit Blog Post</h1>
    <div class="mt-4 p-5 bg-white">
        <form action="<?= site_url('dashboard/blog/update/' . $blog['id']); ?>" method="POST"
            enctype="multipart/form-data">
            <?= csrf_field(); ?> <!-- CSRF Token for protection -->

            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog
                    Title</label>
                <input type="text" id="title" name="title" value="<?= old('title', $blog['title']); ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter the title of the blog" required />
            </div>

            <div class="mb-5">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                <input type="text" id="slug" name="slug" value="<?= old('slug', $blog['slug']); ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter a URL-friendly slug" required />
            </div>

            <div class="mb-5">
                <label for="content"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea id="content" name="content" rows="6"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter the blog content" required><?= old('content', $blog['content']); ?></textarea>
            </div>

            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                <input type="file" id="image" name="image"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    accept="image/*" />
                <p>Current Image: <?= $blog['image']; ?></p> <!-- Display current image name -->
            </div>

            <div class="mb-5">
                <label for="image_alt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image Alt
                    Text</label>
                <input type="text" id="image_alt" name="image_alt" value="<?= old('image_alt', $blog['image_alt']); ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter alternative text for the image" />
            </div>

            <div class="mb-5">
                <label for="meta_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Title</label>
                <input type="text" id="meta_title" name="meta_title"
                    value="<?= old('meta_title', $blog['meta_title']); ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter the meta title" />
            </div>

            <div class="mb-5">
                <label for="meta_keyword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Keywords</label>
                <input type="text" id="meta_keyword" name="meta_keyword"
                    value="<?= old('meta_keyword', $blog['meta_keyword']); ?>"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter meta keywords (comma-separated)" />
            </div>

            <div class="mb-5">
                <label for="meta_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Meta
                    Description</label>
                <textarea id="meta_description" name="meta_description" rows="4"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Enter the meta description"><?= old('meta_description', $blog['meta_description']); ?></textarea>
            </div>

            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="isEnable" type="checkbox" name="isEnable" value="1" <?= $blog['isEnable'] ? 'checked' : ''; ?>
                        class="w-4 h-4 border border-gray-300 rounded accent-black bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                </div>
                <label for="isEnable" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Enable Blog
                    Post</label>
            </div>
            <div class="flex gap-3">

                <a class="bg-gray-300 hover:bg-blue-800 hover:text-white transition-all px-5 py-2.5 rounded-[7px]"
                    href="<?= site_url('dashboard/blog'); ?>">Back to Blog Posts</a>

                <button type="submit"
                    class="text-white bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-10 transition-all py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>

<?= $this->endSection() ?>
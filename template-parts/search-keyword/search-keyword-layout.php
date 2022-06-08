<?php

function search_keyword_layout()
{
    global $post_type_requests;
?>
    <form role="search" method="get" class="flex justify-center w-full mb-6 md:py-3" action="<?php echo home_url() ?>">
        <input id="search-by-keyword" type="search" class="p-3 w-full md:w-2/3 h-12 rounded-none text-lg" placeholder="¿Qué estás buscando?" value="<?php echo get_query_var('s') ?>" name="s" tabindex="-1" <?php echo get_query_var('s') ? "" : "autofocus" ?>>
        <button type="submit" class="bg-teal-400 hover:bg-teal-400 hover:text-white text-white py-4 px-7 hidden md:inline">
            <i class="fas fa-search"></i>
        </button>
        <input name="post_type" value="<?php echo $post_type_requests ?>" hidden>
    </form>
    <script>
        document.getElementById('search-by-keyword').addEventListener('change', (e) => {
            document.getElementById('search-filter').value = e.target.value;
        })
    </script>
<?php
}

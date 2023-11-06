    <!-- header file -->
    <?php include './templates/header.php';?>
    <!-- hero section -->
    <section class="hero">
        <div class="hero-content">
        
        </div>
    </section>
    <!-- search section -->
    <section class="search" style="background:#0af;">
        <form action="#" method="post" class="post">
            <input class="search-item" type="text" name="search" id="search" placeholder='Job Title'>
            <select class="province search-item" id ="province">
                <option value="select province">Select Province</option>
                <option value="Kabul">Kabul</option>
                <option value="Nangarhar">Nangarhar</option>
                <option value="Kandahar">Kandahar</option>
                <option value="Balkh">Balkh</option>
            </select>
            <select name="category" id="category" class="search-item">
                <option value="Management">Management</option>
                <option value="IT">IT</option>
                <option value="Civil Engineering">Civil Engineering</option>
            </select>
        </form>
    </section>

    <?php include './templates/posts.php' ?>

<!-- FOOTER FILE -->
    <?php include './templates/footer.php' ?>

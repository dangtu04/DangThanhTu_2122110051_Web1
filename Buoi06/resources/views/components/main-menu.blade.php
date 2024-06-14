<section class="menu bg-main">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars text-white fs-3"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        @foreach ($list_menu as $row_menu)
                            <x-main-menu-item :rowmenu="$row_menu"/>
                        @endforeach               
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>
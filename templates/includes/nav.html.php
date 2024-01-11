<li class="nav-item">
    <a
        class="nav-link me-3<?= $_SERVER['REQUEST_URI'] === '/ecole.php' ? 'active link-primary-color' : '' ?>"
        href="/ecole.php"
    >
        <i class="fa-solid fa-school-flag me-2 <?= $_SERVER['REQUEST_URI'] === '/ecole.php' ? 'fa-bounce' : '' ?>"></i>
        Nos écoles
    </a>
</li>
<li class="nav-item">
    <a
        class="nav-link me-3<?= $_SERVER['REQUEST_URI'] === '/eleve.php' ? 'active link-primary-color' : '' ?>"
        href="/eleve.php"
    >
        <i class="fa-solid fa-user-graduate me-2 <?= $_SERVER['REQUEST_URI'] === '/eleve.php' ? 'fa-bounce' : '' ?>"></i>
        Nos élèves
    </a>
</li>
<li class="nav-item">
    <a
        class="nav-link me-3<?= $_SERVER['REQUEST_URI'] === '/sport.php' ? 'active link-primary-color' : '' ?>"
        href="/sport.php"
    >
        <i class="fa-solid fa-dumbbell me-2 <?= $_SERVER['REQUEST_URI'] === '/sport.php' ? 'fa-bounce' : '' ?>"></i>
        Nos sports
    </a>
</li>

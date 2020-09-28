

<nav>
    <ul class="pagination">
        <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
        <li class="page-item <?= ($page  == 1) ? "disabled" : "" ?>">
            <a href="index.php?action=list_Comment_flag&amp;page=<?= $page  - 1 ?>" class="page-link">Précédente</a>
        </li>
        <?php for($i = 1; $i <= $pages; $i++): ?>
            <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
            <li class="page-item <?= ($i == $page) ? "active" : "" ?>">
                <a href="index.php?action=list_Comment_flag&amp;page=<?= $i ?>" class="page-link"><?= $i ?></a>
            </li>
        <?php endfor ?>
            <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
            <li class="page-item <?= ($page == $pages ) ? "disabled" : "" ?>">
            <a href="index.php?action=list_Comment_flag&amp;page=<?= $page + 1 ?>" class="page-link">Suivante</a>
        </li>
    </ul>
</nav>
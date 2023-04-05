<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
  <ul class="pagination pagination-sm my-2 justify-content-end">
    <?php if ($pager->hasPrevious()) { ?>
      <li class="page-item disabled">
        <a class="page-link" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
          <span aria-hidden="true">
            <?= lang('Pager.first') ?>
          </span>
        </a>
      </li>

    <?php } else { ?>
      <li class="page-item">
        <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
          <span class="page-link" aria-hidden="true">
            &laquo;
          </span>
        </a>
      </li>
    <?php } ?>

    <?php foreach ($pager->links() as $link) : ?>
      <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
        <a class="page-link" href="<?= $link['uri'] ?>">
          <?= $link['title'] ?>
        </a>
      </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) { ?>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
      <li class="page-item">
        <a class="page-link" href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
          <span aria-hidden="true">Last</span>
        </a>
      </li>
    <?php } ?>
  </ul>
</nav>
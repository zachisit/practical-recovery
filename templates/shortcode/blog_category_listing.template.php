<?php
/**
 * Blog Category Listing sidebar template
 *
 * @var $terms
 * @package practical-recovery
 */

echo '<ul>';
foreach ($terms as $term) : ?>
    <li><a href="/prblog_cat/<?=$term->slug?>" title=""><?=$term->name?></a> (<?=$term->count?>)</li>
<?php endforeach;
echo '</ul>'; ?>
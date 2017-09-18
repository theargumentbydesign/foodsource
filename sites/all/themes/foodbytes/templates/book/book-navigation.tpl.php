<?php

/**
 * @file
 * Default theme implementation to navigate books.
 *
 * Presented under nodes that are a part of book outlines.
 *
 * Available variables:
 * - $tree: The immediate children of the current node rendered as an unordered
 *   list.
 * - $current_depth: Depth of the current node within the book outline. Provided
 *   for context.
 * - $prev_url: URL to the previous node.
 * - $prev_title: Title of the previous node.
 * - $parent_url: URL to the parent node.
 * - $parent_title: Title of the parent node. Not printed by default. Provided
 *   as an option.
 * - $next_url: URL to the next node.
 * - $next_title: Title of the next node.
 * - $has_links: Flags TRUE whenever the previous, parent or next data has a
 *   value.
 * - $book_id: The book ID of the current outline being viewed. Same as the node
 *   ID containing the entire outline. Provided for context.
 * - $book_url: The book/node URL of the current outline being viewed. Provided
 *   as an option. Not used by default.
 * - $book_title: The book/node title of the current outline being viewed.
 *   Provided as an option. Not used by default.
 *
 * @see template_preprocess_book_navigation()
 *
 * @ingroup themeable
 */
?>
<?php if ($tree || $has_links): ?>
  <div id="book-navigation-<?php print $book_id; ?>" class="book-navigation">
    <?php print $tree; ?>

    <?php if ($has_links): ?>
    <div class="page-links clearfix">
    <?php if ($parent_url): ?>
        <a href="<?php print $parent_url; ?>" class="page-up" title="<?php print t('Go to Chapter title page'); ?>">Up to Chapter overview</a>
      <?php endif; ?>
    
          <?php
		  
		  $prevtext = substr($prev_url, 1, 2);
		 $prev = substr_replace($prevtext, ".",1,0);
		  
		   if ($prev_url != $parent_url): ?>
          
        <a href="<?php print $prev_url; ?>" class="page-previous" title="<?php print t('Go to previous section'); ?>">Go back to Section <?php print $prev; ?> …</a>
      <?php endif; ?>
      
      <?php
	  
	     $nextext = substr($next_url, 1, 2);
		 $next = substr_replace($nextext, ".",1,0);
	   if ($next_url): 
             
?>
        <a href="<?php print $next_url; ?>" class="page-next" title="<?php print t('Go to next section'); ?>">Onwards to Section <?php print $next; ?>…</a>
      <?php endif; ?>
    </div>
    <?php endif; ?>

  </div>
<?php endif; ?>

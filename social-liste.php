<?php
/**
 * @package fabthemes
 */
?>

<?php $socialURL = urlencode(get_permalink()); ?>


<a href='https://www.facebook.com/sharer/sharer.php?u=<?php echo $socialURL; ?>' class="social-open" data-site="facebook">
    <span class="icon-facebook-1"></span>
</a>



<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php echo wp_trim_words( get_the_title(), 8 ); ?>&via=<?php bloginfo(url); ?>" class="social-open" data-site="twitter">
<span class="icon-twitter-1"></span>
</a>



<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="social-open" data-site="gplus">
  <span class="icon-gplus"></span>
</a>



<a data-site="linkedin" class="social-open" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo wp_trim_words( get_the_title(), 8 ); ?>&amp;summary=<?php echo wp_trim_words( get_the_content(), 20 ); ?>">
   <span class="icon-linkedin"></span>
</a>



<div id="sidebar">

<?php
$pagename = $post->post_name;

  if (is_home()) { /* if index.php */
    if ( is_active_sidebar( 'sidebar' ) ){ ?>
      <div id="sidebar">
        <?php dynamic_sidebar( 'sidebar' ); ?>
      </div> <!-- end #sidebar -->
    <?php } 
      }
  else {

  switch ($pagename) {
      case "about":
          get_template_part('sidebar-about', 'page'); //2
          break;
      case "academic-articles":
          get_template_part('sidebar-academic', 'page'); //3
          break;
      case "articles":
          get_template_part('sidebar-articles', 'page'); //4
          break;
      case "books":
          get_template_part('sidebar-books', 'page'); //5
          break;
      case "interviews":
          get_template_part('sidebar-interviews', 'page'); //6
          break;  
      case "journalism":
          get_template_part('sidebar-journalism', 'page'); //7
          break;
      case "press-and-media-coverage":
          get_template_part('sidebar-pressmedia', 'page'); //8
          break;
      case "reviews":
          get_template_part('sidebar-reviews', 'page'); //9
          break;
      case "talks":
          get_template_part('sidebar-talks', 'page'); //10
          break;
      case "tvradio":
          get_template_part('sidebar-tvradio', 'page'); //11
          break;            
      default: /* homepage*/
          get_template_part('sidebar', 'page');
    }
  }
?>

</div>

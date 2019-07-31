<?php

function job_one_pagination($pages = '', $range = 2)
{  
    
    $showitems = ($range * 2)+1;  
    
    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $search_query;
        $pages = $search_query->max_num_pages;
        
        if(!$pages)
        {
            $pages = 1;
        }
    }   
    
    if(1 != $pages)
    {   ?>

    <style type="text/css">

        .pagination {
            display: flex;
            width:100%;
            justify-content: center;
            clear:both;
            padding:20px 0;
            margin: 0 auto; 
            position:relative;
            line-height:13px;
        }

        .pagination span, .pagination a {
            display: block;
            float: left;
            margin: 2px 0.4rem 2px 0.4rem;
            padding: 0.53rem 0.66rem 0.53rem 0.66rem;
            text-decoration: none;
            width: auto;
            color: #707070;
            font-size: 14px;
            line-height: 14px;
            background: #fff;
            border: 1px solid #707070;
        }

        .pagination a:hover{
            color:#fff;
            background: #f06371;
        }

        .pagination .current{
            background: #f06371;
            color:#fff;
        }

    </style>

    <?php

        echo "<div class='pagination'>";
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
            echo "<a href='".get_pagenum_link(1)."'><i class='fas fa-angle-double-left'></i> First</a>";

        if($paged > 1 && $showitems < $pages) 
            echo "<a href='".get_pagenum_link($paged - 1)."'><i class='fas fa-angle-double-left'></i></a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) 
            echo "<a href='".get_pagenum_link($paged + 1)."'><i class='fas fa-angle-double-right'></i></a>";  

        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
            echo "<a href='".get_pagenum_link($pages)."'>Last <i class='fas fa-angle-double-right'></i></a>";

        echo "</div>\n";
    }
}



add_action( 'pre_get_posts', 'wpse176347_pre_get_posts' );
function wpse176347_pre_get_posts( $q ) 
{
    if(    !is_admin() 
        && $q->is_main_query() 
        && $q->is_post_type_archive( array('restaurants') ) 
    ) {
        $q->set( 'posts_per_page', 6          );
        $q->set( 'orderby',        'modified' );
    }
}
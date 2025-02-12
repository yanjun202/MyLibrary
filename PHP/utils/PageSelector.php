<?php

class PageSelector
{
    public static function getNavArray($max_nav_pages, $curr_page, $total_pages): array
    {
        $nav_pages = min($total_pages, $max_nav_pages);
        $gap_num = floor($nav_pages / 2);
        $nav = [$nav_pages];
        if(($total_pages >= $max_nav_pages) && ($curr_page > $total_pages - $gap_num)) {
            for($i = 0; $i < $nav_pages; $i++) {
                $nav[$i] = $total_pages - $nav_pages + $i + 1;
            }
        } else if (($total_pages >= $max_nav_pages) && ($curr_page > $gap_num)) {
            for($i = 0; $i < $nav_pages; $i++) {
                $nav[$i] = $curr_page - $gap_num + $i;
            }
        } else {
            for($i = 0; $i < $nav_pages; $i++) {
                $nav[$i] = $i + 1;
            }
        }
        return $nav;
    }
}
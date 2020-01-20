<?php

if (! function_exists('human_time')) {
    function human_time($time)
    {
        return Date('d M Y', $time);
    }
}

if (! function_exists('count_books')) {
    function count_books($book_id) {
        $that = get_instance();

        return $that->history_model->count_by('book_id', $book_id);
    }
}

if (! function_exists('last_downloaded')) {
    function last_downloaded($book_id) {
        $that = get_instance();

        $user_id = $that->history_model->order_by('id', 'desc')->get_by('book_id', $book_id)->user_id;
        return date('d M Y', $that->user_data_model->get_by('user_id', $user_id)->created_at);
    }
}

if (! function_exists('downloaded_by')) {
    function downloaded_by($book_id) {
        $that = get_instance();

        $user_id = $that->history_model->order_by('id', 'desc')->get_by('book_id', $book_id)->user_id;
        return $that->user_data_model->get_by('user_id', $user_id)->nama;
    }
}
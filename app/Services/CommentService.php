<?php
    namespace App\Services;

    use App\Models\Comment;

    class CommentService
    {
        protected $comments;

        function __construct()
        {
            $this->comments = new Comment;
        }

        public function isComment($report_id)
        {
            return $this->comments->where('report_id', $report_id)->exists();
        }
    }
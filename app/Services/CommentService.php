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

        /**
         * @param $report_id
         * @return mixed
         * 指定した日報にコメントがついているかを判断する
         */
        public function isComment($report_id)
        {
            return $this->comments->where('report_id', $report_id)->exists();
        }
    }
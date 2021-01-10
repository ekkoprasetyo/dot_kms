<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = "t_kms_comment";
    protected $primaryKey = 'c_comment_id';
    protected $fillable = [
        'c_comment_forum',
        'c_comment_comment',
        'c_comment_update_by',
        'c_comment_update_time',
    ];
    public $timestamps = false;
}

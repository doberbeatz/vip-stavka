<?php
namespace App\Blog\Models;

use Eloquent;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Blog extends Eloquent {


    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];



} 

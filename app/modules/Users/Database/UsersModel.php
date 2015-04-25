<?php
namespace App\Users\Database;

use Doberbeatz\Laraback\Core\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class UsersModel extends Model {


    protected $table = 'posts';
    protected $primaryKey = 'post_id';

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = ['header', 'brief', 'content', 'image', 'is_visible', 'author', 'type', 'meta_title',
'meta_keywords',
        'meta_description'];

    protected static $rules = [
        'header'	=>	'required',
        'brief'		=>	'required',
        'image'		=>	'required',
    ];

    protected static $messages = [
        'header.required'	=>	'Название должно быть заполнено',
        'brief.required'	=>	'Описание должно быть заполнено',
        'image.required'	=>	'Не загружено изображние',
    ];

	/**
     * @return mixed
     */
    public function getName()
    {
        return $this->header;
    }

	/**
     * @return mixed
     */
    public function getBrief()
    {
        return $this->brief;
    }

	/**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

	/**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

} 

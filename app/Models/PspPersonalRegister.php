<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 24 Nov 2018 05:08:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PspPersonalRegister
 * 
 * @property int $id
 * @property string $register_name
 * @property string $username
 * @property string $passwrd
 * @property string $description
 * @property string $url
 * @property string $pin
 * @property string $member_id
 * @property \Carbon\Carbon $created_date
 * @property \Carbon\Carbon $updated_date
 * @property int $active
 * @property int $category_id
 * 
 * @property \App\Models\PspRegisterCategory $psp_register_category
 * @property \Illuminate\Database\Eloquent\Collection $psp_questions
 *
 * @package App\Models
 */
class PspPersonalRegister extends Eloquent
{
	protected $table = 'psp_personal_register';
	public $timestamps = false;

	protected $casts = [
		'active' => 'int',
		'category_id' => 'int'
	];

	protected $dates = [
		'created_date',
		'updated_date'
	];

	protected $fillable = [
		'register_name',
		'email',
		'username',
		'passwrd',
		'description',
		'url',
		'pin',
		'member_id',
		'created_date',
		'updated_date',
		'active',
		'category_id'
	];

	public function psp_register_category()
	{
		return $this->belongsTo(\App\Models\PspRegisterCategory::class, 'category_id');
	}

	public function psp_questions()
	{
		return $this->hasMany(\App\Models\PspQuestion::class, 'register_id');
	}
}

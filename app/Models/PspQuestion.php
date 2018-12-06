<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 24 Nov 2018 05:08:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PspQuestion
 * 
 * @property int $column_1
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $register_id
 * 
 * @property \App\Models\PspPersonalRegister $psp_personal_register
 *
 * @package App\Models
 */
class PspQuestion extends Eloquent
{
	protected $table = 'psp_question';
	public $timestamps = false;

	protected $casts = [
		'column_1' => 'int',
		'register_id' => 'int'
	];

	protected $fillable = [
		'column_1',
		'question',
		'answer',
		'register_id'
	];

	public function psp_personal_register()
	{
		return $this->belongsTo(\App\Models\PspPersonalRegister::class, 'register_id');
	}
}

<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 24 Nov 2018 05:08:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PspRegisterCategory
 * 
 * @property int $id
 * @property string $name
 * @property int $active
 * 
 * @property \Illuminate\Database\Eloquent\Collection $psp_personal_registers
 *
 * @package App\Models
 */
class PspRegisterCategory extends Eloquent
{
	protected $table = 'psp_register_category';
	public $timestamps = false;

	protected $casts = [
		'active' => 'int'
	];

	protected $fillable = [
		'name',
		'active'
	];

	public function psp_personal_registers()
	{
		return $this->hasMany(\App\Models\PspPersonalRegister::class, 'category_id');
	}
}

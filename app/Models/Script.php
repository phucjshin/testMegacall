<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Script
 * 
 * @property int $id
 * @property int $company_id
 * @property string $module
 * @property int $block_num
 * @property string $name
 * @property array $detail
 * @property string $description
 * @property string $content
 * @property string $del_flag
 * @property \Carbon\Carbon $created
 * @property string $entry_user
 * @property string $entry_program
 * @property \Carbon\Carbon $modified
 * @property string $update_user
 * @property string $update_program
 *
 * @package App\Models
 */
class Script extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'company_id' => 'int',
		'block_num' => 'int',
		'detail' => 'json'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'company_id',
		'module',
		'block_num',
		'name',
		'detail',
		'description',
		'content',
		'del_flag',
		'created',
		'entry_user',
		'entry_program',
		'modified',
		'update_user',
		'update_program'
	];
}

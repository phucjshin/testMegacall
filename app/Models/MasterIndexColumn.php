<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MasterIndexColumn
 * 
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property array $columns
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
class MasterIndexColumn extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'columns' => 'json'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'user_id',
		'code',
		'columns',
		'del_flag',
		'created',
		'entry_user',
		'entry_program',
		'modified',
		'update_user',
		'update_program'
	];
}

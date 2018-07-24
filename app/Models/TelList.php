<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TelList
 * 
 * @property int $id
 * @property int $no
 * @property string $module
 * @property int $type
 * @property int $company_id
 * @property string $name
 * @property int $quantity
 * @property int $muko_quantity
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
class TelList extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'no' => 'int',
		'type' => 'int',
		'company_id' => 'int',
		'quantity' => 'int',
		'muko_quantity' => 'int',
		'columns' => 'array'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'no',
		'module',
		'type',
		'company_id',
		'name',
		'quantity',
		'muko_quantity',
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

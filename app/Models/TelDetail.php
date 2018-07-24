<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TelDetail
 * 
 * @property int $id
 * @property int $tel_list_id
 * @property string $tel_no
 * @property array $details
 * @property int $muko_flag
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
class TelDetail extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'tel_list_id' => 'int',
		'details' => 'json',
		'muko_flag' => 'int'
	];

	protected $dates = [
		'created',
		'modified'
	];

	protected $fillable = [
		'tel_list_id',
		'tel_no',
		'details',
		'muko_flag',
		'del_flag',
		'created',
		'entry_user',
		'entry_program',
		'modified',
		'update_user',
		'update_program'
	];
}

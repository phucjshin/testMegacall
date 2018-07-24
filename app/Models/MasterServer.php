<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MasterServer
 * 
 * @property int $id
 * @property string $module
 * @property string $server_ip
 * @property string $server_port
 * @property string $module_port
 * @property string $username
 * @property string $password
 * @property string $root_user
 * @property string $root_pass
 * @property string $local_path
 * @property int $created_by
 * @property \Carbon\Carbon $created_at
 * @property int $updated_by
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 *
 * @package App\Models
 */
class MasterServer extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'module',
		'server_ip',
		'server_port',
		'module_port',
		'username',
		'password',
		'root_user',
		'root_pass',
		'local_path',
		'created_by',
		'updated_by'
	];
}

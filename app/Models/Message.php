<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 23 Jul 2018 01:51:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $id
 * @property string $message_content
 * @property int $type
 *
 * @package App\Models
 */
class Message extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'type' => 'int'
	];

	protected $fillable = [
		'message_content',
		'type'
	];
}

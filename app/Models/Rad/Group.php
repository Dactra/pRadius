<?php
/**
 * Date: 6/1 0001
 * Time: 16:24
 * @author GROOT (pzyme@outlook.com)
 */
namespace App\Models\Rad;

use Illuminate\Database\Eloquent\Model;
use DB;

class Group extends Model {
    protected $table = 'radusergroup';
    protected $guarded = ['id'];
}
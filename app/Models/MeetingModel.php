<?php 
namespace App\Models;
use CodeIgniter\Model;
class MeetingModel extends Model
{
    protected $table = 'tbl_meeting';
    protected $primaryKey = 'id';
    protected $allowedFields = ['meeting_title', 'dates','times','attendees','agenda','discussion','conclusion'];

    protected $useTimestamps = false;
}
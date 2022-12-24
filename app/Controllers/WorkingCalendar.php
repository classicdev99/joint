<?php
defined('BASEPATH') or exit('No direct script access allowed');

namespace App\Controllers;

use App\Models\TasksProjectsModel;

class workingCalendar extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $this->session = session();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $this->load->library('CalendarEventCustom');
        $model = new TasksProjectsModel();
        
        $calendar = new CalendarEventCustom();
        $getTasks = $model->getTasks();
        foreach ($getTasks->result_arrayy() as $task) {
            $calendar->add_event($task['description'], $task['due_date']);
        }
        $data['html'] = $calendar;
        $this->load->view('Calendar/WorkingCalendar.php', $data);
    }
}

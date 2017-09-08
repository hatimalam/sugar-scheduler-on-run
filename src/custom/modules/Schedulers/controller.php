<?php

/**
 * Desc: Custom controller to call our action from URL
 * Written by: Hatim Alam
 * Last Modified: 8th Sept, 2017
 */

class SchedulersController extends SugarController
{
    public function __construct()
    {
        parent::__construct();
    }

	//custom action
    public function action_InstantRunJob()
    {
        if(isset($_REQUEST['runjob']))
        {
            //get the selected job id
            $scheduler_id = $_REQUEST['job_list'];
            if(!empty($scheduler_id))
            {
                $this->view_object_map['selected_job'] = $scheduler_id;
                $scheduler_bean = BeanFactory::getBean("Schedulers", $scheduler_id);
                //create scheduler job in job queue
                $job = new SchedulersJob();
                $job->name = $scheduler_bean->name;
                $job->scheduler_id = $scheduler_bean->id;
                $job->target = $scheduler_bean->job;
                $job->assigned_user_id = $GLOBALS['current_user']->id;
                $job->status = SchedulersJob::JOB_STATUS_RUNNING;
                $job->resolution = SchedulersJob::JOB_PENDING;
                $job->execute_time = $GLOBALS['timedate']->nowDb();
                $job_id = $job->save();
                $res = $job->runJobId($job_id, NULL);
                if($res)
                {
                    $this->view_object_map['success'] = true;
                    $this->view_object_map['message'] = "Job Run Successfully.";
                } else {
                    $this->view_object_map['success'] = false;
                    $this->view_object_map['message'] = "Job Failed.";
                }
            }
        }
        //call custom sugar view
        $this->view = 'instantrunjob';
    }
}

?>

<?php

/**
 * Desc: Custom view for listing the active jobs and allow user to run job
 * Written by: Hatim Alam
 * Last Modified: 8th Sept, 2017
 */

class SchedulersViewInstantRunJob extends SugarView
{
    public function process($params = array())
 	{
		$this->display();
 	}

 	/**
     * @see SugarView::display()
     */
    public function display()
    {
        $action_url = $GLOBALS['sugar_config']['site_url']."/index.php?module=Schedulers&action=InstantRunJob";
        //get list of all active schedulers
        $sq = new SugarQuery();
        $sq->from(BeanFactory::getBean("Schedulers"));
        $sq->select(array('id', 'name', 'job'));
        $sq->where()->equals("status", "Active");
        $result = $sq->execute();
        //if data, prepare HTML content
        if(!empty($result))
        {
            $html = <<<FORM
            <form name="runjob_form" method="post" action={$action_url}>
            <label>Select a job:&nbsp;</label>
            <select name="job_list">
FORM;
            //prepre dd list
            foreach($result as $res)
            {
                $selected = '';
                if($res['id'] == $this->view_object_map['selected_job'])
                    $selected = "selected";
                $html .= "<option value='".$res['id']."' $selected >".$res['name']."</option>";
            }
            $html .= "</select>";
            $html .= "&nbsp;&nbsp;";
            //add button to run a job
            $html .= "<input type='submit' name='runjob' value='Run Job'/>";
            //display message
            if(isset($this->view_object_map['success']))
			{
				$html .= "<p>{$this->view_object_map['message']}</p>";
			}
        } else {
            $html = "Alas ! No active schedulers.";
        }
        echo $html;
 	}
}

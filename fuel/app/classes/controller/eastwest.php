<?php

class Controller_EastWest extends Controller_Template{

    

    public function action_index(){
        $direction = isset($_GET['direction']) ? $_GET['direction'] : 'west';
        $data = array();

        if($direction == "east"){
            $this->template->title = 'East Page Homepage';
            $this->template->direction = 'index?direction=east';
            $this->template->direction2 = 'one?direction=east';
            $this->template->direction3 = 'two?direction=east';
            $this->template->otherDirection = '?direction=west';
            $this->template->nextDir = 'West';
            $this->template->css = 'east.css';
            $this->template->active1 = 'id = active';
            $this->template->active2 = '';
            $this->template->active3 = '';
            $this->template->content = View::forge('eastwest/index',$data);
        }else{
            $this->template->title = 'West Page Homepage';
            $this->template->direction = 'index?direction=west';
            $this->template->direction2 = 'one?direction=west';
            $this->template->direction3 = 'two?direction=west';
            $this->template->otherDirection = '?direction=east';
            $this->template->nextDir = 'East';
            $this->template->css = "east.css";
            $this->template->active1 = 'id = active';
            $this->template->active2 = '';
            $this->template->active3 = '';
            $this->template->content = View::forge('eastwest/index',$data);
        }     

    }

    public function action_one(){

        $direction = isset($_GET['direction']) ? $_GET['direction'] : 'west';
        $data = array();
        
        if($direction == "east"){
            $this->template->title = 'East Page ONE';
            $this->template->direction = '?direction=east';
            $this->template->direction2 = 'one?direction=east';
            $this->template->direction3 = 'two?direction=east';
            $this->template->otherDirection = 'one?direction=west';
            $this->template->nextDir = 'West';
            $this->template->css = "east.css";
            $this->template->active1 = '';
            $this->template->active2 = 'id = active';
            $this->template->active3 = '';
            $this->template->content = View::forge('eastwest/one',$data);
        }else{
            $this->template->title = 'West Page ONE';
            $this->template->direction = '?direction=west';
            $this->template->direction2 = 'one?direction=west';
            $this->template->direction3 = 'two?direction=west';
            $this->template->otherDirection = 'one?direction=east';
            $this->template->nextDir = 'East';
            $this->template->css = "east.css";
            $this->template->active1 = '';
            $this->template->active2 = 'id = active';
            $this->template->active3 = '';
            $this->template->content = View::forge('eastwest/one',$data);
        }
        
    }

    public function action_two(){

        $data = array();
        $direction = isset($_GET['direction']) ? $_GET['direction'] : 'west';

        if($direction == "east"){
            $this->template->title = 'East Page TWO';
            $this->template->direction = '?direction=east';
            $this->template->direction2 = 'one?direction=east';
            $this->template->direction3 = 'two?direction=east';
            $this->template->otherDirection = 'two?direction=west';
            $this->template->nextDir = 'West';
            $this->template->css = "east.css";
            $this->template->active1 = '';
            $this->template->active2 = '';
            $this->template->active3 = 'id = active';
            $this->template->content = View::forge('eastwest/two',$data);
        }else{
            $this->template->title = 'West Page TWO';
            $this->template->direction = '?direction=west';
            $this->template->direction2 = 'one?direction=west';
            $this->template->direction3 = 'two?direction=west';
            $this->template->otherDirection = 'two?direction=east';
            $this->template->nextDir = 'East';
            $this->template->css = "east.css";
            $this->template->active1 = '';
            $this->template->active2 = '';
            $this->template->active3 = 'id = active';
            $this->template->content = View::forge('eastwest/two',$data);
        }
    }
    

}

?>
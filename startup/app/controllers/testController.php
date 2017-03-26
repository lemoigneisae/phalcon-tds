<?php

/**
 * Created by PhpStorm.
 * User: isaelemoigne
 * Date: 01/03/2017
 * Time: 15:52
 *
 */
class testController extends ControllerBase{
    protected $semantic;

    public function initialize(){
        $this->semantic=$this->jquery->semantic();
    }

    public function indexAction(){

    }

    public function hideShowAction(){

        $ck=$this->semantic->htmlCheckbox("checkbox","Masquer/afficher");
        $info=$this->semantic->htmlSegment("zone");
        $ck->on("change",$info->jsToggle("$(this).prop('checked')"));

        $this->jquery->compile($this->view);
    }

    public function getSimpleAction(){

        $bt1=$this->semantic->htmlButton("btPage1", "page 1");
        $bt1->getOnClick("test/page1","#pageContent");
        $bt1->setProperty('data-description','Description Boutton 1');

        $bt2=$this->semantic->htmlButton("btPage2", "page 2");
        $bt2->getOnClick("test/page2","#pageContent");
        $bt2->setProperty('data-description','Description Boutton 2');

        $bt1->on("mouseover",$this->jquery->html("#pageDesc",$bt1->getProperty('data-description')));
        $bt2->on("mouseover",$this->jquery->html("#pageDesc",$bt2->getProperty('data-description')));

        $bt1->on("mouseout",$this->jquery->html("#pageContent",""));
        $bt1->on("mouseout",$this->jquery->html("#pageDesc",""));
        $bt2->on("mouseout",$this->jquery->html("#pageContent",""));
        $bt2->on("mouseout",$this->jquery->html("#pageDesc",""));


        $this->semantic->htmlMessage("pageContent");

        $bt1->getOn("mouseover","test/page1","#pageContent");
        $bt2->getOn("mouseover","test/page2","#pageContent");

        $this->jquery->compile($this->view);

    }


    public function getCascadeAction(){
        $bt = $this->semantic->htmlButton("btLoad","Chargement");
        $bt->getOnClick("test/page3","#page3");

        $this->jquery->compile($this->view);
    }

    public function page1Action(){
        echo "Page 1...";

    }

    public function page2Action(){
        echo "...Page 2";
    }

    public function page3Action(){
        $this->view->disable();
        echo "Page 3";
        echo "<div id='page4' style='border-style: solid; border-color:green'></div>";
        $this->jquery->get("test/page4","#page4");
        echo $this->jquery->compile();
    }

    public function page4Action(){
        $this->view->disable();
        echo "Page 4";
    }
}
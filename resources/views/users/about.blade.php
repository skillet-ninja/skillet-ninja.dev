@extends('layouts.master')

@section('content')

    <div class="animated fadeIn">
        
        <h1 class="text-center">Team Skillet Ninja</h1>

        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption">
                    <h3>Greetings!</h3>
                    <p>Skillet Ninja is an MVC Web App, and serves as the capstone project for Codeup, a full-stack web developement career accelerator in San Antonio, TX. Our application provides users (the cooking challenged) with a virtual cooking assistant to walk through any recipe on our site. Members may also post and edit new recipes. Development technologies used in building Skillet Ninja include PHP 5.6, Laravel 5.1, MySQL Database, JavaScript, CSS3, HTML5, Twitter Boostrap, annyang.js, Web Speech API, Balsamiq, and Adobe Illustrator.</p> 
                    <p>We hope you enjoy using our site. Happy cooking!</p> 
                    <p>-Team Skillet Ninja</p>
                </div>
            </div>
        </div>
        
        <br>

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <div class="thumbnail">
                    <img class="bioPics" src="/assets/img/DanielCarroll.jpg" alt="...">
                    <div class="caption">
                        <h3>Dan Carroll</h3>
                        <p class="aboutContent">Dan is <strong>not</strong> a bad cook...check out that belly! He hopes to use his <strong>PHP, SQL</strong>, and <strong>JavaScript</strong> skills building challenging web apps as he transitions from 15 years of engineering design work.
                        </p>
                        <p class="text-center aboutContent"><em>I launched Gene Rodenberry into space.</em></p>

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <div class="thumbnail">
                    <img class="bioPics" src="/assets/img/JustinReich.jpg" alt="...">
                    <div class="caption">
                        <h3>Justin Reich</h3>
                        <p class="aboutContent">Justin is a bad cook and loves developing front-end solutions for the web using <strong>HTML, CSS,</strong> and <strong>JavaScript</strong>. Before attending Codeup, Justin taught piano performance full-time for five years in San Antonio.</p>
                        <p class="text-center aboutContent"><em>“Process is the music of code.”</em></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <div class="thumbnail">
                    <img class="bioPics" src="/assets/img/DanielRoss.jpg" alt="...">
                    <div class="caption">
                        <h3>Daniel Ross</h3>
                        <p class="aboutContent">Other Dan is a great cook…but he still needs help when he’s trying to follow a recipe with food all over his hands. His three strongest technologies are <strong>JS, PHP</strong>, and <strong>SQL</strong>.</p>
                        <p class="aboutContent text-center"><em>"It’s never too late to be who you might have been.” – George Eliot</em></p>  
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    

@stop
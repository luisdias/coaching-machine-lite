<?php
/*
MIT License

Copyright (c) 2017 Luís Dias

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/
App::uses('AppController', 'Controller');
/**
 * Panel Controller
 */
class PanelController extends AppController {

    public function index() {
        $this->loadModel('User');
        $this->loadModel('Meeting');
        $this->loadModel('Payment');
        $this->loadModel('Task');
        $this->loadModel('Pack');

		$coachee_id = $this->Session->read('Coachee.User.id');
		$active_pack_id = $this->Session->read('Coachee.Pack.id');

        /******************/
        /* Meetings Today */
        $conditions = array('Meeting.date = '  => date('Y-m-d'));

        if (!is_null($coachee_id)) {
            array_push($conditions,['Meeting.user_id' => $coachee_id]);
        }

        $meetings_today = $this->Meeting->find(
            "all", 
            array(
                'conditions' => $conditions,
                'recursive' => 1,
                'order'=> array('Meeting.user_id','Meeting.date')                
                )
            );

        /********************************/
        /* Meetings for the next 5 days */
        /********************************/
        $conditions = array(
                'Meeting.date > ' => date('Y-m-d'), 
                'Meeting.date <= ' =>  date('Y-m-d',strtotime("+5 day", strtotime(date('Y-m-d'))))
                );

        if (!is_null($coachee_id)) {
            array_push($conditions,['Meeting.user_id' => $coachee_id]);
        }

        $meetings_week = $this->Meeting->find(
            "all", 
            array(
                'conditions' => $conditions,
                'recursive' => 1,
                'order'=> array('Meeting.user_id','Meeting.date')
                )
            );

        /*****************/
        /* Late Payments */
        /*****************/
        $conditions = array(
                'Payment.due_date <= ' => date('Y-m-d'), 
                'Payment.payment_date = ' => ''
                );

        if (!is_null($coachee_id)) {
            array_push($conditions,['Payment.user_id' => $coachee_id]);
        }

        $late_payments = $this->Payment->find(
            "all", 
            array(
                'conditions' => $conditions,
                'order'=> array('Payment.user_id','Payment.due_date')
                )
            );

        /*****************/
        /* Next Payments */
        /*****************/
        $conditions = array(
                "AND" => array(
                'Payment.due_date > ' => date('Y-m-d'), 
                'Payment.payment_date = ' => '')
                );

        if (!is_null($coachee_id)) {
            array_push($conditions,['Payment.user_id' => $coachee_id]);
        }

        $next_payments = $this->Payment->find(
            "all", 
            array(
                'conditions' => $conditions,
                'order' => array('Payment.user_id','Payment.due_date')
            )
            );

        /*********************/
        /* Coach Performance */
        /*********************/
        $coach_performance = null;
        if (!is_null($coachee_id)) {
            $conditions = array(
                'Pack.user_id' => $coachee_id,
                'Pack.status' => 'Active'
            );
            $active_pack = $this->Pack->find(
                "all", 
                array(
                    'conditions' => $conditions, 
                    'recursive' => 0,
                    'fields' => array('Pack.id', 'Pack.status')
                    ));

            if (!is_null($active_pack)) {

                $conditions = array(
                    'Meeting.pack_id = ' => $active_pack[0]['Pack']['id'],
                    'Meeting.user_id = ' => $coachee_id,
                    );

                $coach_performance = $this->Meeting->find(
                    "all", 
                    array('conditions' => $conditions,
                    'recursive' => 1,
                    'fields' => array('Meeting.number','Meeting.date','Meeting.self_evaluation'))
                    );
                
            }
        }

        $this->set('meetings_today',$meetings_today);
        $this->set('meetings_week',$meetings_week);
        $this->set('late_payments',$late_payments);
        $this->set('next_payments',$next_payments);
        $this->set('coach_performance',$coach_performance);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: rimon
 * Date: 8/31/16
 * Time: 5:08 AM
 */

namespace App\Classes;


class Container
{
    private $user, $contest, $problem, $submission, $verdict;

    /**
     * Container constructor.
     * @param $user
     * @param $contest
     * @param $problem
     * @param $submission
     * @param $verdict
     */
    public function __construct($user, $contest, $problem, $submission, $verdict)
    {
        $this->user = $user;
        $this->contest = $contest;
        $this->problem = $problem;
        $this->submission = $submission;
        $this->verdict = $verdict;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getContest()
    {
        return $this->contest;
    }

    /**
     * @param mixed $contest
     */
    public function setContest($contest)
    {
        $this->contest = $contest;
    }

    /**
     * @return mixed
     */
    public function getProblem()
    {
        return $this->problem;
    }

    /**
     * @param mixed $problem
     */
    public function setProblem($problem)
    {
        $this->problem = $problem;
    }

    /**
     * @return mixed
     */
    public function getSubmission()
    {
        return $this->submission;
    }

    /**
     * @param mixed $submission
     */
    public function setSubmission($submission)
    {
        $this->submission = $submission;
    }

    /**
     * @return mixed
     */
    public function getVerdict()
    {
        return $this->verdict;
    }

    /**
     * @param mixed $verdict
     */
    public function setVerdict($verdict)
    {
        $this->verdict = $verdict;
    }


}
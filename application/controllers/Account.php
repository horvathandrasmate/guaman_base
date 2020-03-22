<?php

/**
 * Created by PhpStorm.
 * User: horva
 * Date: 2019.03.14.
 * Time: 19:26
 */

if (!defined('BASEPATH')) exit('Direct access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Account_model");
    }
    public function profile()
    {
    }
    public function index()
    {
        $this->load->view("templates/header");
        $this->load->view("account/welcome");
        $this->load->view("templates/footer");
    }
    function login()
    {
        if ($this->session->userdata("logged_in")) {
            redirect(base_url("account/profile"));
        }


        if (NULL !== $this->input->post('register')) {
            $nice_user_name = $this->input->post("nice_name");
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $repeat_password = $this->input->post("repeat_password");
            $email = $this->input->post("email");

            if ($password != $repeat_password) {
                $this->load->view("templates/header");
                alert_swal_error("Passwords dont match");
            }
            try {
                $this->Account_model->register($username, $nice_user_name, $password, $email);
            } catch (Exception $e) {

                if ($e->getMessage() == "not_valid_username") alert_swal_error("Username not valid", "account/login");
                if ($e->getMessage() == "not_valid_nice_user_name") alert_swal_error("Real name not valid", "account/login");
                if ($e->getMessage() == "not_valid_email") alert_swal_error("Email not valid", "account/login");
                if ($e->getMessage() == "username_match") alert_swal_error("Username Match", "account/login");
                if ($e->getMessage() == "email_match") alert_swal_error("Email Match", "account/login");

            }
            alert_swal_success("Sikeres regisztráció!", "account/login");
       
        } elseif (NULL !== $this->input->post('login')) {
           
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            

            try {
                $this->Account_model->login($username, $password);
            } catch (Exception $e) {
                if ($e->getMessage() == "password_dont_match") alert_swal_error("Password dont match", "account/login");
                if ($e->getMessage() == "unknown_username") alert_swal_error("Unknown Username", "account/login");
                die();
            }
            alert_swal_success("Sikeres bejelentkezés!", "account/login");
        } else {

            $this->load->view("templates/header");
            $this->load->view("account/login");
            $this->load->view("templates/footer");
        }
    }
    function logout()
    {
        $this->Account_model->logout();
        redirect(base_url("account/login"));
    }
}

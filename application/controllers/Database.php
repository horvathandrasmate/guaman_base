<?php


/**
 * @property Database_model Database_model
 * @property
 */
class Database extends CI_Controller
{


    function index()
    {
        require_login();

        $this->load->view('templates/header');
        $this->load->view('templates/menu');


        $this->load->view('templates/footer');
    }

    function create_table()
    {

        if (NULL !== $this->input->post("submit")) {
            $table_name = $this->input->post("table_name");
            $counter = $this->input->post("counter");
            $array_of_inputs = array();
            for($i=1;$i<=$counter;$i++){

                $array_of_inputs[$i] = $this->input->post("input-".$i);

            }
            $array_of_types = array();
            for($i=1;$i<=$counter;$i++){

                $array_of_types[$i] = $this->input->post("input-type-".$i);

            }

            try {
                $this->Database_model->create_table($table_name, $array_of_inputs, $array_of_types);
            } catch (Exception $e) {
                if($e->getMessage() === "unknown_type") alert_swal("Unknown type", "database/create_table");
                if($e->getMessage() === "table_name_exists") alert_swal("Table name exists", "database/create_table");
                if($e->getMessage() === "table_exists") alert_swal("Table exists", "database/create_table");
            }
            redirect("database/");
        } else {

            $this->load->view('templates/header');
            $this->load->view('templates/menu');

            $type_data = $this->Database_model->get_column_types();

            $this->load->view("database/create_table" , array("type_data" => $type_data));

            $this->load->view('templates/footer');
        }
    }

    function get_table($table_name = "")
    {
        if ($table_name == "") {
            alert_swal("Table not given", "account/admin");
        }
        $this->load->helper("login");
        if (require_login()) {
            require_permission("admin");
            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $data = $this->Database_model->get_table($table_name);

            try {
                $this->load->view('database/table', array("data" => $data, "table_name" => $table_name));
            } catch (Exception $e) {
                if ($e->getMessage() == "table_not_found") alert_swal("Table not found", "account/admin");
            }
            $this->load->view('templates/footer');
        }

    }

    function delete_table($table_name){
        require_login();
        $this->load->dbforge();
        $this->Database_model->delete_row($this->config->item('table_prefix')."tables", array('table_name' => $table_name));
        $this->dbforge->drop_table($table_name);
        redirect("account/admin");
    }
    function get_table_json($table_name)
    {
        if ($table_name == "") {
            alert_swal("Table not given", "account/admin");
        }
        $this->load->helper("login");
        if (require_login()) {

            $this->load->library("Datatables");
            $aColumns = flatten($this->Database_model->get_columns($table_name));

            $this->datatables->from($table_name);

            echo $this->datatables->generate('json');
        }
    }

    function add_table()
    {
        if (require_login()) {
            require_permission("admin");

            if (NULL !== $this->input->post("submit_table")) {

                $table_name = $this->input->post("table_name");
                $table_nice_name = $this->input->post("table_name");

                try {
                    if (!in_array($table_name, flatten($this->Database_model->get_column($this->config->item("table_prefix") . "tables", "table_name")))) {
                        $this->Database_model->upload_row($this->config->item("table_prefix") . "tables", array("table_name" => $table_name, "table_nice_name" => $table_nice_name));
                        redirect(base_url("database/add_table"));
                    } else {
                        alert_swal("Table Duplicate", "account/admin");
                    }
                } catch (Exception $e) {
                    alert_swal("Denied upload", "account/admin");
                }


            } else {

                $this->load->view('templates/header');
                $this->load->view('templates/menu');

                $table_name = $this->config->item("table_prefix") . "tables";

                $this->load->view("database/add_table", array("table_name" => $table_name));

                $this->load->view('templates/footer');
            }
        }
    }


}
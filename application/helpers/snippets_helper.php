<?php
function build_table($table_name)
{
    $CI =& get_instance();
    $CI->load->model("Database_model");
    $table_columns = $CI->Database_model->get_columns($table_name);
    echo " <table id=\"table-container\" class=\"table-dark px-4 py-4 table-striped table table-active\">
            <thead>
            <tr>";
    foreach ($table_columns as $key => $value) {
        echo "<td class=''>" . strtoupper($value) . "</td>";
    }
    echo " </tr>\n</thead>\n<tbody>\n</tbody>\n</table>

        <script>
            $(document).ready(function () {
                $('#table-container').DataTable({
                    \"ajax\": {
                        url: '".base_url("database/get_table_json/" . $table_name) . "',
                        type: 'GET'
                    },


                    \"columns\": [";
    foreach ($table_columns as $key => $value) {
        echo "{'data':'$value'},\n";
    }
    echo "
                    ]
                });
                
            });
        </script>";

}
function nice_to_normal($str){
    $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' , 'Ő'=>'o', 'ő'=>'o', 'Ű'=>'u','ű'=>'u', 'Ü'=>'u','ü'=>'u', ' '=>'_' );
    return strtolower(strtr( $str, $unwanted_array ));
}
function flatten(array $array) {
    $return = array();
    array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
    return $return; 
}
function alert_swal($message, $redirect_url = "")
{

    echo "
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@8/dist/sweetalert2.all.min.js\"></script>
<script>
            
            $(document).ready(function(){
                Swal.fire({
                 title: 'Error!',
                text: '$message',
                 type: 'error',
                 confirmButtonText: 'OK' 
                }).then(function(){
                    if('".$redirect_url."' !== ''){
                        window.location.href = '" . base_url($redirect_url) . "';
                    }
                });
            });
        </script>";

}
?>
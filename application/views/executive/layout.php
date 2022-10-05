<?php

$this->load->view('executive/header');
if (isset($viewfile)) {
    $this->load->view($viewfile);
}
$this->load->view('executive/footer');
?>





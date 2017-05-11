<?php
    $data['success']  = $this->session->flashdata('success');
    $data['info']     = $this->session->flashdata('info');
    $data['warning']  = $this->session->flashdata('warning');
    $data['danger']   = $this->session->flashdata('danger');

    if ($data['success']) {
        $message_status = 'alert-success';
        $message = $data['success'];
    }

    if ($data['info']) {
        $message_status = 'alert-info';
        $message = $data['info'];
    }

    if ($data['warning']) {
        $message_status = 'alert-warning';
        $message = $data['warning'];
    }

    if ($data['danger']) {
        $message_status = 'alert-danger';
        $message = $data['danger'];
    }
?>

<?php if ($data['success'] || $data['info'] || $data['warning'] || $data['danger']): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="margin-top alert <?= $message_status ?>">
                <?= $message ?>
            </div>
        </div>
    </div>
<?php endif ?>
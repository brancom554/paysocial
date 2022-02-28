<?php
    if (!$this->user->is_logged) {
        $this->redirect('ss-admin/login');
    }
    $this->redirect('ss-admin/general');
?>
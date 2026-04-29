<?php

class User extends BaseModel {
    public function __construct() {
        parent::__construct();
        $this->table = 'users';
    }

    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}

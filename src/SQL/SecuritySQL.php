<?php
namespace App\SQL;

class SecuritySQL {
    const GET_LOGS = "SELECT * FROM security_logs ORDER BY timestamp DESC";
    const ENABLE_2FA = "UPDATE users SET two_factor_enabled = 1 WHERE id = :userId";
    const DISABLE_2FA = "UPDATE users SET two_factor_enabled = 0 WHERE id = :userId";
}
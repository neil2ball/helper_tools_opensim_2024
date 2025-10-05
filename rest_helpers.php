<?php
/**
 * REST API Helper functions for OpenSim currency system
 */

include("settings/config.php");

/**
 * Make REST API call to get wallet balance
 */
function get_wallet_balance_via_rest($uuid) {
    $url = REST_API_BASE_URL . '/wallet/' . $uuid . '?consumer_key=' . REST_CONSUMER_KEY . '&consumer_secret=' . REST_CONSUMER_SECRET;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code == 200) {
        $data = json_decode($response, true);
        if (isset($data['wallet_balance'])) {
            return $data['wallet_balance'];
        }
    }
    
    error_log("REST API balance check failed for UUID: $uuid, HTTP Code: $http_code");
    return 0;
}

/**
 * Make REST API call to update wallet balance
 */
function update_wallet_via_rest($uuid, $amount, $action, $transaction_detail, $payment_method = 'OpenSim', $note = '') {
    $url = REST_API_BASE_URL . '/wallet/' . $uuid;
    
    $data = array(
        'amount' => $amount,
        'action' => $action,
        'consumer_key' => REST_CONSUMER_KEY,
        'consumer_secret' => REST_CONSUMER_SECRET,
        'transaction_detail' => $transaction_detail,
        'payment_method' => $payment_method,
        'note' => $note
    );
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($http_code == 200) {
        $response_data = json_decode($response, true);
        if (isset($response_data['response']) && $response_data['response'] == 'success') {
            return $response_data['balance'];
        }
    }
    
    error_log("REST API wallet update failed for UUID: $uuid, Action: $action, Amount: $amount, HTTP Code: $http_code");
    return false;
}

/**
 * Check if user has sufficient balance via REST API
 */
function has_sufficient_balance_via_rest($uuid, $amount) {
    $balance = get_wallet_balance_via_rest($uuid);
    return ($balance >= $amount);
}

/**
 * Process money transfer between two users via REST API
 */
function transfer_money_via_rest($from_uuid, $to_uuid, $amount, $description) {
    // First debit from source
    $debit_result = update_wallet_via_rest($from_uuid, $amount, 'debit', $description);
    if ($debit_result === false) {
        return false;
    }
    
    // Then credit to destination
    $credit_result = update_wallet_via_rest($to_uuid, $amount, 'credit', $description);
    if ($credit_result === false) {
        // If credit fails, reverse the debit
        update_wallet_via_rest($from_uuid, $amount, 'credit', 'Reversal of failed transfer: ' . $description);
        return false;
    }
    
    return true;
}

#
# Send message to user via Robust XML-RPC
#
function send_user_alert($agentid, $message) {

    $db = new DB;

    // Get region where user is present
    $db->query("SELECT RegionID FROM " . C_PRESENCE_TBL . " WHERE UserID = '" . $db->escape($agentid) . "'");
    if (!$db->next_record()) {
        error_log("User $agentid not found in Presence table");
        return;
    }
    $regionid = trim($db->f('RegionID'));

    // Get region endpoint from regions table
    $db->query("SELECT serverIP, serverHttpPort FROM " . C_REGIONS_TBL . " WHERE uuid = '" . $db->escape($regionid) . "'");
    if (!$db->next_record()) {
        error_log("Region $regionid not found in regions table");
        return;
    }

    $host = $db->f('serverIP');
    $port = $db->f('serverHttpPort');
    $url  = "http://$host:$port";

    // Send alert via your new RemoteAdmin method
    $request = xmlrpc_encode_request("admin_alert_user", array(
        array(
            "password" => OPENSIM_REMOTEADMIN_PASSWORD,
            "agent_id" => $agentid,
            "message"  => $message
        )
    ));

    $context = stream_context_create(array('http' => array(
        'method'  => "POST",
        'header'  => "Content-Type: text/xml",
        'content' => $request
    )));

    $response = @file_get_contents($url, false, $context);

    if ($response === FALSE) {
        error_log("Failed to send alert to user $agentid via region $regionid");
    } else {
        error_log("Alert response: " . $response);
    }
}
?>
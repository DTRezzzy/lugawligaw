<?php
function insert_audit($pdo, $table_name, $audit_details){

    if($table_name === 'lugaw'){
        $table_name = "fund_audittrail";
    } elseif($table_name === 'ligaw') {
        $table_name = "voter_audittrail";
    }

    try{
        $sql = "INSERT INTO {$table_name} (UId, TaskName, Description, ProcessDate) VALUES (?,?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($audit_details);
    } catch (Exception $e) {
        
    }
}
?>
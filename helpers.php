<?php

    // Needed to DRY out these validations
    function doesKeyExist($db, $table, $id, $key) {
        $stmt = $db->prepare("SELECT id FROM $table WHERE id = ?");
        $stmt->execute([$id]);
        if ($stmt->rowCount() == 0) {
            echo json_encode(['message' => $key . ' Not Found']);
            return false;
        }
        return true;
    }
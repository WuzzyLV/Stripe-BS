<?php
    require 'con_db.php';

    function getLastApplications($size): array{
        require 'con_db.php';

        $query = $savienojums->query("SELECT * FROM pieteikums ORDER BY datums DESC LIMIT " . $size );

        $json = $query->fetch_all(MYSQLI_ASSOC);

        //format dates
        foreach($json as &$entry){ // dirty date formatting but oh well
            $entry['datums'] = date('d.m.y H:i', strtotime($entry['datums']));
        }

        $savienojums->close();

        return $json;
    }
    function getTimeStats(): array{
        require 'con_db.php';

        $query = $savienojums->query("SELECT DATE(datums) AS application_date, COUNT(*) AS application_count FROM pieteikums GROUP BY  DATE(datums) ORDER BY application_date;");

        $json = $query->fetch_all(MYSQLI_ASSOC);

        $savienojums->close();

        $formatted = array();
        foreach($json as $entry){
            $formatted[date('d.m.y', strtotime($entry['application_date']))] = $entry['application_count'];
        }
        return $formatted;
    }

    function applicationStats(): array{
        require 'con_db.php';
        $formatted = array();

        $query = $savienojums->query("SELECT status, COUNT(*) AS status_count FROM pieteikums GROUP BY status;");
        foreach($query->fetch_all(MYSQLI_ASSOC) as $entry){
            $formatted[$entry['status']] = $entry['status_count'];
        }
        
        $query = $savienojums->query("SELECT COUNT(*) AS total FROM pieteikums;");
        $formatted["total"] = $query->fetch_assoc()["total"];

        $savienojums->close();
        return $formatted;
    }

    

    $json = array();
    $json['stats'] = applicationStats();
    $json['applications'] = getLastApplications(7);
    $json['time_stats'] = getTimeStats();

    header('Content-Type: application/json');
    echo json_encode($json);




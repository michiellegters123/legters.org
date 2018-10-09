<html>
    <head>

    </head>

    <body>

        <style>

        </style>

        <?php
        include 'CSS.html';
        include 'Menu.html';

        include "DynamicTimeTable (1).php";

        $events = array();

        $events = array();

        $events[0] = new event("engels", 0, 8.40, 10.10, "schoolEvent");
        $events[1] = new event("java", 0, 10.30, 12, "schoolEvent");
        $events[2] = new event("php", 0, 12.30, 14, "schoolEvent");

        $events[3] = new event("WDV", 1, 10.30, 12, "schoolEvent");
        $events[4] = new event("SLB", 1, 12.30, 14, "schoolEvent");


        $events[5] = new event("engels", 2, 8.40, 10.10, "schoolEvent");
        $events[6] = new event("kunst", 2, 10.30, 12, "schoolEvent");
        $events[7] = new event("php", 2, 12.30, 14, "schoolEvent");
        $events[8] = new event("nederlands", 2, 14.15, 15.45, "schoolEvent");


        $events[9] = new event("office", 3, 8.40, 10.10, "schoolEvent");
        $events[10] = new event("rekenen", 3, 10.30, 12, "schoolEvent");
        $events[11] = new event("AV", 3, 12.30, 14.45, "schoolEvent");


        $events[12] = new event("AV", 4, 8.40, 11.30, "schoolEvent");
        $events[13] = new event("java", 4, 11.30, 14, "schoolEvent");
        $events[14] = new event("WDV", 4, 14.15, 15.45, "schoolEvent");


        eventColor:
        '#378006';

        createTimeTable($events, 30);
        ?>

    </body>

</html>
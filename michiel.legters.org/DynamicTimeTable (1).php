<br>
<?php

class event
{
    public $m_eventName;
    public $m_dayIndex;
    public $m_beginTime;
    public $m_endTime;
    public $m_class = "event";

    public function __construct($name, $day, $begin, $end, $cssClass)
    {
        $this->m_eventName = $name;
        $this->m_dayIndex = $day;
        $this->m_beginTime = $begin;
        $this->m_endTime = $end;
        $this->m_class = $cssClass;
    }
}


//class tableClass
//class tableHeader
//class time
//class event
//class tableRow
function createTimeTable($unconveventArray, $minPerBlock)
{
    $weekName = array("Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag", "Zondag");
    $minPerDay = 24 * 60;

    //convert the eventarray
    $eventArray = array();
    for ($i = 0; $i < sizeof($unconveventArray); $i++)
    {
        array_push($eventArray, $unconveventArray[$i]);
        $eventArray[$i]->m_beginTime = (int)$unconveventArray[$i]->m_beginTime + (($unconveventArray[$i]->m_beginTime - floor($unconveventArray[$i]->m_beginTime)) / 0.6);
        $eventArray[$i]->m_endTime = (int)$unconveventArray[$i]->m_endTime + ($unconveventArray[$i]->m_endTime - floor($unconveventArray[$i]->m_endTime)) / 0.6;
    }

    for ($i = 0; $i < sizeof($eventArray); $i++)
    {
        $eventArray[$i]->m_beginTime = round($eventArray[$i]->m_beginTime * (60 / $minPerBlock));
        $eventArray[$i]->m_endTime = round($eventArray[$i]->m_endTime * (60 / $minPerBlock));
    }


    //create the table data offset array
    $offsetArray = array();
    for ($i = 0; $i < sizeof($weekName); $i++)
        array_push($offsetArray, 0);

    echo("<table border='1' class='tableClass'>");

    //day header
    echo("<tr><td class='header'></td>");
    for ($i = 0; $i < sizeof($weekName); $i++)
        echo("<td class='header'>" . $weekName[$i] . "</td>");
    echo("</tr>");


    for ($i = 0; $i <= $minPerDay / $minPerBlock; $i++)
    {
        //place the time td
        echo("<tr>");
        $hours = (int)($i * $minPerBlock / 60);
        $minutes = $i * $minPerBlock / 60;
        $minutes = ($minutes - (int)$minutes) * 60;

        echo("<td class='time'>" . $hours . ":" . $minutes . "</td>");


        for ($j = 0; $j < sizeof($weekName); $j++)
        {   //check if there is offset
            if ($offsetArray[$j] > 0)
            {
                $offsetArray[$j]--;
            }
            else
            {
                echo("<td class='event' ");

                $drawnEvent = false;
                for ($eventIndex = 0; $eventIndex < sizeof($eventArray); $eventIndex++)
                {
                    //check if there is a event to be placed
                    if ($i >= $eventArray[$eventIndex]->m_beginTime && $eventArray[$eventIndex]->m_dayIndex == $j)
                    {
                        $offset = $i - 1 - $eventArray[$eventIndex]->m_beginTime;
                        $length = $eventArray[$eventIndex]->m_endTime - $eventArray[$eventIndex]->m_beginTime - $offset;
                        $offsetArray[$j] = $length - 1;
                        echo("rowspan='" . $length . "'" . "class='" . $eventArray[$eventIndex]->m_class . "'>");
                        echo($eventArray[$eventIndex]->m_eventName);

                        unset($eventArray[$eventIndex]);
                        sort($eventArray);
                        $drawnEvent = true;
                        break 1;

                    }
                }
                if (!$drawnEvent)
                    echo(" >");
                echo("</td>");
            }
        }
        echo("</tr>");
    }
    echo("</table>");
}

?>
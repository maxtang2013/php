<?php

$from = $_REQUEST['from'] ? $_REQUEST['from']:date('m/01/Y 00:00:00');;
$litfrom = explode(' ',$from);
$datetime = $litfrom[0];
$from_datearr = explode('/',$datetime);
$to = $_REQUEST['to'] ? $_REQUEST['to']:date('m/d/Y 23:59:59');
$litto = explode(' ',$to);
$datetimeto = $litto[0];
$to_datearr = explode('/',$datetimeto);
$fromStamp = strtotime($from);//$from_datearr[2].'-'.$from_datearr[0].'-'.$from_datearr[1].' '.$litfrom[1];
$toStamp = strtotime($to);//$to_datearr[2].'-'.$to_datearr[0].'-'.$to_datearr[1].' '.$litto[1];

 $daysInRange = intval(($toStamp - $fromStamp + 1) / 24 / 3600);
if ($daysInRange == 0) $daysInRange = 1;

echo $daysInRange;

?>


                <form action="" id="filterform" method="post">

                    <span class="label label-default">From:</span> <input type="text"  class="form-control fdate" id="from" name="from" value="<?=$from?>" />
                    <span class="label label-default">To:</span> <input type="text"  class="form-control fdate" id="to" name="to" value="<?=$to?>" />

                    <span>
                            <input type="hidden" id="export_hidden" name="export_hidden" value="0">
                            <button class="btn btn-default btn-success" id='update_result' type="submit">Update Result</button>
                    </span>


                </form>

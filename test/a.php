<?php
require_once('inc/adv_csv.php');

$adv_csv = new adv_csv();

$tableContent = '<table class="table-bordered table" id="table" style="padding: 0px;">
<thead class="tableFloatingHeader" style="display: none;">
<tr style="font-weight:bold;">
<td>Gross sales</td>
<td>Net sales</td>
<td>First time sales</td>
<td>Recurring sales</td>
<td>Refund </td>
<td>Void </td>
<td>Chargeback </td>
<td>Monthly</td>
<td>Percentage</td>
</tr>
</thead>
<tbody><tr style="font-weight:bold;">
<td></td>
<td>$10,752.86 <span class="details">(25 sales)</span></td>
<td>$8,510.91 <span class="details">(17 sales)</span></td>
<td>$10,482.87 <span class="details">(12 unique)</span></td>
<td>$269.99 <span class="details">(3 unique)</span></td>
<td>$0.00 <span class="details">(0)</span> 0.00%</td>
<td>$2,241.95 <span class="details">(8)</span> 20.85%</td>
<td>$0.00 <span class="details">(0)</span> 0.00%</td>
<td>$0.00/$40,000.00</td>
<td></td>
<td></td>
</tr><tr>
 
<td><font color="blue">Meritus</font></td>
<td>$10,752.86 <span class="details">(25 sales)</span></td>
<td>$8,510.91 <span class="details">(17 sales)</span></td>
<td>$10,482.87 <span class="details">(12 unique)</span></td>
<td>$269.99 <span class="details">(3 unique)</span></td>
<td>$0.00 <span class="details">(0)</span> 0.00%</td>
<td>$2,241.95 <span class="details">(8)</span> 20.85%</td>
<td>$0.00 <span class="details">(0)</span> 0.00%</td>
<td>$0.00/$40,000.00</td>
<td>5.00% first time 5.00% recurring </td>
<td><a href="javascript:;" class="edit" data-id="211" data-name="Meritus" data-account="1" data-md="1" data-username="" data-secret="" data-idealmonthly="40000.00" data-idealdaily="4000.00" data-visa="1000" data-mastercard="1000" data-cred="30" data-cyellow="20" data-cgreen="10" data-sred="95" data-syellow="80" data-sgreen="50" data-bank="" data-platform="" data-iso=""><i class="glyphicon glyphicon-edit"></i></a></td>
</tr>
</tbody></table>';
$tableContent = strip_tags($tableContent, "<table><tr><td><tbody>");

//$dom = new simple_html_dom();
//
//$html->load($tableContent);
//$input = $tableContent;
//$input=str_replace('<th','<td',$input);
//$input=str_replace('</th>','</td>',$input);
//$input=str_replace('<tbody>','',$input);
//$input=str_replace('</tbody>','',$input);
//$table = $html->find('table#table');
//$trs = $children = $table[0]->children;


echo $adv_csv->html_to_csv1($tableContent);

echo 'Done';

$date = new Date( 1490940164 );

echo sprintf("%s", $date);



<?php

require_once('inc/dirs.inc.php');
require_once(ROOT_DIR . "inc/simple_html_dom.php");
ini_set('display_errors','1');
class adv_csv
{

function adv_utf8_to_ascii($input)	// convert string from utf8 to ascii format 
	{
//	$output=preg_replace('/[^(\x20-\x7F)]*/','', $input);	//	sloooow
	$output=preg_replace ("/[^[:print:]]/",'',$input);	// remove everything not ASCII ex. UTF8 blank
	return ($output);
	}	// utf8_to_ascii

function adv_html_to_csv($input)	// convert html string to CSV format html2csv
	{
        $input=str_replace('<th>','<td>',$input);
        $input=str_replace('</th>','</td>',$input);
        $input=str_replace('<tbody>','',$input);
        $input=str_replace('</tbody>','',$input);
	$output=preg_replace ("/^(.*)\<table(.*?)\>|\<\/table\>(.*)$|\<tr(.*?)\>|\<td(.*?)\>|\"|\'/si",'',$input);
	$output2=explode ("</tr>",$output);	// cut one line string to array for each line
	$output='';
	$this->csv_lines='0';
	foreach ($output2 as $output3)
		{
		$output4=explode ("</td>",$output3);	// cut each line for next array (cell)
		foreach ($output4 as $output5)
			{
			$output.= "\"".$output5."\",";
			}	// output 5		
		$output=strip_tags(substr_replace($output,"",-1));	// replace last charcater "," in EOL
		$output.= "\r\n";
		$this->csv_lines++;
		}	// output3
	return ($output);
	}	// html_to_csv

function html_to_csv($input){
    $html = new simple_html_dom();
    $input=str_replace('<th','<td',$input);
    $input=str_replace('</th>','</td>',$input);
    $input=str_replace('<tbody>','',$input);
    $input=str_replace('</tbody>','',$input);

    $html->load($input);
    $table = $html->find('table#table');
    $trs = $children = $table[0]->children;
    $output='';
    $this->csv_lines='0';
    $rk=array();
    $ck=array();

    foreach($trs as $tr)
    {
        $tds = $tr->children;

        foreach($tds as $tk=>$td)
        {
            if($tk==0&&$rk[$tk]>=1)
            {
                $output.="\"\",";
                $output.="\"\",";
                $output.="\"\",";
                //continue;
            }
            $attr = @$td->attr;
            $colspan=$rowspan=1;
            if(@$attr['colspan'])
            $colspan = (int)$attr['colspan'];
            if(@$attr['rowspan'])
            $rowspan = (int)$attr['rowspan'];

            $nodes = $td->nodes;
            //print_r($nodes);
            if($nodes[0]->tag=='text')
            $text = $nodes[0]->_;
            elseif($nodes[0]->tag=='a')
            {
                $nodes = $nodes[0]->nodes;
                $text = $nodes[0]->_;

            }
            $text=$text[4];
            $output.= "\"".$text."\",";
            if($colspan>1)
            {
                for($i=1;$i<$colspan;$i++)
                {
                    $output.="\"\",";
                }

            }

            if($rowspan>1)
            {
                $rk[$tk]=$rowspan;
                $ck[]=$tk;
            }


        }
        //break;
        foreach($rk as $rtk=>$rrk)
        {
            $rk[$rtk]--;
        }

        $output.= "\r\n";
        $this->csv_lines++;
    }
    return ($output);
}

    function html_to_csv1($input){
        $html = new simple_html_dom();
        $input=str_replace('<th','<td',$input);
        $input=str_replace('</th>','</td>',$input);
        $input=str_replace('<tbody>','',$input);
        $input=str_replace('</tbody>','',$input);

        $html->load($input);
        $table = $html->find('table#table');
        $trs = $children = $table[0]->children;
        $output='';
        $this->csv_lines='0';
        $rk=array();
        $ck=array();

        $rk[] = 0;

        foreach($trs as $tr)
        {
            $tds = $tr->children;

            foreach($tds as $tk=>$td)
            {
                $attr = @$td->attr;
                $colspan=$rowspan=1;
                if(@$attr['colspan'])
                    $colspan = (int)$attr['colspan'];
                if(@$attr['rowspan'])
                    $rowspan = (int)$attr['rowspan'];

                $nodes = $td->nodes;
                //print_r($nodes);
                if($nodes[0]->tag=='text')
                    $text = $nodes[0]->_;
                elseif($nodes[0]->tag=='a')
                {
                    $nodes = $nodes[0]->nodes;
                    $text = $nodes[0]->_;

                }
                $text=$text[4];
                $output.= "\"".$text."\",";
                if($colspan>1)
                {
                    for($i=1;$i<$colspan;$i++)
                    {
                        $output.="\"\",";
                    }

                }

                if($rowspan>1)
                {
                    $rk[$tk]=$rowspan;
                    $ck[]=$tk;
                }


            }
            //break;
            foreach($rk as $rtk=>$rrk)
            {
                $rk[$rtk]--;
            }

            $output.= "\r\n";
            $this->csv_lines++;
        }
        return ($output);
    }

function adv_read_file($filename)	// read static file and push to string
	{
	$file=fopen ($filename,r);
	$this->string=fread ($file,filesize($filename));
//	$this->string=fread ($file,18000);
	fclose ($file);
	}	// adv_read_file

function adv_csv_headers()	// get column name from CVS string and create array
	{
	$output=explode("\r\n",$this->string);
	$output=explode(",",$output[0]);
	$this->csv_head='';
	$this->csv_head_count='';
	foreach ($output as $output2)
		{
		$output2=preg_replace ("/\"/",'',$output2);
		$this->csv_head_name[]=$output2;
		$this->csv_head_count++;
		}	// output2
	}	// adv_csv_headers

function adv_csv_cols_length()	// estimate column length 
	{
	$output=explode("\r\n",$this->string);
	unset ($output[0]);	// remove header row because we want to measure data length not header
	for ($i=0;$i<=$this->csv_head_count;$i++)
		{
		$this->csv_head_len[$i]='0';		// add element to array when 0 length
		}	// for i
	foreach ($output as $output2)
		{
		$output3=explode(",",$output2);
		foreach ($output3 as $key=>$output4)
			{
			if (strlen($output4)-2>$this->csv_head_len[$key])	// remove 2 because ""
				{
			$this->csv_head_len[$key]=strlen($output4)-2;	// remove 2 because ""
//			echo $key.' '.$this->csv_head_len[$key].'-'.$output4.'<br>';
				}	// if strlen output4
			}	// output3
		}	// output 2	
	}	// adv_csv_cols_length



}	// class adv_csv




?>

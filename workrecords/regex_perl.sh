# 13345567677 => 13,345,567,677
perl -w -p -i -e "s/(?<=\d)(?=(\d\d\d)+$)/,/g" numbers.txt

perl -w -p -i -e "s/,//g" numbers.txt


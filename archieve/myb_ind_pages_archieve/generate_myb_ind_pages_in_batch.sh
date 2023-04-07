#!/bin/bash

#Author: Jay Chiang
#Last update: 20220608

homed='/rd1/www/group3/myb_tfdb'
workd='/rd1/www/group3/myb_tfdb/myb_ind_pages'

echo "Start generating MYB webpages..."
for f in $(cat $homed/data/myb_list/GDDH13_test_name_list | awk '{print $1}')
#for n in $(ls $homed/data/myb_list/GDDH13_MYB*)
do
    #for f in $(cat $n | awk '{print $1}')
    #do
        echo "$f.php"
        cp $workd/archieve/MD14G1233900.php $workd/$f.php
    #done
done
echo "Finish generating .php files at $(date)"
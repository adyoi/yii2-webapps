#!/bin/sh
# yii2-webapps | Change Backend Directory
# by adyoi

while true; do
echo ""
echo "Yii2 Web Application"
echo ""
echo "Change Backend Directory"
echo "------------------------"
read -p "change from  : " source
read -p "change to    : " destination
echo "------------------------"
if mv $source $destination
then echo "[success] /"$destination "moved !"
else echo "[failure] /"$source "not found !"
fi
exit; done

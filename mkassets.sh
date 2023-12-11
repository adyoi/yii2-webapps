#!/bin/sh
# yii2-webapps | Make Assets Directory
# by adyoi

while true; do
echo ""
echo "Yii2 Web Application"
echo ""
echo "Make Assets Directory"
echo "---------------------"
echo "Frontend Directory : /" 
read -p "Backend Directory  : " backend
echo "---------------------"
if [[ ! -d assets ]]
then 
	mkdir assets
	echo "[success] Create Directory Assets Frontend !"
else 
	rm -rf assets
	mkdir assets
	echo "[success] Rereate Directory Assets Frontend !"
fi
if [[ ! -d $backend/assets ]]
then 
	if [[ ! -d $backend ]] 
	then 
		mkdir $backend
	fi
	mkdir $backend/assets
	echo "[success] Create Directory Assets Backend !"
else 
	if [[ ! -d $backend ]] 
	then 
		mkdir $backend/assets
	fi
	rm -rf $backend/assets
	mkdir $backend/assets
	echo "[success] Rereate Directory Assets Backend !"
fi
exit; done

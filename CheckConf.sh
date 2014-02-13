#!/bin/bash
# 定时监听 nginx.conf 文件是否有修昨，如有修改，则重启 nginx
# nginx 的重启需要用 root 账号进行操作
FILE=/usr/local/nginx/conf/nginx.conf
COMMAND=/usr/local/nginx/sbin/nginx
INTERVAL=5

while true; do
    inotifywait -e modify $FILE
    $COMMAND -s reload
    echo "nginx reload."
    
    sleep $INTERVAL
done

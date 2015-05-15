#!/usr/bin/env bash

docker run -d -p 80:80 -v /var/run/docker.sock:/tmp/docker.sock jwilder/nginx-proxy

cd /vagrant && docker-composer up -d

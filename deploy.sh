#!/bin/bash

git pull origin master && php artisan migrate && npm run production && rm -rf storage/logs/*

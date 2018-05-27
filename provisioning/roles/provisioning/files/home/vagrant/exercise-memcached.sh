#!/bin/bash

dt=$(date '+%d%m%y %H%M%S');

echo "$dt CRON Job that runs once per minute" >> /home/vagrant/cron_job.log
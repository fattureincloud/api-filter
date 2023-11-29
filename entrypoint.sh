#!/bin/bash

apt-get update
apt-get install wget -y

wget https://www.antlr.org/download/antlr-4.9.2-complete.jar
export CLASSPATH=".:./antlr-4.9.2-complete.jar:$CLASSPATH"

rm -rf /parser/*

java -jar ./antlr-4.9.2-complete.jar -Dlanguage=PHP /grammar/ApiFilter.g4 -o /parser -package FattureInCloud\\ApiFilter\\Parser -visitor -no-listener
#!/bin/bash

set -euo pipefail

ANTLR_VERSION="4.13.2"
ANTLR_JAR="antlr-${ANTLR_VERSION}-complete.jar"
# SHA-256 of the official ANTLR ${ANTLR_VERSION} complete jar (also matches Maven Central's antlr4-${ANTLR_VERSION}-complete.jar)
ANTLR_SHA256="eae2dfa119a64327444672aff63e9ec35a20180dc5b8090b7a6ab85125df4d76"

wget "https://www.antlr.org/download/${ANTLR_JAR}"

# Abort before executing the jar if its checksum does not match
echo "${ANTLR_SHA256}  ${ANTLR_JAR}" | sha256sum -c -

ROOT_DIR="$(pwd)"
export CLASSPATH="${ROOT_DIR}:${ROOT_DIR}/${ANTLR_JAR}:${CLASSPATH:-}"

rm -rf ./parser/*

# Run from the grammar directory so the output is written flat into ./parser
(
  cd ./grammar
  java -jar "${ROOT_DIR}/${ANTLR_JAR}" -Dlanguage=PHP ApiFilter.g4 -o ../parser -package FattureInCloud\\ApiFilter\\Parser -visitor -no-listener
)

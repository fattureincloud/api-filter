FROM eclipse-temurin:25-jre

RUN apt-get update \
    && apt-get install -y --no-install-recommends wget \
    && rm -rf /var/lib/apt/lists/*

COPY entrypoint.sh /script/entrypoint.sh

CMD ["/script/entrypoint.sh"]